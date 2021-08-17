@extends('layouts.admin_template')
@section('content')
    @include('admin.includes.form_error')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-1">
                {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\FrontendController@update', $frontend->id],'files'=>true]) !!}
                <div class="form-group col-6 px-0 mt-5">
                    {!! Form::label('Select Type:') !!}
                    {!! Form::select('type_id',$types,$frontend->type,['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description',$frontend->description,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('comment', 'Comment:') !!}
                    {!! Form::textarea('comment',$frontend->comment,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('notes', 'Notes:') !!}
                    {!! Form::textarea('notes',$frontend->notes,['class'=>'form-control', 'id' => 'textarea-editor']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('photos', 'Photo:', ) !!}
                    {!! Form::file('photos[]',['multiple'=>'multiple']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update',['class'=>'btn btn-dark']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
