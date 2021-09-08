<?php

namespace App\Http\Controllers;

class LocaleController extends Controller
{
    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }
}
