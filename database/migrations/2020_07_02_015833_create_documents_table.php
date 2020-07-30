<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('archivo');
            $table->unsignedBigInteger('typedocument_id');
            $table->foreign('typedocument_id')->references('id')->on('typedocuments');
            $table->unsignedBigInteger('proceso_id');
            $table->foreign('proceso_id')->references('id')->on('procesos');
            $table->timestamps();
        });
        DB::table('documents')->insert(array('id'=>'1','name'=>'Documento Prueba','description'=>'Documento de prueba','archivo'=>'storage/MSVTAIPE.pdf',
        'typedocument_id'=>1,'proceso_id'=>1));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
