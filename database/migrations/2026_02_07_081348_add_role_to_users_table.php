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
            // Taruh di sini untuk menambah kolom role
            $table->string('role')->default('user')->after('email'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Taruh di sini untuk menghapus kolom role jika migrasi dibatalkan
            $table->dropColumn('role');
        });
    }
};