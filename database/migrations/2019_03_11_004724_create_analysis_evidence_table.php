<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalysisEvidenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analysis_evidence', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('paper_id');
            $table->unsignedInteger('analysis_id');
            $table->unsignedInteger('evidence_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('paper_id')->references('id')->on('papers')->onDelete('cascade');
            $table->foreign('analysis_id')->references('id')->on('analyses')->onDelete('cascade');
            $table->foreign('evidence_id')->references('id')->on('evidence')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analysis_evidence');
    }
}
