<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParagraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paragraphs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('paper_id');
            $table->unsignedInteger('outline_id');
            $table->unsignedInteger('argument_id')->nullable();
            $table->text('topic');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('paper_id')->references('id')->on('papers')->onDelete('cascade');
            $table->foreign('outline_id')->references('id')->on('outlines')->onDelete('cascade');
            $table->foreign('argument_id')->references('id')->on('arguments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paragraphs');
    }
}
