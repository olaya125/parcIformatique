<?php

namespace App\Http\Controllers;

use App\Models\Etablisement;
use Illuminate\Http\Request;

class etablisementController extends Controller
{
    //
    public function index(){
        $etablisements=Etablisement::with('materials','users')->get();
        return view('backend.material.all-user-material',compact('etablisements'));
    }
}
