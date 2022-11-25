<?php

use App\Containers\MarketPalace\Address\Enums\AddressTypeProxy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id('id');

            $table->enum('type', AddressTypeProxy::values())->nullable()->default(AddressTypeProxy::defaultValue());
            $table->string('name');
            $table->char('country_id', 2);
            $table->integer('province_id')->unsigned()->nullable();
            $table->string('postalcode', 12)->nullable(); //12 because: http://stackoverflow.com/a/29280718/1016746
            $table->string('city')->nullable();
            $table->string('address', 384);

            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('addresses');
    }
};
