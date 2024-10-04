<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apods', function (Blueprint $table) {
            $table->id();
            $table->string('copyright');
            $table->date('date');
            $table->text('explanation');
            $table->string('hdurl');
            $table->string('media_type');
            $table->string('service_version');
            $table->string('title');
            $table->string('url');
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
        Schema::dropIfExists('apods');
    }
}
