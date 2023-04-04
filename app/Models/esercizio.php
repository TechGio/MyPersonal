<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class esercizio extends Model {

    use HasFactory;

    protected $table = 'esercizio';
    protected $fillable = ['id_scheda', 'nome', 'serie', 'ripetizioni', 'recupero'];
    public $timestamps = false;
    
    public function schede(){
        return $this->belongsTo('App\Models\scheda');
    }
    
    
}
