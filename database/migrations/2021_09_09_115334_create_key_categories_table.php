<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateKeyCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('key_categories')->insert([
            'name' => '(SFTP)FTP',
        ]);

        DB::table('key_categories')->insert([
            'name' => 'DATABASE',
        ]);

        DB::table('key_categories')->insert([
            'name' => 'BACKOFFICE',
        ]);

        DB::table('key_categories')->insert([
            'name' => 'EXTRA',
        ]);

        DB::table('key_categories')->insert([
            'name' => 'EMAIL',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('key_categories');
    }
}
