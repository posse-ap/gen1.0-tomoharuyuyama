<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuizyQuaestionTableToQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quizy', function (Blueprint $table) {
            $table->integer('QuestionPriority');  //カラム追加
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quizy', function (Blueprint $table) {
            $table->dropColumn('QuestionPriority');  //カラムの削除
        });
    }
}
