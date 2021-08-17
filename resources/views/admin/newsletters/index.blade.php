@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">Newsletter</span></h1>
    <h3><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('newsletters.create')}}">Add New</a></span></h3>
    <p>Displaying {{$newsletters->count()}} of {{ $newsletters->total() }} newsletter(s).</p>
    @if(Session::has('newsletter_send_message'))
        <p class="alert alert-info my-3">{{session('newsletter_send_message')}}</p>
    @endif
    @if(Session::has('newsletter_message'))
        <p class="alert alert-info my-3">{{session('newsletter_message')}}</p>
    @endif

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Title</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($newsletters)
            @foreach($newsletters as $newsletter)
                <tr>
                    <td>{{$newsletter->id ? $newsletter->id : 'No ID'}}</td>
                    <td>
                        <img class="rounded-circle" height="62" width="62" src="{{$newsletter->photo ? asset('images/newsletters') . $newsletter->photo->file : 'http://placehold.it/62x62'}}" alt="{{$newsletter->name}}">
                    </td>
                    @if($newsletter->deleted_at != null)
                   <td>{{$newsletter->title ? $newsletter->title : 'No Title'}}</td>
                    @else
                    <td><a href="{{route('newsletters.edit', $newsletter->id)}}">{{$newsletter->title ? $newsletter->title : 'No Title'}}</a></td>
                    @endif
                    <td>{{$newsletter->body ? $newsletter->body : 'No Body'}}</td>
                    <td>@if($newsletter->is_active != 0)
                            <i class="bg-dark text-white rounded far fa-paper-plane p-2"></i>
                        @else
                            <i class="bg-dark text-white fas fa-bookmark p-2"></i>
                        @endif
                    </td>
                    <td>{{$newsletter->created_at->diffForHumans()}}</td>
                    <td>{{$newsletter->updated_at->diffForHumans()}}</td>
                    <td><a class="btn btn-dark" href="{{route('newsletters.show', $newsletter->id)}}"><i class="fas fa-eye"></i></a></td>
                    <td>
                        @if($newsletter->deleted_at != null)
                            <a class="btn btn-warning" href="{{route('admin.newsletterRestore', $newsletter->id)}}">Restore</a>
                        @else
                            {!! Form::open(['method'=>'DELETE',
                            'action'=>['App\Http\Controllers\AdminNewslettersController@destroy', $newsletter->id]]) !!}
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
    {{$newsletters->links()}}
@stop




