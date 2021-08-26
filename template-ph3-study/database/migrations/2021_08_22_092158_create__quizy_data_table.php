<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QuizyData', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('prefecture_id');
            $table->integer('question_num');
            $table->string('name');
            $table->integer('true_or_false');
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
        Schema::dropIfExists('QuizyData');
    }
}
