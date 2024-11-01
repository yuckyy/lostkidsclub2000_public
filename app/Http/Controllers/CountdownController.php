<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountdownController extends Controller
{
    public function index()
    {

        $serverTime = time() + 6 * 24 * 60 * 60;

        return view('countdown', ['serverTime' => $serverTime]);
    }
}
