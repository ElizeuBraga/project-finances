<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses_amounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('value');
            $table->bigInteger('expense_amount_id')->unsigned();
            $table->foreign('expense_amount_id')->references('id')->on('expenses_sub_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses_amounts');
    }
}
