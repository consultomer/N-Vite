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
        Schema::create('invitation_cards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('price');
            $table->string('discription');
            $table->string('category');
            $table->string('sub_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_cards');
    }
};
