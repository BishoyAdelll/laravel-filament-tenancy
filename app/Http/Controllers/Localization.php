<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Localization extends Controller
{
    public function __invoke($locale)
    {
        if(!in_array($locale,config('Localization.locales'))){
            abort(400);
        }
        session(['localization' => $locale]);
        return redirect()->back();
    }
}
