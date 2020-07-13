<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('category_id');

            $table->string('MeasurementInstrument')->nullable();;
            $table->string('AssessmentMethodDetail')->nullable();;
            $table->integer('MinScore')->nullable();;
            $table->integer('MaxScore')->nullable();;
            $table->string('ProfessorTeam')->nullable();
            $table->string('Result')->nullable();
            $table->mediumText('PurposeMeasure')->nullable();
            $table->mediumText('Results')->nullable();
            $table->mediumText('ImproceScores')->nullable();
            $table->float('Expected')->nullable();
            $table->float('Proposal')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
