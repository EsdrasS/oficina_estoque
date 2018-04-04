<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
      protected $fillable = ['id_porduto','quantidade'];
      protected $guarded = ['id','created_at','updated_at'];
      protected $table = 'estoques';
}
