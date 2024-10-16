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
        Schema::table('application_attachments', function (Blueprint $table) {
            $table->string('grade')->nullable();
            $table->string('level')->nullable();
            $table->integer('duration')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('application_attachments', function (Blueprint $table) {
            $table->dropColumn('grade');
            $table->dropColumn('level');
            $table->dropColumn('duration');
        });
    }
};
