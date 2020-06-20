<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateToUserIdFkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('messages', function (Blueprint $table) {
            
            
            $table->dropColumn('user_id_fk');

        });

        Schema::table('messages', function (Blueprint $table) {
            

            $table->unsignedBigInteger('to_user_id_fk');
            $table->foreign('to_user_id_fk')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->unsignedBigInteger('from_user_id_fk');
            $table->foreign('from_user_id_fk')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id_fk');
            
        });

        Schema::table('messages', function (Blueprint $table) {

            $table->dropColumn('to_user_id_fk');
            $table->dropColumn('from_user_id_fk');
            
        });
    }
}
