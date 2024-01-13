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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
<<<<<<< HEAD
            $table->string('username');
            $table->string('email')->unique();
            $table->string('alamat');
            $table->string('notelepon');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
=======
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->string('nomer_telepon')->nullable();
            $table->string('foto')->nullable();
>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
