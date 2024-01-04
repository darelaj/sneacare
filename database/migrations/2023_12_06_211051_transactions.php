<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('alamat');
            $table->tinyInteger('treatmentType');
            $table->date('tanggalBooking');
            $table->tinyInteger('deliverType');
            $table->integer('metodePembayaran');
            $table->integer('jumlahPembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        //
    }
};
