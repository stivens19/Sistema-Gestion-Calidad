<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('archivo');
            $table->unsignedBigInteger('proceso_id');
            $table->foreign('proceso_id')->references('id')->on('procesos');
            $table->timestamps();
        });
        DB::table('procedures')->insert(array('id'=>'1','name'=>'Encuesta de Satisfaccion Docente','description'=>'Encuesta de Satisfaccion Docentes FIS','archivo'=>'storage/PR_SO006_ENCUESTAS-DE-SATISFACCION-DOCENTE_FYL.pdf','proceso_id'=>1));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedures');
    }
}
