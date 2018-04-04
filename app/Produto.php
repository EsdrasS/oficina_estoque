<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','dt_entrada','valor_compra','descricao'];
    protected $guarded = ['id','created_at','updated_at'];
    protected $table = 'produtos';
}
