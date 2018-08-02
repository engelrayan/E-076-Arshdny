<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('hajNumber');
            $table->text('boardNumber');
            $table->text('address');
            $table->text('hajAddress');
            $table->text('hamlaName');
            $table->text('hamlaNumber');
            $table->text('hamlaContact');
            $table->text('healty');
            $table->string('avatar');
            $table->timestamps();

//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

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
