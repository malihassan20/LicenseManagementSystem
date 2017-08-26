<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('session_id')->unsigned(10)->nullable();
            $table->foreign('session_id')->references('id')->on('user_sessions')->onDelete('restrict');
            $table->string('updated_table_name',500);
            $table->string('updated_field_name',500);
            $table->string('updated_field_old_value',500);
            $table->integer('updated_table_pk')->unsigned(10);
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
        Schema::dropIfExists('activity_logs');
    }
}
