@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">Reviews</span></h1>
    @if(Session::has('review_message'))
        <p class="alert alert-info my-3">{{session('review_message')}}</p>
    @endif
    <p>Displaying {{$reviews->count()}} of {{ $reviews->total() }} review(s).</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Photo</th>
            <th scope="col" >Product</th>
            <th scope="col" >Author</th>
            <th scope="col">Text</th>
            <th scope="col">Rating</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($reviews)
            @foreach($reviews as $review)
                <tr>
                    <td>{{$review->id ? $review->id : 'No ID'}}</td>
                    <td>
                        <img class="rounded-circle" height="62" width="62" src="{{$review->user->photo ? asset('images/users') . $review->user->photo->file : 'http://placehold.it/62x62'}}" alt="{{$review->user->name}}">
                    </td>
                    <td>{{$review->product ? $review->product->name : 'No Product'}}</td>
                    <td>{{$review->user ? $review->user->name : 'No Author'}}</td>
                    <td>{{$review->body ? $review->body : 'No Text'}}</td>
                    <td class="text-warning bg-dark badge badge-pill">@if($review->rating == 1)
                    *
                        @elseif($review->rating == 2)
                    * *
                        @elseif($review->rating == 3)
                    * * *
                        @elseif($review->rating == 4)
                    * * * *
                        @elseif($review->rating == 5)
                    * * * * *
                        @else
                            /
                            @endif</td>

                    <td>{{$review->created_at->diffForHumans()}}</td>
                    <td>{{$review->updated_at->diffForHumans()}}</td>
                    <td>
                        @if($review->deleted_at == null)
                        <div class="d-flex">
                            {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\AdminReviewsController@update',$review->id]])!!}
                            @if($review->is_active)
                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group">
                                    {!! Form::button('<i class="fas fa-unlock"></i>', ['type'=>'submit',
                                    'class'=>'btn btn-success
                                    mr-1']) !!}
                                </div>
                            @else
                                <input type="hidden" name="is_active" value="1">
                                <div class="form-group">
                                    {!! Form::button('<i class="fas fa-lock"></i>', ['type'=>'submit','class'=>'btn
                                    btn-danger mr-1']) !!}
                                </div>
                            @endif
                            {!! Form::close() !!}
                            <div class="mr-1">
                                @if($review->deleted_at == null)
                                    {!! Form::open(['method'=>'DELETE',
                                    'action'=>['App\Http\Controllers\AdminReviewsController@destroy', $review->id]]) !!}
                                    <div class="form-group">
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                @endif
                            </div>
                            <div>
                                @if($review->deleted_at == null)
                                    <a class="btn btn-dark" href="{{route('productpage', $review->product->slug)}}"><i class="fas fa-eye "></i></a>
                                @endif
                            </div>
                        </div>
                            @endif
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    {{$reviews->links()}}
@stop




