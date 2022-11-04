<?php

use App\Containers\MarketPalace\Address\Enums\ProvinceTypeProxy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->increments('id');
            $table->char('country_id', 2);
            $table->enum('type', ProvinceTypeProxy::values())->default(ProvinceTypeProxy::defaultValue());
            $table->string('code', 16)->nullable()->comment('National identification code');
            $table->string('name');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
