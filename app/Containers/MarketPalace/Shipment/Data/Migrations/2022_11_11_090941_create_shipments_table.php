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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();

            $table->string('tracking_number')->nullable();
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('carrier_id')->nullable();
            $table->boolean('is_trackable')->default(true);
            $table->string('status')->default('new');
            $table->decimal('weight', 15, 4)->nullable();
            $table->decimal('height', 15, 4)->nullable();
            $table->decimal('width', 15, 4)->nullable();
            $table->decimal('length', 15, 4)->nullable();
            $table->text('comment')->nullable();
            $table->json('configuration')->nullable();
            $table->timestamps();

            $table->foreign('address_id')
                ->references('id')
                ->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
