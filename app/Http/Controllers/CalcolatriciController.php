<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataLayer;
use App\Models\User;

class CalcolatriciController extends Controller {

    public function getPage() {
        
        $dl = new dataLayer();
        $userID = auth()->id();

        if ($userID!= null) {
            $sesso = $dl->getSesso($userID);
            $età = $dl->getEtà($userID);
            $altezza = $dl->getAltezza($userID);
            $peso = $dl->getPeso($userID);
            return view('calcolatrici')->with('userID', $userID)->with('sesso', $sesso)->with('età', $età)->with('altezza', $altezza)->with('peso', $peso);
        } else {
            return view('calcolatrici')->with('userID', $userID);
        }
    }

}
