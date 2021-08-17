<?php

namespace App\Http\Controllers;

use App\Models\Backend;
use App\Models\Frontend;
use App\Models\General;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\Server;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $backend = Backend::paginate(10);
        $frontend = Frontend::paginate(10);
        $general = General::paginate(10);
        $server = Server::paginate(10);

        return view('admin.includes.admin' , compact('backend', 'frontend', 'general', 'server' ));
    }
}
