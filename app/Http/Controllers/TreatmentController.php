<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function status()
    {
        return view('treatment.status');
    }

    public function repaint(){

        return view('treatment.repaint');

     }

     public function repair(){

        return view('treatment.repair');

     }

     public function unyellowing(){

        return view('treatment.unyellowing');

     }
}
