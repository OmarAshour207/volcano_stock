<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Support\Facades\App;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('language')) {
            $lang = Language::where('id',session()->get('language'))->first();
            App::setLocale($lang->symbol);
        } elseif (!session()->has('language')) {
            App::setlocale('ar');
        }

        return $next($request);
    }
}
