<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the languages.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $languages = Language::all();

        return response()->json([
            'success' => true,
            'data' => $languages,
        ]);
    }

    /**
     * Store a newly created language.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $language = Language::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'data' => $language,
        ]);
    }

    /**
     * Display the specified language.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $language = Language::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $language,
        ]);
    }

    /**
     * Update the specified language.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $language = Language::findOrFail($id);

        $language->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'data' => $language,
        ]);
    }

    /**
     * Remove the specified language from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $language = Language::findOrFail($id);

        $language->delete();

        return response()->json([
            'success' => true,
            'message' => 'Language deleted successfully.',
        ]);
    }
}
