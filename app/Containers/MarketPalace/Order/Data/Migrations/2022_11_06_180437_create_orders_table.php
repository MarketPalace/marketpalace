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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('number', 32);
            $table->string('status', 32);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('billpayer_id')->unsigned()->nullable();
            $table->unsignedBigInteger('shipping_address_id')->unsigned()->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique('number', 'order_number_unique');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('billpayer_id')
                ->references('id')
                ->on('billpayers');

            $table->foreign('shipping_address_id')
                ->references('id')
                ->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
