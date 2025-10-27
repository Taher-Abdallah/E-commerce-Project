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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('small_desc');
            $table->longText('desc');
            $table->boolean('status')->default(1);
            $table->string('sku');
            $table->date('available_for')->nullable();

            $table->boolean('has_variants')->default(0);
            $table->decimal('price', 8, 2)->nullable(); // if have variants it will bve null 
            // الفارينت هو مثلا ان علي حسب الحجم او اللون السعر بيختلف ف لو فيه فارينت وعملناله يس السعر يختلف
            $table->decimal('discount')->nullable();
            $table->date('start_discount')->nullable();
            $table->date('end_discount')->nullable();


            $table->boolean('manage_stock')->default(0);
            $table->integer('quantity')->nullable();
            $table->integer('available_in_stock')->default(1);
            $table->integer('views')->nullable();

            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
