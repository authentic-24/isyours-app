@extends('layouts/app2')

@section('dashboard_title', 'Dashboard: Candidato')

@section('content')
<style>
.can-wrap {
    padding: 22px;
    background: radial-gradient(circle at top right, #e4dfff 0%, #f9f9ff 60%);
}

.can-head {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 16px;
}

.can-title {
    margin: 0;
    font-size: 2rem;
    font-weight: 800;
    color: #1a086e;
}

.can-subtitle {
    margin: 6px 0 0;
    color: #474551;
}

.can-actions {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.can-btn {
    border-radius: 10px;
    padding: 9px 12px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
}

.can-btn.primary {
    border: none;
    color: #fff;
    background: linear-gradient(135deg, #4b41df 0%, #312783 100%);
}

.can-btn.light {
    border: 1px solid #c8c4d3;
    color: #312783;
    background: #fff;
}

.can-kpis {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 12px;
    margin-bottom: 14px;
}

.can-kpi {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(200, 196, 211, 0.7);
    border-radius: 14px;
    padding: 12px;
    box-shadow: 0 8px 24px rgba(49, 39, 131, 0.08);
}

.can-kpi small {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: #5a52ae;
    font-weight: 700;
}

.can-kpi h4 {
    margin: 7px 0 0;
    font-size: 1.5rem;
    color: #151c27;
    font-weight: 800;
}

.can-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.can-panel {
    background: #fff;
    border: 1px solid #e1e3e4;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(49, 39, 131, 0.08);
    overflow: hidden;
}

.can-panel h5 {
    margin: 0;
    padding: 14px;
    border-bottom: 1px solid #f0f3ff;
    font-size: 14px;
    font-weight: 800;
    color: #1a086e;
}

.can-item {
    padding: 12px 14px;
    border-bottom: 1px solid #f0f3ff;
}

.can-item:last-child {
    border-bottom: none;
}

.can-item-title {
    font-weight: 700;
    color: #151c27;
    margin-bottom: 3px;
}

.can-muted {
    font-size: 12px;
    color: #5f5b6b;
}

@media (max-width: 1100px) {
    .can-kpis {
        grid-template-columns: 1fr;
    }

    .can-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="can-wrap">
            <div class="can-head">
                <div>
                    <h1 class="can-title">Candidate Dashboard</h1>
                    <p class="can-subtitle">Bienvenido {{ $user->first_name }}. Explora vacantes y da seguimiento a tus postulaciones.</p>
                </div>
                <div class="can-actions">
                    <a href="{{ route('web.offer.index') }}" class="can-btn primary">Explorar vacantes</a>
                    <a href="{{ route('web.candidate.my_applications') }}" class="can-btn light">Mis aplicaciones</a>
                    <a href="{{ route('web.profile.edit') }}" class="can-btn light">Editar perfil</a>
                </div>
            </div>

            <div class="can-kpis">
                <div class="can-kpi"><small>Aplicaciones</small><h4>{{ $total_applications }}</h4></div>
                <div class="can-kpi"><small>Recomendadas</small><h4>{{ $recommended_jobs->count() }}</h4></div>
                <div class="can-kpi"><small>Nuevas vacantes</small><h4>{{ $latest_jobs->count() }}</h4></div>
            </div>

            @if($recent_applications->count() > 0)
                <div class="can-panel" style="margin-bottom:12px;">
                    <h5>Postulaciones recientes</h5>
                    @foreach($recent_applications as $application)
                        <div class="can-item">
                            <div class="can-item-title">
                                <a href="{{ route('web.offer.show', $application->id) }}">{{ $application->jobTitle->name ?? 'N/A' }} - {{ $application->jobLevel->name ?? 'N/A' }}</a>
                            </div>
                            <div class="can-muted">
                                {{ $application->company->name ?? 'N/A' }} | {{ $application->city->name ?? 'N/A' }}
                                @if($application->offered_salary)
                                    | ${{ number_format($application->offered_salary) }}
                                @endif
                            </div>
                            <div class="can-muted">Aplicado {{ $application->pivot && $application->pivot->created_at ? $application->pivot->created_at->diffForHumans() : 'N/A' }}</div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="can-grid">
                <div class="can-panel">
                    <h5>Vacantes recomendadas</h5>
                    @forelse($recommended_jobs as $job)
                        <div class="can-item">
                            <div class="can-item-title"><a href="{{ route('web.offer.show', $job->id) }}">{{ $job->jobTitle->name ?? 'N/A' }} - {{ $job->jobLevel->name ?? 'N/A' }}</a></div>
                            <div class="can-muted">{{ $job->company->name ?? 'N/A' }} | {{ $job->city->name ?? 'N/A' }}</div>
                            @if($job->offered_salary)
                                <div class="can-muted">Salario: ${{ number_format($job->offered_salary) }}</div>
                            @endif
                        </div>
                    @empty
                        <div class="can-item">No hay vacantes recomendadas por el momento.</div>
                    @endforelse
                </div>

                <div class="can-panel">
                    <h5>Ultimas vacantes</h5>
                    @forelse($latest_jobs as $job)
                        <div class="can-item">
                            <div class="can-item-title"><a href="{{ route('web.offer.show', $job->id) }}">{{ $job->jobTitle->name ?? 'N/A' }} - {{ $job->jobLevel->name ?? 'N/A' }}</a></div>
                            <div class="can-muted">{{ $job->company->name ?? 'N/A' }} | {{ $job->city->name ?? 'N/A' }}</div>
                            <div class="can-muted">{{ $job->created_at ? $job->created_at->diffForHumans() : 'N/A' }}</div>
                        </div>
                    @empty
                        <div class="can-item">No hay vacantes disponibles en este momento.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
