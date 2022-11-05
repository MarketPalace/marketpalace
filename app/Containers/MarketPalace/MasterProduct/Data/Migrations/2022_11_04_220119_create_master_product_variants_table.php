<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_product_variants', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('master_product_id');

            $table->string('sku');
            $table->string('name')->nullable();
            $table->text('excerpt')->nullable();

            $table->decimal('price', 15, 4)->nullable();
            $table->decimal('original_price', 15, 4)->nullable();

            $table->decimal('stock', 15, 4)->default(0);

            $table->decimal('weight', 15, 4)->nullable();
            $table->decimal('height', 15, 4)->nullable();
            $table->decimal('width', 15, 4)->nullable();
            $table->decimal('length', 15, 4)->nullable();

            $table->integer('units_sold')->unsigned()->default(0);
            $table->dateTime('last_sale_at')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_product_variants');
    }
};
