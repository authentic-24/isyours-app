<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Obtener el locale de la sesión, si no existe usa el predeterminado
        $locale = session('locale', config('app.locale', 'en'));

        \Log::info('SetLocale middleware - Session locale: ' . session('locale', 'not set'));
        \Log::info('SetLocale middleware - Using locale: ' . $locale);

        // Verifica si el valor es 'en' o 'es'; de lo contrario, utiliza el valor predeterminado
        $locale = in_array($locale, ['en', 'es']) ? $locale : config('app.locale', 'en');

        // Establece el locale de la aplicación
        app()->setLocale($locale);

        \Log::info('SetLocale middleware - App locale set to: ' . app()->getLocale());

        return $next($request);
    }
}
