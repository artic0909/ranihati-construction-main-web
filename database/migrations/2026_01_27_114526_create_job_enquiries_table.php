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
        Schema::create('job_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('qualification');
            $table->string('hs_division');
            $table->string('tenth_percentage');
            $table->string('hs_percentage');
            $table->string('phone');
            $table->string('address');
            $table->string('cv'); // in pdf format
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_enquiries');
    }
};
