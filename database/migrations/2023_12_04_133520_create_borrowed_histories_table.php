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
        Schema::create('borrowed_histories', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('idBook');
            $table->foreign('idBook')
            ->references('id')
            ->on('gen_eds')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('studID');
            $table->foreign('studID')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->string('studName');
            $table->string('bookTitle');
            $table->timestamp('date_borrowed')->nullable();
            $table->timestamp('date_returned')->nullable();
            $table->string('status')->default('Returned');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowed_histories');
    }
};
