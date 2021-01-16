<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrudeSuicideRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crude_suicide_rates', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('period');
            $table->string('indicator');
            $table->string('gender');
            $table->string('Tooltip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crucial_suicide_rates');
    }
}
