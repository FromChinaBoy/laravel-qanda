<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvestigationTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('investigation_template', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id');
            $table->Integer('type_id')->comment('调查分类id');
            $table->string('name',100)->comment('模板名字');
            $table->string('desc')->comment('简要描述');
            $table->tinyInteger('status')->comment('状态 1:启用 0:禁用');
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
        Schema::dropIfExists('investigation_template');

    }
}
