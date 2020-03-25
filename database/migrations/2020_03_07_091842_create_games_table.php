<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_path');
            $table->string('title');
            $table->string('releace');
            $table->string('releace_y_m_d');
            $table->string(('releace_y'));
            $table->string('releace_m_d');
            $table->string('releace_m');
            $table->string('genre');
            $table->string('link');
            $table->string('applink')->nullable();
            $table->string('googlelink')->nullable();
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
        Schema::dropIfExists('games');
    }
}

