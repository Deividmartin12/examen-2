<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->string('logo', 1000)->nullable();
            $table->unsignedBigInteger('family_id')->nullable();
            $table->timestamps();

            $table->foreign('family_id')->references('id')->on('families')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};