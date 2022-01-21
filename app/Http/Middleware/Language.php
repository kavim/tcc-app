<?php

namespace App\Http\Middleware;

use App\Helpers\Translate;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Language
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
        Translate::setLocale();

        $lang = $request->input('lang')
            ?? $request->header('X-Language')
            ?? $request->header('Lang')
            ?? Session::get('locale')
            ?? $request->getPreferredLanguage()
            ?? App::getLocale();

        if (strlen($lang) > 2) {
            $lang = substr($lang, 0, 2);
        }

        Translate::setLocale($lang);

        return $next($request);
    }
}
