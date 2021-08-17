@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">Newsletter - Signed Up</span></h1>
    <p>Displaying {{$readers->count()}} of {{ $readers->total() }} reader(s).</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Email</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($readers)
            @foreach($readers as $reader)
                <tr>
                    <td>{{$reader->id ? $reader->id : 'No ID'}}</td>
                    <td>{{$reader->email ? $reader->email : 'No Email'}}</td>
                    <td>{{$reader->created_at->diffForHumans()}}</td>
                    <td>{{$reader->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop




