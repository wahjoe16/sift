<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('beranda');
    }

    public function indexSidang()
    {
        return view('sidang');
    }

    public function indexData()
    {
        return view('data');
    }
}
