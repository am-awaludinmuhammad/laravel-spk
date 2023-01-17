<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BobotController extends Controller
{
    public function bobot()
    {
        return view('bobot');
    }
}
