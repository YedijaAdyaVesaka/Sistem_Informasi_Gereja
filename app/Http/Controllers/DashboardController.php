<?php

namespace App\Http\Controllers;

use App\Models\Baptis;
use App\Models\Jemaat;
use App\Models\Majelis;
use App\Models\Pernikahan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jemaat = Jemaat::count();
        $majelis = Majelis::count();
        $pernikahan = Pernikahan::count();
        $baptis = Baptis::count();
        return view('layouts.dashboard', compact('jemaat','majelis','pernikahan','baptis'));
    }
}
