<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function menuglowne()
    {
        return view('tresc.menu-glowne', ['menuGlowne'=>'tak']);
    }
}
