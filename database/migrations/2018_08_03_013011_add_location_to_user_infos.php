<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class AddLocationToUserInfos extends Migration
{
    public function up()
    {
        Schema::table('user_infos', function($table) {
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
        });
    }
    /**
     * Run the migrations.
     *
     * @return void
     */


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
