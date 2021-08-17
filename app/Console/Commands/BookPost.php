<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class BookPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command makes sure we check for bookings regardless our Posts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /*$posts = Post::all();
        $timeNow = Carbon::now()->addDay(1)->toDateString();
        foreach ($posts as $post) {
            if ($post->book == $timeNow) {
                $post->is_active = 1;
                $post->update();

            }
        }*/
    }
}
