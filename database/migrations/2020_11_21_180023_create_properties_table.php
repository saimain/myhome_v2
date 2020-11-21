<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('title');
            $table->integer('region_id');
            $table->integer('township_id');
            $table->string('type');
            $table->integer('price');
            $table->string('area');
            $table->integer('bed_room');
            $table->integer('bath_room');
            $table->text('description')->nullable();
            $table->string('phone');
            $table->integer('as_agent')->default(0);
            $table->string('sale_rent');
            $table->boolean('is_boosted')->default(0);
            $table->string('boost_exp_date')->nullable();
            $table->text('images');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
