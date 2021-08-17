@extends('layouts.admin_template')
@section('content')
    @include('admin.includes.form_error')
    <h1><span class="badge badge-info display-1 shadow"><i class="fas fa-swimmer mr-2"></i>Edit Role</span></h1>
    <div class="row">
        <div class="col-8 img-thumbnail">
            {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminRolesController@update',$role->id]])
             !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name',$role->name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group mr-1">
                {!! Form::submit('Update Role',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
             <div class="d-flex">
                 {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminRolesController@destroy',
                 $role->id]]) !!}
                 <div class="form-group">
                     {!! Form::submit('Delete user',['class'=>'btn btn-danger']) !!}
                 </div>
                 {!! Form::close() !!}
             </div>
        </div>
    </div>
@stop
