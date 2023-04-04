<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\dataLayer;

class FrontController extends Controller
{
    public function getHome(){
        
        $dl = new dataLayer();
        $userID = auth()->id();
        
        return view('index');
    }
}

