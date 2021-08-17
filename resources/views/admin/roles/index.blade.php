@extends('layouts.admin_template')
@section('content')

    <h1><span class="badge badge-info display-1 shadow"><i class="fas fa-swimmer mr-2"></i>Roles</span></h1>    <h3><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('roles.create')}}">Add New</a></span></h3>
     @if(Session::has('role_message'))
         <p class="alert alert-info my-3">{{session('role_message')}}</p>
     @endif
    <p>Displaying {{$roles->count()}} of {{ $roles->total() }} role(s).</p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Deleted</th>
        </tr>
        </thead>
        <tbody>
        @if($roles)
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>

                    <td><a href="{{route('roles.edit', $role->id)}}">{{$role->name}}</a></td>
                    <td>{{$role->created_at->diffForHumans()}}</td>
                    <td>{{$role->updated_at->diffForHumans()}}</td>
                      <td>{{$role->deleted_at/*->diffForHumans()*/}}</td>
                    <td>
                        @if($role->deleted_at != null)
                            <a class="btn btn-warning" href="{{route('admin.roleRestore', $role->id)}}">Restore</a>
                        @else
                            {!! Form::open(['method'=>'DELETE',
                            'action'=>['App\Http\Controllers\AdminRolesController@destroy', $role->id]]) !!}
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
    {{$roles->links()}}
@stop




