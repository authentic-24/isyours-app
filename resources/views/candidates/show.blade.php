@extends('layouts/app2')

@section('content')
    <style>
        .candidate-profile {
            padding: 20px 0 8px;
        }

        .candidate-profile .profile-card {
            margin-bottom: 18px;
        }

        .candidate-profile .profile-head {
            display: flex;
            gap: 18px;
            align-items: center;
        }

        .candidate-profile .profile-photo {
            width: 96px;
            height: 96px;
            border-radius: 999px;
            object-fit: cover;
            border: 3px solid #eef1ff;
        }

        .candidate-profile .profile-name {
            margin: 0 0 6px;
            font-family: "Manrope", sans-serif;
            font-weight: 800;
            color: #1a086e;
            font-size: 1.35rem;
        }

        .candidate-profile .profile-meta {
            margin: 4px 0;
            color: #4b5563;
            font-size: 14px;
        }

        .candidate-profile .section-title {
            margin: 0 0 16px;
            padding-bottom: 10px;
            border-bottom: 2px solid #dbe3ff;
            color: #1a086e;
            font-size: 1rem;
            font-weight: 800;
            font-family: "Manrope", sans-serif;
        }

        .candidate-profile .k-item {
            margin: 9px 0;
            color: #374151;
            line-height: 1.5;
            font-size: 14px;
        }

        .candidate-profile .k-label {
            color: #1f2937;
            font-weight: 700;
        }

        .candidate-profile .is-good {
            color: #15803d;
            font-weight: 700;
        }

        .candidate-profile .is-bad {
            color: #b91c1c;
            font-weight: 700;
        }

        .candidate-profile .exp-item {
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid #ecf0fa;
        }

        .candidate-profile .exp-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .candidate-profile .exp-head {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            align-items: flex-start;
        }

        .candidate-profile .exp-role {
            margin: 0 0 4px;
            color: #111827;
            font-size: 1rem;
            font-weight: 700;
        }

        .candidate-profile .exp-company {
            margin: 0;
            color: #6b7280;
            font-weight: 600;
        }

        .candidate-profile .exp-duration {
            color: #6b7280;
            white-space: nowrap;
            font-size: 13px;
        }

        .candidate-profile .exp-description {
            margin: 8px 0 0;
            color: #4b5563;
            line-height: 1.6;
        }

        .candidate-profile .muted {
            color: #6b7280;
            font-style: italic;
        }

        .candidate-profile .grid-capsules {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 12px;
        }

        .candidate-profile .capsule {
            border: 1px solid #e2e8f5;
            border-left: 4px solid #4b41df;
            border-radius: 10px;
            background: #f6f8ff;
            padding: 10px 12px;
        }

        .candidate-profile .capsule-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .candidate-profile .capsule-name {
            font-size: 13px;
            font-weight: 700;
            color: #1a086e;
        }

        .candidate-profile .capsule-badge {
            display: inline-flex;
            border-radius: 999px;
            padding: 2px 9px;
            font-size: 11px;
            font-weight: 700;
            background: rgba(75, 65, 223, 0.14);
            color: #2f2f74;
        }

        .candidate-profile .category-title {
            margin: 0 0 10px;
            color: #374151;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .candidate-profile .sidebar-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .candidate-profile .sidebar-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            color: #374151;
        }

        .candidate-profile .sidebar-list li:last-child {
            margin-bottom: 0;
        }

        .candidate-profile .sidebar-list a {
            color: #1f2937;
            text-decoration: none;
        }

        .candidate-profile .sidebar-list a:hover {
            color: #1a086e;
        }

        .candidate-profile .icon-soft {
            color: #4b41df;
            font-size: 17px;
        }

        .candidate-profile .contact-btn {
            width: 100%;
            text-align: center;
            display: block;
            margin-top: 16px;
        }

        .candidate-profile .stats-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .candidate-profile .stats-list li {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            padding: 10px 0;
            border-bottom: 1px solid #edf1fb;
            color: #4b5563;
            font-size: 14px;
        }

        .candidate-profile .stats-list li:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .candidate-profile .stats-list strong {
            color: #111827;
        }

        .candidate-profile .back-row {
            margin-top: 14px;
        }

        @media (max-width: 767.98px) {
            .candidate-profile .profile-head {
                flex-direction: column;
                align-items: flex-start;
            }

            .candidate-profile .exp-head {
                flex-direction: column;
                gap: 6px;
            }
        }
    </style>

    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Candidate Profile</h1>
            </div>
        </div>
    </section>

    <section class="candidate-detail-section candidate-profile">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="candidate-block profile-card">
                        <div class="inner-box">
                            <div class="content profile-head">
                                <figure class="image">
                                    <img class="profile-photo" src="{{ asset('images/resource/candidate-1.png') }}" alt="{{ $candidate->first_name }}">
                                </figure>
                                <div>
                                    <h3 class="profile-name">{{ $candidate->first_name }} {{ $candidate->last_name }}</h3>
                                    <p class="profile-meta"><span class="icon flaticon-mail"></span> {{ $candidate->email }}</p>
                                    @if($candidate->phone_number)
                                        <p class="profile-meta"><span class="icon flaticon-phone"></span> {{ $candidate->phone_number }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="resume-block profile-card">
                        <h4 class="section-title">Personal Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="k-item"><span class="k-label">Location:</span> {{ $candidate->city->name ?? '-' }}, {{ $candidate->city->state->name ?? '-' }}</p>
                                <p class="k-item"><span class="k-label">Education Level:</span> {{ $candidate->educationLevel->name ?? '-' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="k-item"><span class="k-label">Visa Status:</span> {{ $candidate->visa->name ?? '-' }}</p>
                                <p class="k-item"><span class="k-label">Vehicle:</span>
                                    @if($candidate->have_vehicle)
                                        <span class="is-good">Yes ({{ $candidate->license_plates }})</span>
                                    @else
                                        <span class="is-bad">No</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="resume-block profile-card">
                        <h4 class="section-title">Work Experience</h4>
                        @if($candidate->workExperiences && $candidate->workExperiences->count() > 0)
                            @foreach($candidate->workExperiences as $experience)
                                <div class="exp-item">
                                    <div class="exp-head">
                                        <div>
                                            <h5 class="exp-role">{{ $experience->position }}</h5>
                                            @if($experience->company)
                                                <p class="exp-company">{{ $experience->company }}</p>
                                            @endif
                                        </div>
                                        <span class="exp-duration">{{ $experience->duration }}</span>
                                    </div>
                                    @if($experience->description)
                                        <p class="exp-description">{{ $experience->description }}</p>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <p class="muted">No work experience listed.</p>
                        @endif
                    </div>

                    @if($candidate->innate_talent || $candidate->potential_talent)
                    <div class="resume-block profile-card">
                        <h4 class="section-title">Perfil de Talento</h4>
                        @if($candidate->innate_talent)
                            <div class="mb-3">
                                <h5 class="exp-role">Talento Innato</h5>
                                <p class="exp-description">{{ $candidate->innate_talent }}</p>
                            </div>
                        @endif

                        @if($candidate->potential_talent)
                            <div>
                                <h5 class="exp-role">Talento Potencial</h5>
                                <p class="exp-description">{{ $candidate->potential_talent }}</p>
                            </div>
                        @endif
                    </div>
                    @endif

                    @if($candidate->powerSkills && $candidate->powerSkills->count() > 0)
                    <div class="resume-block profile-card">
                        <h4 class="section-title">Power Skills</h4>
                        <div class="grid-capsules">
                            @foreach($candidate->powerSkills as $skill)
                                <div class="capsule">
                                    <div class="capsule-top">
                                        <span class="capsule-name">{{ $skill->name }}</span>
                                        <span class="capsule-badge">Nivel {{ $skill->pivot->level }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if($candidate->behavioralCompetencies && $candidate->behavioralCompetencies->count() > 0)
                    <div class="resume-block profile-card">
                        <h4 class="section-title">Competencias Comportamentales (Martha Alles)</h4>

                        @php
                            $grouped = $candidate->behavioralCompetencies->groupBy('category');
                        @endphp

                        @foreach($grouped as $category => $competencies)
                            <div class="mb-4">
                                <h5 class="category-title">
                                    @if($category == 'cardinal')
                                        Competencias Cardinales
                                    @elseif($category == 'specific')
                                        Competencias Especificas
                                    @else
                                        Competencias Tecnicas
                                    @endif
                                </h5>
                                <div class="grid-capsules">
                                    @foreach($competencies as $competency)
                                        <div class="capsule">
                                            <div class="capsule-top">
                                                <span class="capsule-name">{{ $competency->name }}</span>
                                                <span class="capsule-badge">Nivel {{ $competency->pivot->level }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif

                    @if($candidate->organizationalCultureValues && $candidate->organizationalCultureValues->count() > 0)
                    <div class="resume-block profile-card">
                        <h4 class="section-title">Valores Culturales que Busca</h4>
                        <div class="grid-capsules">
                            @foreach($candidate->organizationalCultureValues->sortBy('pivot.priority') as $value)
                                <div class="capsule">
                                    <div class="capsule-top">
                                        <span class="capsule-name">{{ $value->name }}</span>
                                        <span class="capsule-badge">P{{ $value->pivot->priority }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if($candidate->leadershipPreferences && $candidate->leadershipPreferences->count() > 0)
                    <div class="resume-block profile-card">
                        <h4 class="section-title">Caracteristicas que Busca en un Lider</h4>
                        <div class="grid-capsules">
                            @foreach($candidate->leadershipPreferences->sortBy('pivot.importance') as $pref)
                                <div class="capsule">
                                    <div class="capsule-top">
                                        <span class="capsule-name">{{ $pref->name }}</span>
                                        <span class="capsule-badge">I{{ $pref->pivot->importance }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-widget profile-card">
                        <h4 class="section-title">Contact Information</h4>
                        <ul class="sidebar-list">
                            <li>
                                <span class="icon flaticon-mail icon-soft"></span>
                                <a href="mailto:{{ $candidate->email }}">{{ $candidate->email }}</a>
                            </li>
                            @if($candidate->phone_number)
                                <li>
                                    <span class="icon flaticon-phone icon-soft"></span>
                                    <a href="tel:{{ $candidate->phone_number }}">{{ $candidate->phone_number }}</a>
                                </li>
                            @endif
                            <li>
                                <span class="icon flaticon-map-locator icon-soft"></span>
                                <span>{{ $candidate->city->name ?? '-' }}, {{ $candidate->city->state->code ?? '-' }}</span>
                            </li>
                        </ul>
                        @if($candidate->phone_number)
                            <a href="tel:{{ $candidate->phone_number }}" class="theme-btn btn-style-one contact-btn">
                                <span class="btn-title">Contact Candidate</span>
                            </a>
                        @endif
                    </div>

                    <div class="sidebar-widget profile-card">
                        <h4 class="section-title">Quick Stats</h4>
                        <ul class="stats-list">
                            <li>
                                <strong>Experience:</strong>
                                <span>{{ $candidate->workExperiences->count() }} positions</span>
                            </li>
                            <li>
                                <strong>Education:</strong>
                                <span>{{ $candidate->educationLevel->name ?? '-' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row back-row">
                <div class="col-12">
                    <a href="{{ route('web.candidate.index') }}" class="theme-btn btn-style-three">
                        <span class="btn-title">&larr; Back to Candidates</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
