<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KeyUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('keys', function (Blueprint $table) {

            $table->integer('subject_id')->nullable()->change();
            $table->string('login')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->string('url')->nullable()->change();
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
