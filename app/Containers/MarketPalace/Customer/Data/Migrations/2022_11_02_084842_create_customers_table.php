<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Containers\MarketPalace\Customer\Enums\CustomerType;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string('type', 24)->default(CustomerType::defaultValue());
            $table->string('email')->nullable();
            $table->string('phone', 22)->nullable();
            $table->string('firstname')->nullable()->comment('First name');
            $table->string('lastname')->nullable()->comment('Last name');
            $table->string('company_name')->nullable();
            $table->string('tax_nr', 17)->nullable()->comment('Tax/VAT Identification Number'); //https://www.wikiwand.com/en/VAT_identification_number
            $table->string('registration_nr')->nullable()->comment('Company/Trade Registration Number');
            $table->string('timezone')->nullable();
            $table->string('currency', 3)->nullable();
            $table->boolean('is_active')->default(true);
            $table->decimal('ltv', 15, 4)->default(0)->comment('Customer Lifetime Value');
            $table->dateTime('last_purchase_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
