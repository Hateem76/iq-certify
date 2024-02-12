<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->integer('quiz_id');
            $table->string('unique_key')->nullable();
            $table->string('user_id')->nullable();
            $table->string('question_answer')->nullable();
            $table->string('timer')->nullable();
            $table->string('quiz_is_passed')->nullable();
            $table->string('points')->nullable();
            $table->string('email_sent_at')->nullable();
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
        Schema::dropIfExists('quiz_results');
    }
}
