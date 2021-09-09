<?php

use App\Models\Backend;
use App\Models\Frontend;
use App\Models\General;
use App\Models\Server;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReplaceDatabases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $frontends = Frontend::all();

        foreach($frontends as $frontend){
            $backend = new Backend();
            $backend->type_id = $frontend->type_id;
            $backend->description = $frontend->description;
            $backend->comment = $frontend->comment;
            $backend->notes = $frontend->notes;
            $backend->save();
        }

        $generals = General::all();

        foreach($generals as $general){
            $backend = new Backend();
            $backend->type_id = $general->type_id;
            $backend->description = $general->description;
            $backend->comment = $general->comment;
            $backend->notes = $general->notes;
            $backend->save();
        }

        $servers = Server::all();

        foreach($servers as $server){
            $backend = new Backend();
            $backend->type_id = $server->type_id;
            $backend->description = $server->description;
            $backend->comment = $server->comment;
            $backend->notes = $server->notes;
            $backend->save();
        }
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
