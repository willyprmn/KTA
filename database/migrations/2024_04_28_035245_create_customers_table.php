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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('ktp', 16)->unique();
            $table->string('jenis_kelamin');
            $table->string('status');
            $table->text('alamat');
            $table->string('no_hp', 13)->unique();
            $table->string('rekening');
            $table->string('no_cc', 16);
            $table->double('limit_cc');
            $table->string('npwp', 15);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
