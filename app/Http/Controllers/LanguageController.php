<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Translate;

class LanguageController extends Controller
{
    public function changeLanguage(String $lang): \Illuminate\Http\RedirectResponse
    {
        Translate::setLocale($lang);

        $previous = \URL::previous();

        if (($pos = strpos($previous, '?')) !== false) {
            $previous = substr($previous, 0, $pos);
        }

        $route = app('router')->getRoutes()->match(app('request')->create($previous));
        $name = $route->getName();

        if ($name === 'change-language') {
            $previous = $name = null;
        }

        if ($previous && $lang !== 'pt') {
            $previous .= "?lang=$lang";
        }

        $previous = ($previous) ? $previous : \route('home');

        return redirect($previous);
    }
}
