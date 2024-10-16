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
        Schema::table('referees', function (Blueprint $table) {
            $table->integer('contact_referee1');
            $table->integer('contact_referee2');
            $table->boolean('consent_referee1')->default(false);
            $table->boolean('consent_referee2')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('referees', function (Blueprint $table) {
            $table->dropColumn('contact_referee1');
            $table->dropColumn('contact_referee2');
            $table->dropColumn('consent_referee1');
            $table->dropColumn('consent_referee2');
            //
        });
    }
};
