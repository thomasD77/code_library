@extends('layouts.admin_template')
@section('content')

    <h1><span class="badge badge-primary display-1 shadow">FAQ</span></h1>
    <h3><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('faqs.create')}}">Add New</a></span></h3>
    @if(Session::has('faqs_message'))
        <p class="alert alert-info my-3">{{session('faqs_message')}}</p>
    @endif
    <p>Displaying {{$FAQS->count()}} of {{ $FAQS->total() }} FAQ(s).</p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Questions</th>
            <th scope="col" >Answers</th>
            <th scope="col">Actions</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Deleted</th>
        </tr>
        </thead>
        <tbody>
        @if($FAQS)
            @foreach($FAQS as $FAQ)
                <tr>
                    <td>{{$FAQ->id ? $FAQ->id : 'No ID'}}</td>
                    @if($FAQ->deleted_at != null)
                        <td>{{$FAQ->questions ? $FAQ->questions : 'No Questions'}}</td>
                    @else
                        <td><a href="{{route('faqs.edit', $FAQ->id)}}">{{$FAQ->questions ? $FAQ->questions : 'No Questions'}}</a></td>
                    @endif
                    <td>{{$FAQ->answers ? $FAQ->answers : 'No Answers'}}</td>
                    <td>{{$FAQ->created_at->diffForHumans()}}</td>
                    <td>{{$FAQ->updated_at->diffForHumans()}}</td>
                    <td>{{$FAQ->deleted_at}}</td>
                    <td>
                        @if($FAQ->deleted_at != null)
                            <a class="btn btn-warning" href="{{route('admin.FAQRestore', $FAQ->id)}}">Restore</a>
                        @else
                            {!! Form::open(['method'=>'DELETE',
                            'action'=>['App\Http\Controllers\AdminFAQSController@destroy', $FAQ->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    {{$FAQS->links()}}
@stop




