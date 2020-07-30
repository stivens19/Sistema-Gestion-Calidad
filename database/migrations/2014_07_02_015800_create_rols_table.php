<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rols', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
        DB::table('rols')->insert(array('id'=>'1','name'=>'Administrador','description'=>'Administrador del sistema'));
        DB::table('rols')->insert(array('id'=>'2','name'=>'Docente','description'=>'Docentes dueños de procesos'));
        DB::table('rols')->insert(array('id'=>'3','name'=>'Asistente','description'=>'Asistente de apoyo'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rols');
    }
}
