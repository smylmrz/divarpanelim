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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('tagline')->nullable();
            $table->text('description')->nullable();
            $table->text('logo');
            $table->text('footer_logo')->nullable();
            $table->text('copyright');
            $table->text('phone');
            $table->text('address');
            $table->text('about')->nullable();
            $table->string('info_bg')->nullable();
            $table->text('address_url');
            $table->text('keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
