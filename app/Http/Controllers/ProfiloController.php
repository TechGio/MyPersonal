<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\dataLayer;
use App\Models\User;

class ProfiloController extends Controller {

    public function getProfile() {

        $dl = new dataLayer();
        $userID = auth()->id();
        $sesso = $dl->getSesso($userID);
        $età = $dl->getEtà($userID);
        $altezza = $dl->getAltezza($userID);
        $peso = $dl->getPeso($userID);
        return view('profile')->with('sesso', $sesso)->with('età', $età)
                        ->with('altezza', $altezza)->with('peso', $peso);
    }

    public function getEditProfile() {

        $dl = new dataLayer();
        $userID = auth()->id();
        $sesso = $dl->getSesso($userID);
        $età = $dl->getEtà($userID);
        $altezza = $dl->getAltezza($userID);
        $peso = $dl->getPeso($userID);
        $password = $dl->getPassword($userID);
        $email = $dl->getEmail($userID);
        return view('editProfile')->with('sesso', $sesso)->with('età', $età)->with('altezza', $altezza)
                        ->with('peso', $peso)->with('password', $password)->with('email', $email);
    }

    public function editProfile(Request $request) {

        $dl = new dataLayer();
        $userID = auth()->id();
        if (($request->input('newPassword') != null)) {
            $dl->editUtentePass($userID,$request->input('newPassword'), $request->input('età'), $request->input('peso'), $request->input('altezza'));
        } else {
            $dl->editUtente($userID, $request->input('età'), $request->input('peso'), $request->input('altezza'));
        }
        return Redirect::to(route('profilo'));
    }

}
