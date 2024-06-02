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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pengajuan');
            $table->string('jenis_pekerjaan', 50);
            $table->double('penghasilan');
            $table->double('besar_pinjaman');
            $table->integer('tenor')->unsigned();
            $table->string('status', 20);
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
        Schema::dropIfExists('submissions');
        $table->dropSoftDeletes();
    }
};
