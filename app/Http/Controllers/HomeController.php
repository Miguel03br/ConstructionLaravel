<?php

namespace App\Http\Controllers;

use App\Models\constructions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $allConstructions = constructions::all();
        
        return redirect()->route('ConstructionControllerIndex', ['allConstructions' => $allConstructions]);
    }
}