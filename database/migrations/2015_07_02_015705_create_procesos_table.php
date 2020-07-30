<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('archivo');
            $table->timestamps();
        });
        DB::table('procesos')->insert(array('id'=>'1','name'=>'Gestion Curricular','description'=>'Gestion curricular de la facultad de ingenieria de sistemas','archivo'=>'storage/GEA-PR-01-Gestion-Curricular.pdf'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procesos');
    }
}
