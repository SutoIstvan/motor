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
        Schema::create('indices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('description');
            $table->string('service_title');
            $table->string('service1');
            $table->string('service2');
            $table->string('service3');
            $table->string('service4');
            $table->string('feedback_title');
            $table->string('feedback1_name');
            $table->string('feedback1');
            $table->string('feedback2_name');
            $table->string('feedback2');
            $table->string('feedback3_name');
            $table->string('feedback3');
            $table->string('feedback4_name');
            $table->string('feedback4');
            $table->string('about_title');
            $table->string('about1');
            $table->text('about2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indices');
    }
};
