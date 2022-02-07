<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoommatesController extends Controller
{
    public function index(){
        return view('roommates');
    }
}
