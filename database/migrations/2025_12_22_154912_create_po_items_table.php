<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('po_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('po_id')
                ->constrained('preorders')
                ->cascadeOnDelete();
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();
            $table->decimal('preorder_price', 12, 2)->nullable();
            $table->timestamps();
            $table->unique(['po_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('po_items');
    }
};
