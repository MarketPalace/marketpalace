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
        Schema::create('model_property_values', function (Blueprint $table) {
            $table->unsignedBigInteger('property_value_id')->unsigned();
            $table->morphs('model');
            $table->timestamps();

            $table->foreign('property_value_id')
                ->references('id')
                ->on('property_values')
                ->onDelete('cascade');

            $table->primary(['property_value_id', 'model_id', 'model_type'], 'pk_model_property_values');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_property_values');
    }
};
