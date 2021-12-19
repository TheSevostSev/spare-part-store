<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoReservePartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_reserve_part', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('auto_id');
            $table->unsignedBigInteger('reserve_part_id');
            $table->timestamps();

            $table->unique(['auto_id','reserve_part_id']);

            $table->foreign('auto_id')->references('id')->on('autos')->onDelete('cascade');
            $table->foreign('reserve_part_id')->references('id')->on('reserve_parts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto_reserve_part');
    }
}
