<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvestigationQuestionAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('investigation_question_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('investigation_id');
            $table->integer('user_id')->nullable()->default(0);
            $table->string('ip',20)->comment('调查ip地址');
            $table->integer('score')->default(0);
            $table->timestamp('create_time')->nullable();
            $table->timestamp('update_time')->nullable();
            $table->softDeletes('delete_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('investigation_question_answer');
    }
}
