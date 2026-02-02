@extends('layouts/app')

@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-color: #f8f9fa;">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Candidate Profile</h1>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Candidate Detail Section -->
    <section class="candidate-detail-section" style="padding: 60px 0; background: #ffffff;">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <!-- Candidate Info -->
                    <div class="candidate-block" style="background: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 30px;">
                        <div class="inner-box">
                            <div class="content" style="display: flex; align-items: center; gap: 20px;">
                                <figure class="image" style="margin: 0;">
                                    <img src="{{ asset('images/resource/candidate-1.png') }}" alt="{{ $candidate->first_name }}" style="border-radius: 50%; width: 100px; height: 100px;">
                                </figure>
                                <div>
                                    <h3 style="margin: 0 0 10px 0; color: #312683;">{{ $candidate->first_name }} {{ $candidate->last_name }}</h3>
                                    <p style="margin: 5px 0; color: #666;"><span class="icon flaticon-mail"></span> {{ $candidate->email }}</p>
                                    @if($candidate->phone_number)
                                        <p style="margin: 5px 0; color: #666;"><span class="icon flaticon-phone"></span> {{ $candidate->phone_number }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Information -->
                    <div class="resume-block" style="background: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 30px;">
                        <h4 style="margin-bottom: 20px; color: #312683; border-bottom: 2px solid #f9b232; padding-bottom: 10px;">Personal Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p style="margin: 10px 0;"><strong>Location:</strong> {{ $candidate->city->name ?? '-' }}, {{ $candidate->city->state->name ?? '-' }}</p>
                                <p style="margin: 10px 0;"><strong>Education Level:</strong> {{ $candidate->educationLevel->name ?? '-' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p style="margin: 10px 0;"><strong>Visa Status:</strong> {{ $candidate->visa->name ?? '-' }}</p>
                                <p style="margin: 10px 0;"><strong>Vehicle:</strong> 
                                    @if($candidate->have_vehicle)
                                        <span style="color: green;">✓ Yes ({{ $candidate->license_plates }})</span>
                                    @else
                                        <span style="color: red;">✗ No</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Work Experience -->
                    <div class="resume-block" style="background: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 30px;">
                        <h4 style="margin-bottom: 20px; color: #312683; border-bottom: 2px solid #f9b232; padding-bottom: 10px;">Work Experience</h4>
                        
                        @if($candidate->workExperiences && $candidate->workExperiences->count() > 0)
                            @foreach($candidate->workExperiences as $experience)
                                <div class="experience-item" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #e9ecef;">
                                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px;">
                                        <div>
                                            <h5 style="margin: 0 0 5px 0; color: #333; font-size: 18px;">{{ $experience->position }}</h5>
                                            @if($experience->company)
                                                <p style="margin: 0; color: #666; font-weight: 500;">{{ $experience->company }}</p>
                                            @endif
                                        </div>
                                        <span style="color: #666; font-size: 14px; white-space: nowrap; margin-left: 15px;">{{ $experience->duration }}</span>
                                    </div>
                                    @if($experience->description)
                                        <p style="margin: 10px 0 0 0; color: #555; line-height: 1.6;">{{ $experience->description }}</p>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <p style="color: #999; font-style: italic;">No work experience listed.</p>
                        @endif
                    </div>

                    <!-- Professional Profile -->
                    @if($candidate->innate_talent || $candidate->potential_talent)
                    <div class="resume-block" style="background: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 30px;">
                        <h4 style="margin-bottom: 20px; color: #312683; border-bottom: 2px solid #f9b232; padding-bottom: 10px;">Perfil de Talento</h4>
                        
                        @if($candidate->innate_talent)
                        <div style="margin-bottom: 20px;">
                            <h5 style="color: #312683; margin-bottom: 10px; font-size: 16px;">Talento Innato</h5>
                            <p style="color: #555; line-height: 1.6; text-align: justify;">{{ $candidate->innate_talent }}</p>
                        </div>
                        @endif

                        @if($candidate->potential_talent)
                        <div>
                            <h5 style="color: #312683; margin-bottom: 10px; font-size: 16px;">Talento Potencial</h5>
                            <p style="color: #555; line-height: 1.6; text-align: justify;">{{ $candidate->potential_talent }}</p>
                        </div>
                        @endif
                    </div>
                    @endif

                    <!-- Power Skills -->
                    @if($candidate->powerSkills && $candidate->powerSkills->count() > 0)
                    <div class="resume-block" style="background: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 30px;">
                        <h4 style="margin-bottom: 20px; color: #312683; border-bottom: 2px solid #f9b232; padding-bottom: 10px;">Power Skills</h4>
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 15px;">
                            @foreach($candidate->powerSkills as $skill)
                            <div style="background: #f9f9f9; padding: 12px 15px; border-radius: 6px; border-left: 3px solid #f9b232;">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <strong style="color: #312683; font-size: 14px;">{{ $skill->name }}</strong>
                                    <span style="background: #f9b232; color: #202124; padding: 3px 10px; border-radius: 12px; font-size: 12px; font-weight: bold;">
                                        Nivel {{ $skill->pivot->level }}
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Competencias Comportamentales -->
                    @if($candidate->behavioralCompetencies && $candidate->behavioralCompetencies->count() > 0)
                    <div class="resume-block" style="background: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 30px;">
                        <h4 style="margin-bottom: 20px; color: #312683; border-bottom: 2px solid #f9b232; padding-bottom: 10px;">Competencias Comportamentales (Martha Alles)</h4>
                        
                        @php
                            $grouped = $candidate->behavioralCompetencies->groupBy('category');
                        @endphp

                        @foreach($grouped as $category => $competencies)
                        <div style="margin-bottom: 25px;">
                            <h5 style="color: #312683; margin-bottom: 15px; font-size: 15px;">
                                @if($category == 'cardinal')
                                    Competencias Cardinales
                                @elseif($category == 'specific')
                                    Competencias Específicas
                                @else
                                    Competencias Técnicas
                                @endif
                            </h5>
                            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 15px;">
                                @foreach($competencies as $competency)
                                <div style="background: #f9f9f9; padding: 12px 15px; border-radius: 6px; border-left: 3px solid #312683;">
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <strong style="color: #312683; font-size: 14px;">{{ $competency->name }}</strong>
                                        <span style="background: #312683; color: white; padding: 3px 10px; border-radius: 12px; font-size: 12px; font-weight: bold;">
                                            Nivel {{ $competency->pivot->level }}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- Match Cultura Organizacional -->
                    @if($candidate->organizationalCultureValues && $candidate->organizationalCultureValues->count() > 0)
                    <div class="resume-block" style="background: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 30px;">
                        <h4 style="margin-bottom: 20px; color: #312683; border-bottom: 2px solid #f9b232; padding-bottom: 10px;">Valores Culturales que Busca</h4>
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 15px;">
                            @foreach($candidate->organizationalCultureValues->sortBy('pivot.priority') as $value)
                            <div style="background: #f9f9f9; padding: 12px 15px; border-radius: 6px; border-left: 3px solid #f9b232;">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
                                    <strong style="color: #312683; font-size: 14px;">{{ $value->name }}</strong>
                                    <span style="background: #f9b232; color: #202124; padding: 3px 10px; border-radius: 12px; font-size: 12px; font-weight: bold;">
                                        P{{ $value->pivot->priority }}
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Preferencias de Liderazgo -->
                    @if($candidate->leadershipPreferences && $candidate->leadershipPreferences->count() > 0)
                    <div class="resume-block" style="background: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 30px;">
                        <h4 style="margin-bottom: 20px; color: #312683; border-bottom: 2px solid #f9b232; padding-bottom: 10px;">Características que Busca en un Líder</h4>
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 15px;">
                            @foreach($candidate->leadershipPreferences->sortBy('pivot.importance') as $pref)
                            <div style="background: #f9f9f9; padding: 12px 15px; border-radius: 6px; border-left: 3px solid #312683;">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <strong style="color: #312683; font-size: 14px;">{{ $pref->name }}</strong>
                                    <span style="background: #312683; color: white; padding: 3px 10px; border-radius: 12px; font-size: 12px; font-weight: bold;">
                                        I{{ $pref->pivot->importance }}
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-12">
                    <!-- Contact Card -->
                    <div class="sidebar-widget" style="background: #f8f9fa; padding: 25px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 20px;">
                        <h4 style="margin-bottom: 20px; color: #312683;">Contact Information</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 15px; display: flex; align-items: center;">
                                <span class="icon flaticon-mail" style="color: #f9b232; margin-right: 10px; font-size: 18px;"></span>
                                <a href="mailto:{{ $candidate->email }}" style="color: #333; text-decoration: none;">{{ $candidate->email }}</a>
                            </li>
                            @if($candidate->phone_number)
                                <li style="margin-bottom: 15px; display: flex; align-items: center;">
                                    <span class="icon flaticon-phone" style="color: #f9b232; margin-right: 10px; font-size: 18px;"></span>
                                    <a href="tel:{{ $candidate->phone_number }}" style="color: #333; text-decoration: none;">{{ $candidate->phone_number }}</a>
                                </li>
                            @endif
                            <li style="margin-bottom: 15px; display: flex; align-items: center;">
                                <span class="icon flaticon-map-locator" style="color: #f9b232; margin-right: 10px; font-size: 18px;"></span>
                                <span style="color: #333;">{{ $candidate->city->name ?? '-' }}, {{ $candidate->city->state->code ?? '-' }}</span>
                            </li>
                        </ul>
                        <div style="margin-top: 25px;">
                            <a href="tel:{{ $candidate->phone_number }}" class="theme-btn btn-style-one" style="width: 100%; text-align: center; display: block;">
                                <span class="btn-title">Contact Candidate</span>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="sidebar-widget" style="background: #ffffff; padding: 25px; border-radius: 8px; border: 1px solid #e0e0e0;">
                        <h4 style="margin-bottom: 20px; color: #312683;">Quick Stats</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #e9ecef;">
                                <strong style="color: #666;">Experience:</strong>
                                <span style="float: right; color: #333;">{{ $candidate->workExperiences->count() }} positions</span>
                            </li>
                            <li style="margin-bottom: 0;">
                                <strong style="color: #666;">Education:</strong>
                                <span style="float: right; color: #333;">{{ $candidate->educationLevel->name ?? '-' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="row" style="margin-top: 30px;">
                <div class="col-12">
                    <a href="{{ route('web.candidate.index') }}" class="theme-btn btn-style-three">
                        <span class="btn-title">← Back to Candidates</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--End Candidate Detail Section -->

@endsection
