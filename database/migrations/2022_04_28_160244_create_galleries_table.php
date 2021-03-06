<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 60);
            $table->string('description')->nullable();
            $table->string('link')->nullable();
            $table->string('type')->nullable(); //1 = รูปภาพจากงาน , 2 = รูปภาพประกวด, 3 = วิดีโอ
            $table->string('order')->nullable();
            $table->unsignedBigInteger('creator_id');
            $table->timestamps();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
