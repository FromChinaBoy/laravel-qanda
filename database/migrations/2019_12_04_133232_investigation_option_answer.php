<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvestigationOptionAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('investigation_option_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('investigation_id');
            $table->integer('investigation_option_id');
            $table->text('content')->comment('内容');
            $table->integer('user_id');
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
    }
}
