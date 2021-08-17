@extends('layouts.admin_template')
@section('content')
    @include('admin.includes.form_error')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-1">
                {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\ServerController@store','files'=>true]) !!}
                <div class="form-group col-6 px-0">
                    {!! Form::label('Select Type:') !!}
                    {!! Form::select('type_id',$types,null,['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('comment', 'Comment:') !!}
                    {!! Form::textarea('comment',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('notes', 'Notes:') !!}
                    {!! Form::textarea('notes',null,['class'=>'form-control', 'id' => 'textarea-editor']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('photos', 'Photo:', ) !!}
                    {!! Form::file('photos[]',['multiple'=>'multiple']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Save',['class'=>'btn btn-dark']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
