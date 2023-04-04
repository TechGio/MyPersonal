<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use App\Models\esercizio;
use App\Models\scheda;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * Description of dataLayer
 *
 * @author giorg
 */
class dataLayer {

    public function listSchede($id_utente) {
        $schede = scheda::where('id_utente', $id_utente)->orderBy('nome', 'asc')->get();
        return $schede;
    }

    public function listEsercizi($id_scheda) {
        $esercizi = esercizio::where('id_scheda', $id_scheda)->orderBy('nome', 'asc')->get();
        return $esercizi;
    }

    public function findUtente($id) {
        return User::where('id', $id);
    }

    public function findScheda($id) {
        return scheda::where('id', $id);
    }

    public function deleteScheda($id) {
        esercizio::where('id_scheda', $id)->delete();
        $scheda = scheda::find($id);
        $scheda->delete();
    }

    public function deleteEsercizio($id) {
        $esercizio = esercizio::find($id);
        $esercizio->delete();
    }

    public function deleteEsercizi($id_scheda) {
        esercizio::where('id_scheda', $id_scheda)->delete();
    }

    public function editUtente($id, $età, $peso, $altezza) {
        User::where('id', $id)->update(['età' => (int) $età, 'peso' => $peso, 'altezza' => (int) $altezza]);
    }

    public function editUtentePass($id, $password, $età, $peso, $altezza) {
        User::where('id', $id)->update(['password' => (string) md5($password), 'età' => (int) $età, 'peso' => $peso, 'altezza' => (int) $altezza]);
    }

    public function findSchedeByUtenteID($id_utente) {
        $schede = scheda::where('id_utente', $id_utente)->get();
        if (count($schede) != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserID($email) {
        $idUtente = User::where('email', $email)->value('id');
        return $idUtente;
    }

    public function getSesso($id) {
        $sesso = User::where('id', $id)->value('sesso');
        return $sesso;
    }

    public function getEtà($id) {
        $età = User::where('id', $id)->value('età');
        return $età;
    }

    public function getAltezza($id) {
        $altezza = User::where('id', $id)->value('altezza');
        return $altezza;
    }

    public function getPeso($id) {
        $peso = User::where('id', $id)->value('peso');
        return $peso;
    }

    public function getPassword($id) {
        $password = User::where('id', $id)->value('password');
        return $password;
    }

    public function getEmail($id) {
        $email = User::where('id', $id)->value('email');
        return $email;
    }

    public function getSchedaID($idUtente, $nomeScheda) {
        $id = scheda::where('id_utente', $idUtente)->where('nome', $nomeScheda)->value('id');
        return $id;
    }

    public function getNomeScheda($idScheda) {
        $nome = scheda::where('id', $idScheda)->value('nome');
        return $nome;
    }

    public function saveScheda($nomeScheda, $idUtente) {
        $scheda = new scheda();
        $scheda->nome = $nomeScheda;
        $scheda->id_utente = $idUtente;
        $scheda->save();
    }

    public function saveEsercizio($idScheda, $nome, $serie, $ripetizioni, $recupero) {
        $es = new esercizio();
        $es->id_scheda = $idScheda;
        $es->nome = $nome;
        $es->serie = $serie;
        $es->ripetizioni = $ripetizioni;
        $es->recupero = $recupero;
        $es->save();
    }

}
