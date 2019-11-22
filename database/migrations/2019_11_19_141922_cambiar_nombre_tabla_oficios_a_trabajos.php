<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CambiarNombreTablaOficiosATrabajos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('oficios','trabajos');

        Schema::table('internos', function (Blueprint $table) {
            $table->renameColumn('oficio_id','trabajo_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('trabajos','oficios');

        Schema::table('internos', function (Blueprint $table) {
            $table->renameColumn('trabajo_id','oficio_id');
        });
    }
}
