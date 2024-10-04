<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePexelsVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pexels_videos', function (Blueprint $table) {
            $table->id();
            $table->biginteger('video_id');
            $table->string('category');
            $table->string('link');
            $table->string('file_type')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('fps')->nullable();
            $table->string('size')->nullable();
            $table->string('quality')->nullable();
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
        Schema::dropIfExists('pexels_videos');
    }
}
