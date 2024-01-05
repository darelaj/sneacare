<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function status()
    {
        return view('treatment.status');
    }
}
