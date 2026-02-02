<?php

namespace App\Models;

use App\Helpers\DistanceHelper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'city_id',
        'phone_number',
        'identification',
        'is_agree_terms_privacy',
        'zip_code',
        'address',
        'full_address',
        'latitude',
        'longitude',
        'have_vehicle',
        'visa_id',
        'visa_number',
        'license_plates',
        'country_of_origin_id',
        'education_level_id',
        'security_id',
        'security_id_last_digits',
        'innate_talent',
        'potential_talent',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function company()
    {
        return $this->hasOne(CompanyProfile::class);
    }

    public function visa()
    {
        return $this->belongsTo(Visa::class);
    }

    public function countryOfOrigin(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_of_origin_id');
    }

    public function educationLevel(): BelongsTo
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    public function jobOffers()
    {
        return $this->belongsToMany(JobOffer::class, 'job_offer_user');
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class)->orderBy('start_date', 'desc');
    }

    /**
     * Competencias comportamentales del usuario (Martha Alles)
     */
    public function behavioralCompetencies()
    {
        return $this->belongsToMany(BehavioralCompetency::class, 'user_behavioral_competency')
            ->withPivot('level')
            ->withTimestamps();
    }

    /**
     * Power Skills del usuario
     */
    public function powerSkills()
    {
        return $this->belongsToMany(PowerSkill::class, 'user_power_skill')
            ->withPivot('level')
            ->withTimestamps();
    }

    /**
     * Valores de cultura organizacional que el usuario busca
     */
    public function organizationalCultureValues()
    {
        return $this->belongsToMany(OrganizationalCultureValue::class, 'user_culture_value')
            ->withPivot('priority')
            ->withTimestamps();
    }

    /**
     * Preferencias de liderazgo del usuario
     */
    public function leadershipPreferences()
    {
        return $this->belongsToMany(LeadershipPreference::class, 'user_leadership_preference')
            ->withPivot('importance')
            ->withTimestamps();
    }

    /**
     * Calculate distance from user to a job offer
     * Uses exact coordinates if available, falls back to city coordinates
     * 
     * @param JobOffer $jobOffer
     * @param string $unit 'km' or 'mi'
     * @return float|null Distance in specified unit
     */
    public function distanceToJobOffer(JobOffer $jobOffer, $unit = 'km')
    {
        // Get user coordinates (prefer exact, fallback to city)
        $userLat = $this->latitude ?? $this->city->latitude ?? null;
        $userLon = $this->longitude ?? $this->city->longitude ?? null;

        // Get job offer coordinates (prefer exact, fallback to city)
        $jobLat = $jobOffer->latitude ?? $jobOffer->city->latitude ?? null;
        $jobLon = $jobOffer->longitude ?? $jobOffer->city->longitude ?? null;

        if (!$userLat || !$userLon || !$jobLat || !$jobLon) {
            return null;
        }

        return DistanceHelper::calculateDistance(
            $userLat,
            $userLon,
            $jobLat,
            $jobLon,
            $unit
        );
    }

    /**
     * Calculate distance from user to another user
     * Uses exact coordinates if available, falls back to city coordinates
     * 
     * @param User $otherUser
     * @param string $unit 'km' or 'mi'
     * @return float|null Distance in specified unit
     */
    public function distanceToUser(User $otherUser, $unit = 'km')
    {
        // Get user coordinates (prefer exact, fallback to city)
        $userLat = $this->latitude ?? $this->city->latitude ?? null;
        $userLon = $this->longitude ?? $this->city->longitude ?? null;

        // Get other user coordinates (prefer exact, fallback to city)
        $otherLat = $otherUser->latitude ?? $otherUser->city->latitude ?? null;
        $otherLon = $otherUser->longitude ?? $otherUser->city->longitude ?? null;

        if (!$userLat || !$userLon || !$otherLat || !$otherLon) {
            return null;
        }

        return DistanceHelper::calculateDistance(
            $userLat,
            $userLon,
            $otherLat,
            $otherLon,
            $unit
        );
    }
}
