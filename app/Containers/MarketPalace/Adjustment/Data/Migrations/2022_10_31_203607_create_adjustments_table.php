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
        Schema::create('adjustments', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Promotion, Shipping or Tax see AdjustmentType
            $table->string('adjustable_type'); // eg. Cart, Order, Order Item
            $table->bigInteger('adjustable_id')->unsigned(); // eg. cart id, order item id, etc
            $table->string('adjuster'); // the adjuster type eg. FixedAmountFee, PercentageFee
            $table->string('origin')->nullable(); // eg. the id of the promotion entry in the db
            $table->json('data')->nullable(); // Additional data needed by the adjuster
            $table->string('title'); // The title to show for end users (eg. in product lists)
            $table->string('description')->nullable(); // A longer description to show (eg. in cart or order confirmation email)
            $table->decimal('amount', 15, 4)->default(0);
            $table->boolean('is_locked')->default(false); // If locked then won't be recalculated
            $table->boolean('is_included')->default(false); // If included, then the adjustment is already included in the price
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adjustments');
    }
};
