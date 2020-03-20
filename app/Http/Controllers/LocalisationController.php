<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LocalisationController extends Controller
{

    public function setLanguage($language)
    {
        Session::put('locale', $language);
        return redirect()->back();
    }
}
