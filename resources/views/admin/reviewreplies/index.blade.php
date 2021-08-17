@extends('layouts.admin_template')
@section('content')

    <h1><span class="badge badge-primary display-1 shadow">Review Replies</span></h1>
    @if(Session::has('reviewreply_message'))
        <p class="alert alert-info my-3">{{session('reviewreply_message')}}</p>
    @endif
    <p>Displaying {{$reviewreplies->count()}} of {{ $reviewreplies->total() }} reviewreply(ies).</p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Photo</th>
            <th scope="col">Product</th>
            <th scope="col">Review Nr</th>
            <th scope="col">Author</th>
            <th scope="col">Text</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($reviewreplies)
            @foreach($reviewreplies as $reviewreply)
                <tr>
                    <td>{{$reviewreply->id ? $reviewreply->id : 'No ID'}}</td>
                    <td>
                        <img class="rounded-circle" height="62" width="62" src="{{$reviewreply->review ? asset('images/users') . $reviewreply->user->photo->file : 'http://placehold.it/62x62'}}" alt="{{$reviewreply->review}}">
                    </td>
                    <td>{{$reviewreply->review ? $reviewreply->review->product->name : 'No Product'}}</td>
                    <td>{{$reviewreply->review ? $reviewreply->review->id : 'No Review'}}</td>
                    <td>{{$reviewreply->user ? $reviewreply->user->name : 'No Author'}}</td>
                    <td>{{$reviewreply->body ? $reviewreply->body : 'No Text'}}</td>
                    <td>{{$reviewreply->created_at->diffForHumans()}}</td>
                    <td>{{$reviewreply->updated_at->diffForHumans()}}</td>
                    <td>
                        <div class="d-flex">
                            {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\AdminReviewRepliesController@update',$reviewreply->id]])!!}
                            @if($reviewreply->is_active)
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
                            @if($reviewreply->deleted_at == null)
                                {!! Form::open(['method'=>'DELETE',
                                'action'=>['App\Http\Controllers\AdminReviewRepliesController@destroy', $reviewreply->id]]) !!}
                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                </div>
                                {!! Form::close() !!}
                            @endif
                            </div>
                            @if($reviewreply->review)
                            <div class="form-group">
                                <a class="btn btn-dark mr-1" href="{{route('productpage', $reviewreply->review->product->slug)}}"><i class="fas
                                                fa-eye">
                                        </i></a>
                            </div>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    {{$reviewreplies->links()}}
@stop




