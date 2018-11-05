<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('identifier')->unique()->after('id');
            $table->string('amount')->default(0)->after('identifier');
            $table->string('gender')->nullable()->after('password');
            $table->date('birth')->nullable()->after('gender');
            $table->string('country')->nullable()->after('birth');
            $table->string('city')->nullable()->after('country');
            $table->string('address')->nullable()->after('city');
            $table->string('email_token')->nullable()->after('address');
            $table->boolean('confirmed')->default(false)->after('email_token');
            $table->boolean('timezone')->nullable()->after('confirmed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'identifier', 'gender', 'birth', 'country', 'city', 'address', 'email_token', 'confirmed'
            ]);
        });
    }
}
