<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbstractPostersTable extends Migration
{
    public function up()
    {
        Schema::create('abstract_posters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 60);
            $table->string('description');
            $table->string('image');
            $table->string('author', 60);
            $table->string('link')->nullable();
            $table->foreignId('creator_id')->constrained('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abstract_posters');
    }
}
