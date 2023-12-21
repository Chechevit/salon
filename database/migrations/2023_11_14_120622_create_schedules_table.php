<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->foreignId('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');
            
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
        Schema::dropIfExists('schedules');
    }
};
