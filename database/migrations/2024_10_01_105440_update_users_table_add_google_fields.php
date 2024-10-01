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
        Schema::table('users', function (Blueprint $table) {
            // Change the password field to be nullable
            $table->string('password')->nullable()->change();
            // Add new columns
            $table->string('google_id')->nullable();
            $table->string('google_avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Restore the password field to not be nullable
            $table->string('password')->nullable(false)->change();
            // Drop the new columns if rolling back
            $table->dropColumn(['google_id', 'google_avatar']);
        });
    }
};
