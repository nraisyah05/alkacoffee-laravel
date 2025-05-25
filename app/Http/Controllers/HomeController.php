<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('general.home');
    }

    public function loginadmin()
    {
        return view('general.admin');
    }

    public function successadmin()
    {
        return view('dashboard');
    }
}
