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
        Schema::create('buyings', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('tel')->nullable();
            $table->text('email')->nullable();
            $table->text('gyartmany')->nullable();
            $table->text('tipus')->nullable();
            $table->text('km')->nullable();
            $table->text('allapot')->nullable();
            $table->text('ev')->nullable();
            $table->text('ar')->nullable();
            $table->text('link')->nullable();
            $table->text('leiras')->nullable();
            $table->text('okmany')->nullable();
            $table->text('rendszam')->nullable();
            $table->text('other')->nullable();
            $table->text('images_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyings');
    }
};
