<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuizyQuaestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QuizyQuaestionTable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('prefecture_id');
            $table->integer('question_id');
            $table->string('question_title');
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
        Schema::dropIfExists('QuizyQuaestionTable');
    }
}
