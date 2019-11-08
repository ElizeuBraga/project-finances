<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhrasesToLerics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lerics', function (Blueprint $table) {
            $table->string('english')->nullable();
            $table->string('portuguese')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lerics', function (Blueprint $table) {
            $table->dropColumn(['english', 'portuguese']);
        });
    }
}
