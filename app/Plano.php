<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Plano extends Model
{
    
    use SoftDeletes;

    protected $table = 'plano';
    protected $fillable = ['data_inicio','data_fim','taxa_id','mensalista_id'];

        
    // Relacionamento
    public function mensalista() {
        return $this->belongsTo('App\Mensalista', 'mensalista_id');
    }
    public function taxa() {
        return $this->belongsTo('App\Taxas', 'taxa_id');
    }

}
