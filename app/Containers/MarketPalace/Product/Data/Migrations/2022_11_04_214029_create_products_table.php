<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Containers\MarketPalace\Product\Enums\ProductStateProxy;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('sku');
            $table->decimal('price', 15, 4)->nullable();
            $table->decimal('original_price', 15, 4)->nullable();
            $table->decimal('stock', 15, 4)->default(0);
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->enum('state', ProductStateProxy::values())->default(ProductStateProxy::defaultValue());
            $table->decimal('weight', 15, 4)->nullable();
            $table->decimal('height', 15, 4)->nullable();
            $table->decimal('width', 15, 4)->nullable();
            $table->decimal('length', 15, 4)->nullable();
            $table->string('ext_title', 511)->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

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
        Schema::dropIfExists('products');
    }
};
