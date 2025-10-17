<?php

namespace App\Http\Controllers\Web;

use App\Models\JobOffer;
use App\Models\User;
use App\Services\CountryService;
use App\Services\EducationLevelService;
use App\Services\ProficiencyLevelService;
use App\Services\JobLevelService;
use App\Services\JobTitleService;
use App\Services\JobTypeService;
use App\Services\LanguageService;
use Illuminate\Http\Request;
use App\Services\OfferService;
use App\Helpers\ArrayHelper;
use Aws\LocationService\LocationServiceClient;

class OfferController extends \App\Http\Controllers\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Show offers index.
     */
    public function index(Request $request, OfferService $offerService)
    {
        // Get all offers
        $response = $offerService->getOffers();

        // Check for errors in response
        if (array_key_exists('error', $response)) {
            // Redirect to login page if there's an error
            return redirect()->route('web_login');
        }

        // Convert result to object
        foreach ($response as &$offer) {
            $offer['candidate_count'] = count($offer['users']);
            $offer = ArrayHelper::arrayToObject($offer);
        }
        $result = $response;

        $user = User::find(session('user_id'));
        $company = $user ? $user->company : null;

        // Return view with offer object
        return view('offer/index', ['offers' => $result, 'company' => $company]);
    }

    /**
     * Show offer by id.
     */
    public function show(Request $request, $offer_id, OfferService $offerService)
    {
        // // Get all offers
        // $response = $offerService->getOfferById($offer_id);

        // // Check for errors in response
        // if (array_key_exists('error', $response)) {
        //     // Redirect to login page if there's an error
        //     return redirect()->route('web_login');
        // }

        // // // Convert result to object
        // $result = ArrayHelper::arrayToObject($response);

        // Convert result to object
        $offer = $jobOffer = JobOffer::with(
            'jobType',
            'skills',
            'city.state',
            'users.city',
            'jobLevel',
            'jobTitle',
            'educationLevel',
            'language',
            'proficiencyLevel',
            'keyResponsabilities',
            'company',
            'users.visa',
        )->findOrFail($offer_id);

        $user = User::find(session('user_id'));
        $company = $user ? $user->company : null;
        //dd($result);
        foreach ($offer->users as $user) {
            $user->distance = '-';
            if (is_numeric($offer->zip_code) && is_numeric($user->zip_code)) {
                $user->distance = $this->distancia($offer->zip_code, $user->zip_code);
            }
        }

        //dd($company);
        // Return view with offer object
        if ($company == null) {
            return view('offer/show2', ['offer' => $offer, 'company' => $company]);
        }
        return view('offer/show', ['offer' => $offer, 'company' => $company]);
    }

    public function distancia($codigoPostal1, $codigoPostal2)
    {
        $locationService = new LocationServiceClient([
            'version' => 'latest',
            'region' => 'us-east-1',
            // Cambia la región según tus necesidades
            'credentials' => [
                'key' => 'AKIAUMFJASHM5XIIXDWK',
                'secret' => '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',
            ],
        ]);

        // Define los códigos postales o ubicaciones geográficas de interés
        // $codigoPostal1 = '12345'; // Cambia esto por tu primer código postal
        // $codigoPostal2 = '67890'; // Cambia esto por tu segundo código postal

        // Obtén las coordenadas geográficas de los códigos postales
        $response1 = $locationService->searchPlaceIndexForText([
            'IndexName' => 'indiceyosoy',
            'Text' => $codigoPostal1,
        ]);

        $response2 = $locationService->searchPlaceIndexForText([
            'IndexName' => 'indiceyosoy',
            'Text' => $codigoPostal2,
        ]);

        // Extrae las coordenadas geográficas (latitud y longitud)
        $coordenadas1 = $response1['Results'][0]['Place']['Geometry']['Point'];
        $coordenadas2 = $response2['Results'][0]['Place']['Geometry']['Point'];
        //dd($coordenadas1);
        // Calcula la distancia entre las coordenadas usando alguna fórmula adecuada
        $distancia = $this->calcularDistancia($coordenadas1, $coordenadas2);

        $factorConversion = 0.621371;

        // Aplicar la conversión
        $distanciaMillas = $distancia * $factorConversion;

        return number_format($distanciaMillas, 2);
    }

    // Función para calcular la distancia (puedes utilizar alguna fórmula como la de Haversine)
    function calcularDistancia($coordenadas1, $coordenadas2)
    {
        // Radio de la Tierra en kilómetros
        $radioTierra = 6371;

        // Coordenadas en radianes
        $latitud1 = deg2rad($coordenadas1[0]);
        $longitud1 = deg2rad($coordenadas1[1]);
        $latitud2 = deg2rad($coordenadas2[0]);
        $longitud2 = deg2rad($coordenadas2[1]);

        // Diferencia de latitud y longitud
        $dLatitud = $latitud2 - $latitud1;
        $dLongitud = $longitud2 - $longitud1;

        // Fórmula de Haversine
        $a = sin($dLatitud / 2) ** 2 + cos($latitud1) * cos($latitud2) * sin($dLongitud / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distancia = $radioTierra * $c;

        return $distancia;
    }
























    /**
     * Show offer by id.
     */
    public function apply_offer(Request $request, $offer_id, OfferService $offerService)
    {
        $user_id = session('user_id');
        // Get all offers
        $response = $offerService->applyToOffer($offer_id);

        // Check for errors in response
        if (array_key_exists('error', $response)) {
            // Redirect to login page if there's an error
            return redirect()->back()->withErrors(['msg' => $response['message']]);
        }

        return redirect()->back()->with('message', $response['message']);
    }


    public function create(
        Request $request,
        JobLevelService $jobLevelService,
        JobTitleService $jobTitleService,
        JobTypeService $jobTypeService,
        EducationLevelService $educationLevelService,
        LanguageService $languageService,
        ProficiencyLevelService $proficiencyLevelService,
        CountryService $countryService

    ) {
        // Get job levels from the service
        $jobLevels = $jobLevelService->getJobLevels();

        // Get job titles from the service
        $jobTitles = $jobTitleService->getJobTitles();

        // Get job titles from the service
        $jobTypes = $jobTypeService->getJobTypes();

        // Get education levels from the service
        $educationLevels = $educationLevelService->getEducationLevels();

        $language = $languageService->getLanguages();
        $proficiencyLevels = $proficiencyLevelService->getProficiencyLevels();

        $countries = $countryService->getCountries();

        // Check for errors in job levels or job titles
        if (array_key_exists('error', $jobLevels) || array_key_exists('error', $jobTitles)) {
            // Redirect to login page or display an error message
            return redirect()->route('web_login');
        }
        // Check for errors in education levels
        if (array_key_exists('error', $educationLevels)) {
            // Redirecciona a la página de inicio de sesión o muestra un mensaje de error
            return redirect()->route('web_login');
        }

        // Convert job levels and job titles to objects
        $jobLevels = ArrayHelper::arrayToObject($jobLevels['data']);
        $jobTitles = ArrayHelper::arrayToObject($jobTitles['data']);
        $jobTypes = ArrayHelper::arrayToObject($jobTypes['data']);
        // Convert education levels to an object
        $educationLevels = ArrayHelper::arrayToObject($educationLevels['data']);
        $language = ArrayHelper::arrayToObject($language['data']);
        $proficiencyLevels = ArrayHelper::arrayToObject($proficiencyLevels['data']);
        $countries = ArrayHelper::arrayToObject($countries['countries']);


        // Pass the job levels and job titles to the create view
        return view(
            'offer.create',
            [
                'jobLevels' => $jobLevels,
                'jobTitles' => $jobTitles,
                'jobTypes' => $jobTypes,
                'educationLevels' => $educationLevels,
                'languages' => $language,
                'proficiencyLevels' => $proficiencyLevels,
                'countries' => $countries,
            ]
        );
    }

    public function create_post(Request $request, OfferService $offerService)
    {
        // dd($request->input());

        $response = $offerService->create($request->all());
        if (array_key_exists('error', $response)) {
            return redirect()->back()->withErrors($response['errors'])->withInput();
        }
        //dd($response['data']['id']);

        return redirect()->route('web.offer.show', $response['data']['id']);
    }
}
