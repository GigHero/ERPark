<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taxas extends Model
{
    use SoftDeletes;

    protected $table = 'taxas';
    protected $fillable = ['nome','valor'];
}
