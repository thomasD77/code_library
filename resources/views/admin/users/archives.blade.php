@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">Users Archives</span></h1>

    @if(Session::has('user_message'))
        <p class="alert alert-info my-3">{{session('user_message')}}</p>
    @endif

    <div class="d-flex justify-content-between">
        <p>Displaying {{$users->count()}} of {{ $users->total() }} user(s).</p>
        <a class="btn btn-dark mr-5 mb-2" href="{{route('users.index')}}"><i class="fas fa-user-friends"></i></a>
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
            <th scope="col">Deleted</th>
            <th scope="col">Actions</th>
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
                    <td>{{$user->username ? $user->username : 'No Username'}}</td>
                    <td>{{$user->email ? $user->email : 'No Email'}}</td>
                    <td>@foreach($user->roles as $role)
                            <span class="badge badge-pill badge-dark p-2 m-1">{{$role->name ? $role->name : 'No Role'}}</span>
                        @endforeach</td>
                    <td>{{$user->is_active ? $user->is_active : 'No status'}}</td>
                    <td>{{$user->deleted_at}}</td>
                    <td><a class="btn btn-warning" href="{{route('admin.userRestore', $user->id)}}">Restore</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    {{$users->links()}}
@stop




