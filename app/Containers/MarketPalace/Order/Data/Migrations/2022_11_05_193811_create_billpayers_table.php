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
        Schema::create('billpayers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('address_id');
            $table->string('email')->nullable();
            $table->string('phone', 22)->nullable();
            $table->string('firstname')->nullable()->comment('First name');
            $table->string('lastname')->nullable()->comment('Last name');
            $table->string('company_name')->nullable();
            $table->string('tax_nr', 17)->nullable()->comment('Tax/VAT Identification Number'); //https://www.wikiwand.com/en/VAT_identification_number
            $table->string('registration_nr')->nullable()->comment('Company/Trade Registration Number');
            $table->boolean('is_eu_registered')->default(false);
            $table->boolean('is_organization')->default(false);
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
        Schema::dropIfExists('billpayers');
    }
};
