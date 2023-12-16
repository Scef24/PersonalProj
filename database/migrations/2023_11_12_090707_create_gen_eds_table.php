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
        Schema::create('gen_eds', function (Blueprint $table) {
            $table->id();
            $table->integer('accession_num');
            $table->string('call_num');
            $table->string('title');
            $table->string('publisher');
            $table->string('author');
            $table->string('category');
            $table->integer('copy')->default(1);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gen_eds');
    }
};
