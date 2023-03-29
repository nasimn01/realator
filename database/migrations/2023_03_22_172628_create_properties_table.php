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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_category_id');
            $table->string('name');
            $table->string('feature_photo')->nullable();
            $table->string('price')->nullable();
            $table->string('location');
            $table->string('address')->nullable();
            $table->string('bed')->nullable();
            $table->string('bath')->nullable();
            $table->string('garage')->nullable();
            $table->text('description')->nullable();
            $table->string('advance_feature')->nullable();
            $table->string('ameneties')->nullable();
            $table->string('video_link')->nullable();
            $table->string('status')->default(0);
            $table->string('is_feature')->default(0);
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
        Schema::dropIfExists('properties');
    }
};
