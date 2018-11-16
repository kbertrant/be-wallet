<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoInTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('status')->nullable()->after('currency');
            $table->string('signature')->nullable()->after('status');
            $table->string('payment_method')->nullable()->after('signature');
            $table->string('cel_phone_num')->nullable()->after('payment_method');
            $table->string('cpm_phone_prefixe')->nullable()->after('cel_phone_num');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['status', 'signature', 'payment_method', 'cel_phone_num', 'cpm_phone_prefixe']);
        });
    }
}
