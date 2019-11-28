<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Plano extends Model
{
    protected $table = 'plano';
    protected $fillable = ['data_inicio','data_fim','taxa_id','mensalista_id'];

        
    // Relacionamento
    public function mensalista() {
        return $this->belongsTo('App\Mensalista');
    }
    
    public function taxa() {
        return $this->belongsTo('App\Taxas');
    }

}
