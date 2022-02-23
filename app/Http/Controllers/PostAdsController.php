<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostAdsController extends Controller
{
   public function index(){
       return view('postads');
   }

}
