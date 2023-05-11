<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function ShowMap(){
        return view('backend.graph.graph');
    }
}
