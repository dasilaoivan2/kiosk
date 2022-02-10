<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencyactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencyactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('step_id');
            $table->text('description');
            $table->text('amount')->nullable();
            $table->text('processing_time')->nullable();
            $table->text('person_responsible')->nullable();
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
        Schema::dropIfExists('agencyactions');
    }
}
