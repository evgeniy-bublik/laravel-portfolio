<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('email', 100);
            $table->string('site', 100)->nullable();
            $table->string('subject', 255);
            $table->text('text');
            $table->text('answer')->nullable();
            $table->tinyInteger('is_new')->default(1);
            $table->tinyInteger('active')->default(0);
            $table->string('ip', 15)->nullable();
            $table->string('user_agent', 255)->nullable();
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
        Schema::dropIfExists('supports');
    }
}
