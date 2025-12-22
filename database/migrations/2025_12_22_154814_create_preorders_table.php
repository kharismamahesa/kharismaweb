<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preorders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->timestamp('started_at');
            $table->timestamp('closed_at');
            $table->timestamp('estimated_arrival_at')->nullable();
            $table->enum('status', [
                'open',
                'closed',
                'arrived',
                'cancelled',
            ])->default('open');
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preorders');
    }
};
