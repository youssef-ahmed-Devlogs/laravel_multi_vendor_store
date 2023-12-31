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
        Schema::create('store_owners', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('type', ['super-admin', 'admin', 'publisher'])->default('admin');
            $table->foreignId('store_id')->constrained('stores', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_owners');
    }
};
