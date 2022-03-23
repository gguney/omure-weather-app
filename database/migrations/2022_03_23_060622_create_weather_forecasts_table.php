<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_forecasts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('location_id')->unsigned();
            $table->bigInteger('dt');
            $table->date('forecast_date');
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_forecasts');
    }
};
