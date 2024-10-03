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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location')->nullable();
            $table->string('salary_range')->nullable();
            $table->longText('description');
            $table->longText('requirements');
            $table->string('image')->nullable();
            $table->string('attachment')->nullable();
            $table->string('expires_on')->nullable();
            $table->boolean('status')->default(true);
            $table->string('slug')->nullable();
            $table->boolean('archive')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
