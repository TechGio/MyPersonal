<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataLayer;

class SchedaPersonaleController extends Controller
{
    public function getPage($idScheda) {
        
        $dl = new dataLayer();
        $userID = auth()->id();
        $eserciziList = $dl->listEsercizi($idScheda);
        $nomeScheda = $dl->getNomeScheda($idScheda);
        return view('schedaPersonale')->with('nomeScheda',$nomeScheda)->with('id_scheda',$idScheda)->with('eserciziList', $eserciziList);
    }
    
    public function saveEdit($idScheda, Request $request) {
        
        $dl = new dataLayer();
        $userID = auth()->id();
        $nome = $request->get('nome');
        $serie = $request->get('serie');
        $ripetizioni = $request->get('ripetizioni');
        $recupero = $request->get('recupero');
        $idEsercizio = $request->get('id');
        
        for($j=0; $j<count($idEsercizio);$j++){
            $dl->deleteEsercizio($idEsercizio[$j]);
        }
        
        for($i=0; $i<count($nome);$i++){
            $dl->saveEsercizio($idScheda, $nome[$i], $serie[$i], $ripetizioni[$i], $recupero[$i]);
        }
        
        $schedeList = $dl->listSchede($userID);
        return view('schedePersonali')->with('schedeList', $schedeList);
    }
    
    public function edit($idScheda){
        $dl = new dataLayer();
        $userID = auth()->id();
        $eserciziList = $dl->listEsercizi($idScheda);
        $nomeScheda = $dl->getNomeScheda($idScheda);
        return view('editSchedaPersonale')->with('nomeScheda',$nomeScheda)->with('id_scheda',$idScheda)->with('eserciziList', $eserciziList);
    }
    
    public function deleteEsercizio($idScheda, $idEsercizio) {
        
        $dl = new dataLayer();
        $userID = auth()->id();
        $dl->deleteEsercizio($idEsercizio);
        $eserciziList = $dl->listEsercizi($idScheda);
        $nomeScheda = $dl->getNomeScheda($idScheda);
        return view('editSchedaPersonale')->with('nomeScheda',$nomeScheda)->with('id_scheda',$idScheda)->with('eserciziList', $eserciziList);
    }
    
    //restituisce la pagina Create
     public function getCreatePage($nomeScheda) {
        
        $dl = new dataLayer();
        $userID = auth()->id();
        $schedeList = $dl->listSchede($userID);
        return view('createSchedaPersonale')->with('nomeScheda', $nomeScheda)->with('schedeList', $schedeList);
    }
}
