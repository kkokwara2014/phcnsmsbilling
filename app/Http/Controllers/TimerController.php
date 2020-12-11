<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimerController extends Controller
{
    public function index()
    {
        // $timeIt = '20--29';
        // if ($timeIt > date('Y-m-d')) {
        return view('auth.login');
        // } else {
        // }
    }
    public function calldeveloper()
    {
        return view('calldeveloper.callus');
    }
}
