<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIncomesIdTableWallets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wallets', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('income_id')->after('user_id');
            $table->foreign('income_id')->references('id')->on('incomes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wallets', function (Blueprint $table) {
            //
            $table->dropForeign(['income_id']);
            // $table->dropColumn('incomes_id');
        });
    }
}
