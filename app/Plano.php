<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Plano extends Model
{
    
    use SoftDeletes;

    protected $table = 'plano';
    protected $fillable = ['data_inicio','data_fim','valor','mensalista_id'];

        
    // Relacionamento
    public function mensalista() {
        return $this->hasOne('App\Mensalista');
    }
}
