<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuitarAtributosNotNullTablaHistorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historias', function (Blueprint $table) {
            $table->renameColumn('internos_id','interno_id');
            $table->integer('regimen_id')->nullable()->change();
            $table->integer('delito_especifico_id')->nullable()->change();
            $table->integer('juzgado_especifico_id')->nullable()->change();
            $table->integer('situacion_procesal_id')->nullable()->change();
            $table->integer('frecuencia_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('historias', function (Blueprint $table) {
            $table->renameColumn('interno_id','internos_id');
            $table->integer('regimen_id')->change();
            $table->integer('delito_especifico_id')->change();
            $table->integer('juzgado_especifico_id')->change();
            $table->integer('situacion_procesal_id')->change();
            $table->integer('frecuencia_id')->change();
        });
    }
}
