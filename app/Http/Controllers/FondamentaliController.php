<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataLayer;

class FondamentaliController extends Controller {

    public function getPage() {

        $dl = new dataLayer();
        $userID = auth()->id();
        return view('fondamentali');
    }

}
