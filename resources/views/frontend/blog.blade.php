@extends('layouts.frontend_template')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <section class="row">
                @if($posts)
                @foreach($posts as $post)
                <div class="entry col-12 my-5">
                    <div class="grid-inner">
                        <div class="entry-image mb-3">
                            <img class="rounded w-75"  src="{{$post->photo ? asset('images/posts') . $post->photo->file : 'http://placehold.it/62x62'}}" alt="{{$post->name}}">
                        </div>
                        <div class="entry-title my-3">
                            <h2><a class="text-decoration-none text-dark my-5" href="">{{$post->title ? $post->title : 'No Title'}}</a></h2>
                        </div>
                        <div class="entry-meta d-flex w-75 justify-content-around my-4">
                                <div><i class="far fa-calendar-alt me-2"></i>{{$post->created_at->diffForHumans()}}</div>
                                <div><i class="far fa-folder me-2"></i>{{$post->postcategory ? $post->postcategory->name : "No Category"}}</div>
                        </div>
                        <div class="entry-content">
                            <p>{{Str::limit($post->body, 200)}}</p>
                            <a href="{{route('post', $post->slug)}}" class="btn btn-dark">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </section>
            <div class="d-flex justify-content-center ">
                {{$posts->links()}}
            </div>
        </div>
    </div>
</div>
@stop
