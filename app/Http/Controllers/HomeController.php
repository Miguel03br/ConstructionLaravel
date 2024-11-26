<?php

namespace App\Http\Controllers;

use App\Models\constructions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $Constructions = constructions::all();

        
        return view('constructions', ['Constructions' => $Constructions]);
    }
}