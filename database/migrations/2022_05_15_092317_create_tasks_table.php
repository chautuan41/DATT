<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned(); 
            $table->integer('user_id')->unsigned();      
            $table->integer('room_id')->unsigned(); 
            $table->string('material_facilities');
            $table->string('hardware_error');
            $table->string('software_error');
            $table->integer('status')->nullable()->default(1);     
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('admin_id')
            ->references('id')->on('admins')
            ->onDelete('cascade'); 
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('room_id')
            ->references('id')->on('rooms')
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
        Schema::dropIfExists('tasks');
    }
}
