@extends('layouts/app2')

@section('content')
<style>
.emp-wrap {
    padding: 22px;
    background: radial-gradient(circle at top right, #e4dfff 0%, #f9f9ff 60%);
}

.emp-head {
    display: flex;
    justify-content: space-between;
    gap: 12px;
    align-items: flex-end;
    margin-bottom: 16px;
}

.emp-title {
    margin: 0;
    font-size: 2rem;
    font-weight: 800;
    color: #1a086e;
}

.emp-subtitle {
    color: #474551;
    margin: 6px 0 0;
}

.emp-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.emp-btn {
    border: none;
    border-radius: 10px;
    padding: 10px 14px;
    font-size: 13px;
    font-weight: 700;
    color: #fff;
    background: linear-gradient(135deg, #4b41df 0%, #312783 100%);
}

.emp-btn.alt {
    background: #fff;
    color: #312783;
    border: 1px solid #c8c4d3;
}

.emp-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 12px;
    margin-bottom: 14px;
}

.emp-kpi {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(200, 196, 211, 0.7);
    border-radius: 14px;
    padding: 12px;
    box-shadow: 0 8px 24px rgba(49, 39, 131, 0.08);
}

.emp-kpi small {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: #5a52ae;
    font-weight: 700;
}

.emp-kpi h4 {
    margin: 7px 0 0;
    font-size: 1.5rem;
    color: #151c27;
    font-weight: 800;
}

.emp-layout {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 12px;
}

.emp-panel {
    background: #fff;
    border: 1px solid #e1e3e4;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(49, 39, 131, 0.08);
    overflow: hidden;
}

.emp-panel h5 {
    margin: 0;
    padding: 14px;
    border-bottom: 1px solid #f0f3ff;
    font-size: 14px;
    font-weight: 800;
    color: #1a086e;
}

.emp-item {
    padding: 12px 14px;
    border-bottom: 1px solid #f0f3ff;
}

.emp-item:last-child {
    border-bottom: none;
}

.emp-item-title {
    font-weight: 700;
    color: #151c27;
    margin-bottom: 4px;
}

.emp-muted {
    font-size: 12px;
    color: #5f5b6b;
}

.emp-badge {
    display: inline-block;
    border-radius: 999px;
    padding: 2px 8px;
    font-size: 11px;
    font-weight: 700;
}

.emp-badge.active { background: #dcfce7; color: #166534; }
.emp-badge.expired { background: #fee2e2; color: #991b1b; }

@media (max-width: 1200px) {
    .emp-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .emp-layout {
        grid-template-columns: 1fr;
    }
}
</style>

<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="emp-wrap">
            @if(!$company)
                <div class="emp-panel" style="padding:18px; max-width:680px;">
                    <h5 style="padding:0; border:none; margin-bottom:10px;">Perfil de empresa requerido</h5>
                    <p style="margin-bottom:14px;">Debes crear tu perfil de empresa para publicar ofertas y gestionar postulaciones.</p>
                    <a href="{{ route('web.company.create') }}" class="emp-btn">Crear perfil de empresa</a>
                </div>
            @else
                <div class="emp-head">
                    <div>
                        <h1 class="emp-title">Employer Dashboard</h1>
                        <p class="emp-subtitle">{{ $company->name }}. Gestiona vacantes, aplicaciones y candidatos en una sola vista.</p>
                    </div>
                    <div class="emp-actions">
                        <a href="{{ route('web.offer.create') }}" class="emp-btn">Publicar vacante</a>
                        <a href="{{ route('web.candidate.index') }}" class="emp-btn alt">Ver candidatos</a>
                        <a href="{{ route('web.company.create') }}" class="emp-btn alt">Editar empresa</a>
                    </div>
                </div>

                <div class="emp-grid">
                    <div class="emp-kpi"><small>Ofertas totales</small><h4>{{ $total_offers }}</h4></div>
                    <div class="emp-kpi"><small>Activas</small><h4>{{ $active_offers }}</h4></div>
                    <div class="emp-kpi"><small>Expiradas</small><h4>{{ $expired_offers }}</h4></div>
                    <div class="emp-kpi"><small>Aplicaciones</small><h4>{{ $total_applications }}</h4></div>
                </div>

                <div class="emp-layout">
                    <div class="emp-panel">
                        <h5>Vacantes recientes</h5>
                        @forelse($recent_offers as $offer)
                            <div class="emp-item">
                                <div style="display:flex; justify-content:space-between; gap:10px;">
                                    <div>
                                        <div class="emp-item-title">
                                            <a href="{{ route('web.offer.show', $offer->id) }}">{{ $offer->jobTitle->name ?? 'N/A' }} - {{ $offer->jobLevel->name ?? 'N/A' }}</a>
                                        </div>
                                        <div class="emp-muted">
                                            {{ $offer->city->name ?? 'N/A' }} | {{ $offer->users->count() }} aplicaciones | {{ $offer->created_at ? $offer->created_at->diffForHumans() : 'N/A' }}
                                        </div>
                                    </div>
                                    <div>
                                        @if($offer->expiration_date > now())
                                            <span class="emp-badge active">Activa</span>
                                        @else
                                            <span class="emp-badge expired">Expirada</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="emp-item">No hay vacantes registradas.</div>
                        @endforelse
                    </div>

                    <div class="emp-panel">
                        <h5>Postulaciones recientes</h5>
                        @forelse($recent_applications as $application)
                            <div class="emp-item">
                                <div class="emp-item-title">{{ $application->first_name }} {{ $application->last_name }}</div>
                                <div class="emp-muted">{{ $application->email }}</div>
                                <div class="emp-muted">{{ $application->applied_at ? \Carbon\Carbon::parse($application->applied_at)->diffForHumans() : 'N/A' }}</div>
                            </div>
                        @empty
                            <div class="emp-item">No hay aplicaciones recientes.</div>
                        @endforelse
                    </div>
                </div>

                @if($popular_offers->count() > 0)
                    <div class="emp-panel" style="margin-top:12px;">
                        <h5>Vacantes mas populares</h5>
                        @foreach($popular_offers as $offer)
                            <div class="emp-item" style="display:flex; justify-content:space-between; align-items:center;">
                                <div>
                                    <div class="emp-item-title">
                                        <a href="{{ route('web.offer.show', $offer->id) }}">{{ $offer->jobTitle->name ?? 'N/A' }}</a>
                                    </div>
                                    <div class="emp-muted">{{ $offer->created_at ? $offer->created_at->diffForHumans() : 'N/A' }}</div>
                                </div>
                                <span class="emp-badge active">{{ $offer->users_count }} aplicaciones</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif
        </div>
    </div>
</section>
@endsection
