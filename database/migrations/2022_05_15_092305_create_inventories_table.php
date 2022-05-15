<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();      
            $table->integer('room_id')->unsigned();  
            $table->integer('teacher_id')->unsigned(); 
            $table->integer('grade_id')->unsigned();
            $table->string('date');
            $table->integer('shifts');
            $table->string('material_facilities');
            $table->string('hardware_error');
            $table->string('software_error');
            $table->integer('status')->nullable()->default(1);     
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('teacher_id')
            ->references('id')->on('teachers')
            ->onDelete('cascade'); 
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('room_id')
            ->references('id')->on('rooms')
            ->onDelete('cascade');
            $table->foreign('grade_id')
            ->references('id')->on('grades')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
