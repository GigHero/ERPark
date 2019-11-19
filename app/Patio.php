<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patio extends Model
{
    use SoftDeletes;

    protected $table = 'patio';
    protected $fillable = ['entrada','saida','placa','obs','vaga','valor','taxa_id','mensalista_id'];


    // Relacionamento
    public function mensalista() {
        return $this->hasOne('App\Mensalista');
    }
    public function taxa() {
        return $this->hasOne('App\Taxas');
    }
    
    
}
