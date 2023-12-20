<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('fullname');
            $table->dropColumn('email');
            $table->dropColumn('phoneNumber');
            $table->dropColumn('alamat');
            $table->dropColumn('deliverType');
            $table->bigInteger('userId');
        });

        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('transactionId');
            $table->string('fullname');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('address');
            $table->tinyInteger('deliveryType');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
};
