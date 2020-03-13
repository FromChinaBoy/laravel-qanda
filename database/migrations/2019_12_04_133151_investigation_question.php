<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvestigationQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('investigation_question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('investigation_id')->comment('调查表id');
            $table->string('name',100)->comment('调查问题名');
            $table->string('type',30)->comment('问题类型,multiline-text:多行；single-line-text:单行；single-election:单选；multiline-election:多选；option:下拉；date:日期；time:时间');
            $table->tinyInteger('sort')->comment('排序');
            $table->tinyInteger('is_must')->default(1)->comment('必填');
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
        Schema::dropIfExists('investigation_question');
    }
}
