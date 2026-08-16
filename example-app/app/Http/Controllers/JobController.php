<?php

namespace App\Http\Controllers;

use App\Models\Postions;
use Illuminate\Http\Request;
use \Illuminate\Support\Arr;

class JobController extends Controller

{
    public function jobs(){

        $jobs = Postions::all();
        
          
    

    return view('jobs',compact('jobs') );
   }
    }

