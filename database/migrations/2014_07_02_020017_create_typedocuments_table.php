<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTypedocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typedocuments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
        DB::table('typedocuments')->insert(array('id'=>'1','name'=>'Documentos externos','description'=>'Documentos externos'));
        DB::table('typedocuments')->insert(array('id'=>'2','name'=>'Formatos','description'=>'Formato'));
        DB::table('typedocuments')->insert(array('id'=>'3','name'=>'Instructivos','description'=>'Instructivos'));
        DB::table('typedocuments')->insert(array('id'=>'4','name'=>'Manuales','description'=>'Manuales'));
        DB::table('typedocuments')->insert(array('id'=>'5','name'=>'Otros documentos','description'=>'Otros documentos'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typedocuments');
    }
}
