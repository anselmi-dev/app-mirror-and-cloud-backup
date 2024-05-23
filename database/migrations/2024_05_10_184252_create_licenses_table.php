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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid')->unique();

            $table->enum('status', ['active', 'pending', 'cancelled']);

            $table->date('ends_at')->nullable();

            $table->timestamps();

            $table->softDeletes('deleted_at', precision: 0);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
