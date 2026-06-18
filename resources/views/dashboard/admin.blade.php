@extends('layouts/app2')

@section('content')
<style>
.adm-wrap {
    padding: 22px;
    background: radial-gradient(circle at top right, #e4dfff 0%, #f9f9ff 60%);
}

.adm-title {
    font-size: 2rem;
    margin-bottom: 4px;
    color: #1a086e;
    font-weight: 800;
}

.adm-subtitle {
    color: #474551;
    margin-bottom: 18px;
}

.adm-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 14px;
    margin-bottom: 16px;
}

.adm-card {
    background: rgba(255, 255, 255, 0.85);
    border: 1px solid rgba(200, 196, 211, 0.7);
    border-radius: 16px;
    padding: 14px;
    box-shadow: 0 8px 24px rgba(49, 39, 131, 0.08);
}

.adm-label {
    margin: 0;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: #5a52ae;
}

.adm-value {
    margin: 8px 0 0;
    font-size: 1.6rem;
    font-weight: 800;
    color: #151c27;
}

.adm-panels {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 14px;
}

.adm-panel {
    background: #ffffff;
    border: 1px solid #e1e3e4;
    border-radius: 18px;
    box-shadow: 0 10px 30px rgba(49, 39, 131, 0.08);
    overflow: hidden;
}

.adm-panel-head {
    padding: 14px 16px;
    border-bottom: 1px solid #ece9f6;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.adm-panel-head h5 {
    margin: 0;
    font-size: 15px;
    font-weight: 800;
    color: #1a086e;
}

.adm-table {
    width: 100%;
    font-size: 13px;
}

.adm-table th,
.adm-table td {
    padding: 10px 14px;
    border-bottom: 1px solid #f0f3ff;
    vertical-align: middle;
}

.adm-table th {
    font-size: 11px;
    color: #5f5b6b;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.adm-chip {
    background: #f0f3ff;
    border: 1px solid #dce2f3;
    color: #312783;
    border-radius: 999px;
    padding: 3px 10px;
    font-size: 11px;
    font-weight: 700;
}

@media (max-width: 1200px) {
    .adm-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .adm-panels {
        grid-template-columns: 1fr;
    }
}
</style>

<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="adm-wrap">
            <h1 class="adm-title">Admin Dashboard</h1>
            <p class="adm-subtitle">Vista general de la plataforma con estadisticas clave y actividad reciente.</p>

            <div class="adm-grid">
                <div class="adm-card"><p class="adm-label">Usuarios</p><p class="adm-value">{{ $total_users }}</p></div>
                <div class="adm-card"><p class="adm-label">Candidatos</p><p class="adm-value">{{ $total_candidates }}</p></div>
                <div class="adm-card"><p class="adm-label">Empleadores</p><p class="adm-value">{{ $total_employers }}</p></div>
                <div class="adm-card"><p class="adm-label">Ofertas</p><p class="adm-value">{{ $total_offers }}</p></div>
                <div class="adm-card"><p class="adm-label">Ofertas activas</p><p class="adm-value">{{ $active_offers }}</p></div>
                <div class="adm-card"><p class="adm-label">Ofertas expiradas</p><p class="adm-value">{{ $expired_offers }}</p></div>
                <div class="adm-card"><p class="adm-label">Aplicaciones</p><p class="adm-value">{{ $total_applications }}</p></div>
                <div class="adm-card"><p class="adm-label">Top empresas</p><p class="adm-value">{{ $top_companies->count() }}</p></div>
            </div>

            <div class="adm-panels">
                <div class="adm-panel">
                    <div class="adm-panel-head">
                        <h5>Ofertas recientes</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="adm-table">
                            <thead>
                                <tr>
                                    <th>Puesto</th>
                                    <th>Empresa</th>
                                    <th>Ciudad</th>
                                    <th>Publicada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recent_offers as $offer)
                                    <tr>
                                        <td><a href="{{ route('web.offer.show', $offer->id) }}">{{ $offer->jobTitle->name ?? 'N/A' }}</a></td>
                                        <td>{{ $offer->company->name ?? 'N/A' }}</td>
                                        <td>{{ $offer->city->name ?? 'N/A' }}</td>
                                        <td>{{ $offer->created_at ? $offer->created_at->diffForHumans() : 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="text-center">Sin datos</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="adm-panel">
                    <div class="adm-panel-head">
                        <h5>Top empresas</h5>
                    </div>
                    <div style="padding: 12px 14px;">
                        @forelse($top_companies as $company)
                            <div style="display:flex; justify-content:space-between; align-items:center; padding:10px 0; border-bottom:1px solid #f0f3ff;">
                                <div>
                                    <div style="font-weight:700; color:#151c27;">{{ $company->name }}</div>
                                    <small style="color:#5f5b6b;">{{ $company->email }}</small>
                                </div>
                                <span class="adm-chip">{{ $company->job_offers_count }} ofertas</span>
                            </div>
                        @empty
                            <p class="mb-0">Sin empresas registradas.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="adm-panel" style="margin-top:14px;">
                <div class="adm-panel-head">
                    <h5>Usuarios recientes</h5>
                </div>
                <div class="table-responsive">
                    <table class="adm-table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_users as $user)
                                <tr>
                                    <td>{{ trim(($user->first_name ?? '') . ' ' . ($user->last_name ?? '')) ?: 'N/A' }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at ? $user->created_at->diffForHumans() : 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center">Sin datos</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
