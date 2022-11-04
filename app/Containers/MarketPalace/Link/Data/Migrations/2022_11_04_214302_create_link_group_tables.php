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
        Schema::create('link_groups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('link_type_id')->unsigned();
            $table->integer('property_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('link_type_id')
                ->references('id')
                ->on('link_types');

            if (Schema::hasTable('properties')) {
                $table->foreign('property_id')
                    ->references('id')
                    ->on('properties');
            }
        });

        Schema::create('link_group_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('link_group_id')->unsigned();
            $table->bigInteger('linkable_id')->unsigned();
            $table->string('linkable_type');
            $table->timestamps();

            $table->foreign('link_group_id')
                ->references('id')
                ->on('link_groups')
                ->onDelete('cascade');

            $table->unique(['link_group_id', 'linkable_id', 'linkable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_group_items');
        Schema::dropIfExists('link_groups');
    }
};
