<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegionIdToFreelances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('freelances', function (Blueprint $table) {
            $table->unsignedBigInteger('region_id')->nullable()->after('user_id');
            $table->foreign('region_id')->references('id')->on('regions');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('freelances', function (Blueprint $table) {
            dropForeign('region_id');
        });
    }
}
