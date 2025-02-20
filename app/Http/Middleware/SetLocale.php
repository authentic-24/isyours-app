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
        // Obtén el valor del parámetro 'locale' de la URL
        $locale = $request->segment(1);

        // Verifica si el valor es 'en' o 'es'; de lo contrario, utiliza el valor predeterminado
        $locale = in_array($locale, ['en', 'es']) ? $locale : config('app.locale');

        // Establece el locale de la aplicación
        app()->setLocale($locale);

        return $next($request);
    }
}
