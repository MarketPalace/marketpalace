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
        Schema::create('taxons', function (Blueprint $table) {
            $table->id();

            $table->integer('taxonomy_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('priority')->nullable();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('ext_title', 511)->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();

            $table->foreign('taxonomy_id')
                ->references('id')
                ->on('taxonomies')
                ->onDelete('cascade');

            $table->foreign('parent_id')
                ->references('id')
                ->on('taxons')
                ->onDelete('cascade');

            $table->unique(['taxonomy_id', 'slug', 'parent_id']);
            $table->index('priority');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxons');
    }
};
