<?php

namespace App\Http\Controllers;

use App\Events\PostSoftDelete;
use App\Http\Requests\PostEditRequest;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostComment;
use App\Models\PostPhoto;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Database\Seeders\TagsTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::withTrashed()
            ->with(['photo', 'user', 'postcategory'])
            ->latest()
            ->paginate(5);

        $timeNow = Carbon::now()->toDateString();

        return view('admin.posts.index', compact('posts', 'timeNow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $postcategories = PostCategory::pluck('name', 'id')
            ->all();
        $users = User::pluck('name', 'id')
            ->all();

        return view('admin.posts.create',compact('postcategories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)

        {
            //
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;
            $post->postcategory_id = $request->postcategories[0];


            if($file = $request->file('photo_id')){
                $name = time(). $file->getClientOriginalName();
                $file->move('images/posts', $name);

                $photo = Photo::create(['file'=>$name]);
                $post->photo_id = $photo->id;
            }
            $post['slug'] = Str::slug($request->title, '-');

            $post->save();

            return redirect('admin/posts');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $postcategories = PostCategory::pluck('name','id')
            ->all();
        $users = User::pluck('name', 'id')
            ->all();
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post', 'postcategories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->postcategory_id = $request->postcategory_id;

        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images/posts', $name);
            $photo = Photo::create(['file'=>$name]);
            $post->photo_id = $photo->id;
        }
        $post['slug'] = Str::slug($request->title, '-');

        $post->update();
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();
        Session::flash('post_message', $post->title . ' was deleted');

        return redirect('/admin/posts');
    }


    public function postsRestore($id)
    {
        $post = Post::onlyTrashed()
            ->findOrFail($id);
        Post::onlyTrashed()
            ->where('id', $id);

        $post->restore();
        Session::flash('post_message', $post->title . ' was restored');

        return redirect('admin/posts');
    }


    public function datePost(Request $request)
    {
        $datePost = $request->datePost;
        $id = $request->post_id;                                        // When we book a post, we will push data
        $post = Post::findOrFail($id);                                  // to database here
                $post->book = $datePost;
                $post->update();

        return redirect('admin/posts');
    }

    public function publishPost(Request $request)
    {
        $datePost = Carbon::now()->subDay(1)->toDateString();           // When whe publish a post straight away we
        $id = $request->post_id;                                        // book it on the date of yesterday so it
        $post = Post::findOrFail($id);                                  // will be online immediately
        $post->book = $datePost;
        $post->update();

        return redirect('admin/posts');
    }

    public function deleteBooking(Request $request)
    {
        $id = $request->post_id;
        $post = Post::findOrFail($id);
        $post->book = null;
        $post->update();

        return redirect('admin/posts');
    }

    public function post($id){
        $post = Post::with(['user', 'photo'])
            ->where('id',$id)
            ->first();

        return view('frontend.post', compact('post'));
    }


}
