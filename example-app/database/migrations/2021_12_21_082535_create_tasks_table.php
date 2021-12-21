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
            $table->id();
            $table->char('title',100)->nullable(false);
            $table->text('description')->nullable(false);
            $table->unsignedInteger('type')->nullable(false);
            $table->tinyInteger('status')->nullable(false);
            $table->date('start_date')->nullable(false);
            $table->date('due_date')->nullable(false);
            $table->unsignedBigInteger('assignee')->nullable(false);
            $table->float('estimate',5,2)->nullable(false);
            $table->float('actual',5,2)->nullable(false);
            $table->foreign('assignee')->references('id')->on('users');
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
        Schema::dropIfExists('tasks');
    }
}