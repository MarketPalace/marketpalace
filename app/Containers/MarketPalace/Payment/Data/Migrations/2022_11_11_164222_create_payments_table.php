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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('payment_method_id');
            $table->string('payable_type');
            $table->unsignedBigInteger('payable_id');
            $table->string('hash')->nullable();
            $table->string('remote_id')->nullable();
            $table->json('data')->nullable();
            $table->char('currency', 3);
            $table->decimal('amount', 15, 4);
            $table->decimal('amount_paid', 15, 4)->default(0);
            $table->string('status', 35);
            $table->string('status_message')->nullable();

            $table->timestamps();

            $table->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods');

            $table->unique('hash');

            $table->unique(['payment_method_id', 'remote_id'], 'unique_remote_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
