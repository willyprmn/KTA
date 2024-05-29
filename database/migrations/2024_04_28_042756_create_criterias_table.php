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
        Schema::create('criterias', function (Blueprint $table) {
            $table->id();
            $table->double('bunga');
            $table->boolean('persetujuan')->default(false);
            $table->unsignedBigInteger('submission_id');
            $table->unsignedBigInteger('bank_id');
            $table->timestamps();

            $table->foreign('submission_id')->references('id')->on('submissions');
            $table->foreign('bank_id')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterias');
    }
};
