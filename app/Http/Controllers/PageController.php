<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        return view('pages.homepage');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function administration()
    {
        return view('pages.administration');
    }

    public function stadiums()
    {
        return view('pages.stadiums');
    }

    public function history()
    {
        return view('pages.history');
    }
}
