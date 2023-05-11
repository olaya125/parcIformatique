<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(){
        $materials=Material::all();
        return view('backend.material.all-user-material',compact('materials'));
    }
}
