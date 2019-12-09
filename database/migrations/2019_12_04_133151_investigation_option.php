<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvestigationOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('investigation_option', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->comment('调查选项名');
            $table->string('type',30)->comment('选项类型,multiline-text:多行；single-line-text:单行；single-election:单选；multiline-election:多选；option:下拉；date:日期；time:时间');
            $table->integer('score')->nullable()->default(null)->comment('分值');
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
        Schema::dropIfExists('investigation_option');
    }
}
