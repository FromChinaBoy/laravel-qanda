<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvestigationType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('investigation_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name',100)->comment('分类名');
            $table->tinyInteger('sort')->comment('排序');
            $table->tinyInteger('status')->default(0)->comment('状态 1:启用 0:禁用');
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
        Schema::dropIfExists('investigation_type');
    }
}
