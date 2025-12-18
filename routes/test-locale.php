<?php

Route::get('/test-locale', function () {
    $locale = app()->getLocale();
    $sessionLocale = session('locale');

    app()->setLocale('es');
    $testEs = __('home.login_welcome_back');

    app()->setLocale('en');
    $testEn = __('home.login_welcome_back');

    return response()->json([
        'current_locale' => $locale,
        'session_locale' => $sessionLocale,
        'spanish_test' => $testEs,
        'english_test' => $testEn,
        'lang_path' => lang_path(),
        'es_file_exists' => file_exists(lang_path('es/home.php')),
        'en_file_exists' => file_exists(lang_path('en/home.php')),
    ]);
});
