<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxas extends Model
{
    use SoftDeletes;

    protected $table = 'taxas';
    protected $fillable = ['nome','valor'];
}
