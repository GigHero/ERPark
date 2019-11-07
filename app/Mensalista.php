<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mensalista extends Model
{
    use SoftDeletes;

    protected $table = 'mensalista';
    protected $fillable = ['nome','email','cpf','telefone'];
    
    //Relacionamentos
    public function planos(){
        return $this->belongsTo('App\Plano');
    }    


}
