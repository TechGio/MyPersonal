<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\dataLayer;

class SchedePersonaliController extends Controller
{
     public function getPage() {
        
        $dl = new dataLayer();
        $userID = auth()->id();
        $schedeList = $dl->listSchede($userID);
        return view('schedePersonali')->with('schedeList', $schedeList);
    }
    
    public function confirmDelete($id) {
        
        $dl = new dataLayer();
        $userID = auth()->id();
        $dl->deleteScheda($id);
        $schedeList = $dl->listSchede($userID);
        return view('schedePersonali')->with('schedeList', $schedeList);
    }
    
    public function create($nomeScheda, Request $request) {
        
        $dl = new dataLayer();
        $userID = auth()->id();
        $dl->saveScheda($nomeScheda, $userID);
        $idScheda = $dl->getSchedaID($userID, $nomeScheda);
        $nome = $request->get('nome');
        $serie = $request->get('serie');
        $ripetizioni = $request->get('ripetizioni');
        $recupero = $request->get('recupero');
        
        for($i=0; $i<count($nome);$i++){
            $dl->saveEsercizio($idScheda, $nome[$i], $serie[$i], $ripetizioni[$i], $recupero[$i]);
        }
        
        $schedeList = $dl->listSchede($userID);
        return view('schedePersonali')->with('schedeList', $schedeList);
    }
}
