<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeQuizyQuaestionTableTableColumnQuestionPriorityBirthNo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('QuizyQuaestionTable', function (Blueprint $table) {
            $table->string('QuestionPriority')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('QuizyQuaestionTable', function (Blueprint $table) {
            $table->string('fax_name')->default(null)->change();
        });
    }
}
