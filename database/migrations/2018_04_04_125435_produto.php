<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Produto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->date('dt_entrada');
            $table->decimal('valor_compra', 5, 2);
            $table->text('descricao');
            $table->string('imagem', 50)-> nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
