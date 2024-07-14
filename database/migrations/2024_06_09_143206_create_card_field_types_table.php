<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('card_field_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('suggested_labels')->nullable();
            $table->boolean('display_icon')->default(false);
            $table->string('category');
            $table->text('icon_url');
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_field_types');
    }
};
