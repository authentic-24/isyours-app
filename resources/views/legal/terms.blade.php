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
            <h1 class="legal-title">{{ __('home.terms_conditions') }}</h1>
            <p class="legal-date">{{ __('home.last_updated') }}: {{ __('home.january') }} 2026</p>
        </div>

        <div class="legal-content">
            <h2>1. {{ __('home.acceptance_of_terms') }}</h2>
            <p>
                {{ __('home.terms_acceptance_text') }}
            </p>

            <h2>2. {{ __('home.use_of_service') }}</h2>
            <p>
                {{ __('home.service_use_text') }}
            </p>

            <h3>2.1 {{ __('home.eligibility') }}</h3>
            <p>
                {{ __('home.eligibility_text') }}
            </p>

            <h3>2.2 {{ __('home.account_registration') }}</h3>
            <p>
                {{ __('home.registration_text') }}
            </p>

            <h2>3. {{ __('home.user_responsibilities') }}</h2>
            <ul>
                <li>{{ __('home.responsibility_1') }}</li>
                <li>{{ __('home.responsibility_2') }}</li>
                <li>{{ __('home.responsibility_3') }}</li>
                <li>{{ __('home.responsibility_4') }}</li>
            </ul>

            <h2>4. {{ __('home.prohibited_activities') }}</h2>
            <p>
                {{ __('home.prohibited_text') }}
            </p>

            <h2>5. {{ __('home.intellectual_property') }}</h2>
            <p>
                {{ __('home.ip_text') }}
            </p>

            <h2>6. {{ __('home.termination') }}</h2>
            <p>
                {{ __('home.termination_text') }}
            </p>

            <h2>7. {{ __('home.limitation_of_liability') }}</h2>
            <p>
                {{ __('home.liability_text') }}
            </p>

            <h2>8. {{ __('home.contact_us') }}</h2>
            <p>
                {{ __('home.contact_text') }}
            </p>
        </div>
    </div>
</section>
@endsection
