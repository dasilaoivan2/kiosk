<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientservices', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->integer('client_id');
            $table->integer('office_id');
            $table->boolean('nowserving')->default(false);
            $table->tinyInteger('playsound')->default(0);
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
        Schema::dropIfExists('clientservices');
    }
}
