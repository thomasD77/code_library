@extends('layouts.admin_template')
@section('content')
    @can('isAdmin')
    <h1><span class="badge badge-primary display-1 shadow">Users</span></h1>
    <h3><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('users.create')}}">Add New</a>
        </span>
    </h3>
    @if(Session::has('user_message'))
        <p class="alert alert-info my-3">{{session('user_message')}}</p>
    @endif
    <div class="d-flex justify-content-between">
        <p>Displaying {{$users->count()}} of {{ $users->total() }} user(s).</p>
        <a class="btn btn-dark mr-5 mb-2" href="{{route('users.archives')}}"><i class="fas fa-archive"></i></a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id ? $user->id : 'No ID'}}</td>
                    <td>
                        <img class="rounded-circle" height="62" width="62" src="{{$user->photo ? asset('images/users') . $user->photo->file : 'http://placehold.it/62x62'}}" alt="{{$user->name}}">
                    </td>
                    <td>{{$user->name ? $user->name : 'No Name'}}</td>
                    <td>{{$user->username ? $user->username : 'No username'}}</td>
                    <td>{{$user->email ? $user->email : 'No email'}}</td>
                    <td>@foreach($user->roles as $role)
                          <span class="badge badge-pill badge-dark p-2 m-1">{{$role->name ? $role->name : 'No Role'}}</span>
                      @endforeach</td>
                    <td>{{$user->is_active ? 'Active' : 'Not Active'}}</td>
                    <td><a class="btn btn-dark" href="{{route('users.show', $user->id)}}"><i class="fas fa-eye "></i></a></td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td>{{$user->deleted_at}}</td>
                    <td>{!! Form::open(['method'=>'DELETE',
                           'action'=>['App\Http\Controllers\AdminUsersController@destroy', $user->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$users->links()}}
    </div>
    @endcan

    @can('isCustomer')
        <h1><span class="badge badge-primary display-1 shadow">My Account</span></h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if($users)
                @foreach($users as $user)
                    <tr>
                        @if($user->id == \Illuminate\Support\Facades\Auth::user()->id)
                        <td>{{$user->id ? $user->id : 'No ID'}}</td>
                        <td>
                            <img class="rounded-circle" height="62" width="62" src="{{$user->photo ? asset('images/users') . $user->photo->file : 'http://placehold.it/62x62'}}" alt="{{$user->name}}">
                        </td>
                        <td>{{$user->name ? $user->name : 'No Name'}}</td>
                        <td>{{$user->username ? $user->username : 'No username'}}</td>
                        <td>{{$user->email ? $user->email : 'No email'}}</td>
                        <td>@foreach($user->roles as $role)
                                <span class="badge badge-pill badge-dark p-2 m-1">{{$role->name ? $role->name : 'No Role'}}</span>
                            @endforeach</td>
                        <td>{{$user->is_active ? 'Active' : 'Not Active'}}</td>
                        <td><a class="btn btn-dark" href="{{route('users.show', $user->id)}}"><i class="fas fa-eye "></i></a></td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                        <td>{{$user->deleted_at}}</td>
                        <td>{!! Form::open(['method'=>'DELETE',
                           'action'=>['App\Http\Controllers\AdminUsersController@destroy', $user->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                        @endif
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    @endcan

@stop




