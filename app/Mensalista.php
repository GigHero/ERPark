<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Mensalista extends Model
{
    use SoftDeletes;

    protected $table = 'mensalista';
    protected $fillable = ['nome','email','cpf','telefone'];
    
    //Relacionamentos
    public function planos(){
        return $this->hasOne('App\Plano');
    }    

}
