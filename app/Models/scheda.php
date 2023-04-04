<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scheda extends Model {

    use HasFactory;

    protected $table = 'scheda';
    protected $fillable = ['id_utente', 'nome'];
    public $timestamps = false;
    
     public function utenti(){
        return $this->belongsTo('App\Models\User');
    }
    
     public function esercizi(){
        return $this->hasMany('App\Models\esercizio');
    }

}
