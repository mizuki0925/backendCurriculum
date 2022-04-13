<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('property/index');
    }

    public function regist()
    {
        return view('property/regist');
    }

    public function edit()
    {
        return view('property/edit');
    }

    public function spec()
    {
        return view('property/spec');
    }
}
