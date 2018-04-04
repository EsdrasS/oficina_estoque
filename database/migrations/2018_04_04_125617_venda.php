<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Venda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('valor_venda', 5, 2);
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->
                    references('id')->
                    on('produtos');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->
                    references('id')->
                    on('users');
            $table->date('dt_venda');
            $table->integer('quantidade')-> nullable();
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
        Schema::dropIfExists('vendas');
    }
}
