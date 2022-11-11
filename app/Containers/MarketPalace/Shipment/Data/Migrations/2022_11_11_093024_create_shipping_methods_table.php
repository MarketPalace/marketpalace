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
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->unsignedBigInteger('carrier_id')->nullable();
            $table->json('configuration')->nullable();
            $table->timestamps();

            $table->foreign('carrier_id')
                ->references('id')
                ->on('carriers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_methods');
    }
};
