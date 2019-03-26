<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalysisParagraphTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analysis_paragraph', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('paper_id');
            $table->unsignedInteger('argument_id');
            $table->unsignedInteger('outline_id');
            $table->unsignedInteger('analysis_id');
            $table->unsignedInteger('paragraph_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('paper_id')->references('id')->on('papers');
            $table->foreign('argument_id')->references('id')->on('arguments');
            $table->foreign('outline_id')->references('id')->on('outlines');
            $table->foreign('analysis_id')->references('id')->on('analyses');
            $table->foreign('paragraph_id')->references('id')->on('paragraphs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analysis_paragraph');
    }
}
