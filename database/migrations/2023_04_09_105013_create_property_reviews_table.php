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
        Schema::create('property_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('property_id')->nullable();
            $table->string('email')->unique();
            $table->text('message')->nullable();
            $table->string('property_rating')->nullable();
            $table->string('location_rating')->nullable();
            $table->string('value_of_money_rating')->nullable();
            $table->string('agent_support_rating')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_reviews');
    }
};
