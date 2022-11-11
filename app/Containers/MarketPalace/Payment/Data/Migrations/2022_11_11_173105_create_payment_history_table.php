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
        Schema::create('payment_history', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('payment_id');
            $table->string('old_status', 35)->nullable();
            $table->string('new_status', 35);
            $table->string('message')->nullable();
            $table->string('native_status')->nullable();
            $table->string('transaction_number')->nullable();
            $table->decimal('transaction_amount', 15, 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_history');
    }
};
