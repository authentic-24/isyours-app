@extends('layouts.app_home')

@section('content')
<style>
/* Ocultar header */
.main-header,
#language-bar {
    display: none !important;
}

body {
    padding-top: 0 !important;
    background: #ffffff;
}

.legal-section {
    min-height: 100vh;
    background: #ffffff;
    padding: 60px 0;
}

.legal-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 40px;
}

.legal-header {
    text-align: center;
    margin-bottom: 40px;
    padding-bottom: 30px;
    border-bottom: 2px solid #e5e7eb;
}

.legal-title {
    font-size: 32px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 10px;
}

.legal-date {
    font-size: 14px;
    color: #6b7280;
}

.legal-content {
    color: #374151;
    line-height: 1.8;
}

.legal-content h2 {
    font-size: 24px;
    font-weight: 600;
    color: #1a1a1a;
    margin-top: 40px;
    margin-bottom: 20px;
}

.legal-content h3 {
    font-size: 18px;
    font-weight: 600;
    color: #1a1a1a;
    margin-top: 30px;
    margin-bottom: 15px;
}

.legal-content p {
    margin-bottom: 15px;
}

.legal-content ul {
    margin-bottom: 20px;
    padding-left: 30px;
}

.legal-content li {
    margin-bottom: 10px;
}

.back-link {
    display: inline-block;
    margin-bottom: 30px;
    color: #1a1a1a;
    text-decoration: none;
    font-weight: 600;
}

.back-link:hover {
    color: #333333;
}
</style>

<section class="legal-section">
    <div class="legal-container">
        <a href="javascript:history.back()" class="back-link">
            <i class="fas fa-arrow-left"></i> {{ __('home.back') }}
        </a>

        <div class="legal-header">
            <h1 class="legal-title">{{ __('home.privacy_policy') }}</h1>
            <p class="legal-date">{{ __('home.last_updated') }}: {{ __('home.january') }} 2026</p>
        </div>

        <div class="legal-content">
            <h2>1. {{ __('home.information_we_collect') }}</h2>
            <p>
                {{ __('home.collect_info_text') }}
            </p>

            <h3>1.1 {{ __('home.personal_information') }}</h3>
            <ul>
                <li>{{ __('home.personal_info_1') }}</li>
                <li>{{ __('home.personal_info_2') }}</li>
                <li>{{ __('home.personal_info_3') }}</li>
                <li>{{ __('home.personal_info_4') }}</li>
            </ul>

            <h3>1.2 {{ __('home.usage_information') }}</h3>
            <p>
                {{ __('home.usage_info_text') }}
            </p>

            <h2>2. {{ __('home.how_we_use_info') }}</h2>
            <ul>
                <li>{{ __('home.use_info_1') }}</li>
                <li>{{ __('home.use_info_2') }}</li>
                <li>{{ __('home.use_info_3') }}</li>
                <li>{{ __('home.use_info_4') }}</li>
                <li>{{ __('home.use_info_5') }}</li>
            </ul>

            <h2>3. {{ __('home.information_sharing') }}</h2>
            <p>
                {{ __('home.sharing_text') }}
            </p>

            <h2>4. {{ __('home.data_security') }}</h2>
            <p>
                {{ __('home.security_text') }}
            </p>

            <h2>5. {{ __('home.your_rights') }}</h2>
            <ul>
                <li>{{ __('home.right_1') }}</li>
                <li>{{ __('home.right_2') }}</li>
                <li>{{ __('home.right_3') }}</li>
                <li>{{ __('home.right_4') }}</li>
            </ul>

            <h2>6. {{ __('home.cookies') }}</h2>
            <p>
                {{ __('home.cookies_text') }}
            </p>

            <h2>7. {{ __('home.changes_to_policy') }}</h2>
            <p>
                {{ __('home.changes_text') }}
            </p>

            <h2>8. {{ __('home.contact_us') }}</h2>
            <p>
                {{ __('home.contact_privacy_text') }}
            </p>
        </div>
    </div>
</section>
@endsection
