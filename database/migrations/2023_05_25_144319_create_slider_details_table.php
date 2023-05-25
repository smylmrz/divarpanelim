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
        Schema::create('slider_details', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('content')->nullable();
            $table->text('primary_action_text');
            $table->string('primary_action_url');
            $table->text('secondary_action_text');
            $table->string('secondary_action_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider_details');
    }
};
