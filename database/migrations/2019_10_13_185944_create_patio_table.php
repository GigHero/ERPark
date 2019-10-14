<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('entrada');
            $table->date('saida');
            $table->String('placa');
            $table->String('obs');
            $table->String('vaga');
            $table->double('valor', 8, 2);
            $table->integer('mensalista')->index('fk_mensalista');
            $table->softDeletes();  
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
        Schema::dropIfExists('patio');
    }
}
