@extends('layouts.admin_template')
@section('content')

    <h1><span class="badge badge-info display-1 shadow"><i class="fas fa-swimmer mr-2"></i>colors</span></h1>    <h3><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{--{{route('colors.create')}}--}}">Add New</a></span></h3>
     {{--@if(Session::has('color_message'))
         <p class="alert alert-info my-3">{{session('color_message')}}</p>
     @endif--}}
    <p>Displaying {{$colors->count()}} of {{ $colors->total() }} color(s).</p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Deleted</th>
        </tr>
        </thead>
        <tbody>
        @if($colors)
            @foreach($colors as $color)
                <tr>
                    <td>{{$color->id}}</td>

                    <td><a href="{{--{{route('colors.edit', $color->id)}}--}}">{{$color->name}}</a></td>
                    <td>{{$color->code}}</td>
                    <td>{{$color->created_at->diffForHumans()}}</td>
                    <td>{{$color->updated_at->diffForHumans()}}</td>
                      <td>{{$color->deleted_at/*->diffForHumans()*/}}</td>
                   {{-- <td>
                        @if($color->deleted_at != null)
                            <a class="btn btn-warning" href="{{route('admin.colorRestore', $color->id)}}">Restore</a>
                        @else
                            {!! Form::open(['method'=>'DELETE',
                            'action'=>['App\Http\Controllers\AdmincolorsController@destroy', $color->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>--}}
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    {{$colors->links()}}
@stop




