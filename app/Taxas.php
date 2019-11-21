<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taxas extends Model
{
    use SoftDeletes;

    protected $table = 'taxas';
    protected $fillable = ['nome','valor'];

    public function taxa() {
        return $this->hasOne('App\Patio');
    }

    public function taxaMensalista() {
        return $this->hasOne('App\PLano');
    }



}
