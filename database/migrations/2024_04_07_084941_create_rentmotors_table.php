<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rentmotors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 0);
            $table->decimal('price_1', 10, 0);
            $table->decimal('price_2', 10, 0);
            $table->decimal('price_3', 10, 0);
            $table->text('description');
            $table->text('short_description');
            $table->integer('cylinders');
            $table->integer('cylinders_cm3');
            $table->year('year');
            $table->integer('km');
            $table->string('performance');
            $table->string('condition')->nullable();
            $table->string('top')->default(false);
            $table->boolean('driver_license')->default(true);
            $table->string('main_image')->nullable();
            $table->string('video')->nullable();
            $table->string('images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentmotors');
    }
};
