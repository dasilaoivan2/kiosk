<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->text('client_desc')->nullable();
            $table->text('desc_vernacular')->nullable();
            $table->text('desc_name');
            $table->text('description')->nullable();
            $table->integer('location_id')->nullable();
            $table->integer('office_id');
            $table->foreignId('classification_id');
            $table->text('availability');
            $table->text('icon')->nullable();
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
        Schema::dropIfExists('services');
    }
}
