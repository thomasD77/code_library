@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">Prospects</span></h1>
    <p>Displaying {{$prospects->count()}} of {{ $prospects->total() }} order(s).</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @if($prospects)
            @foreach($prospects as $prospect)
                <tr>
                    <td>{{$prospect->id ? $prospect->id : 'No ID'}}</td>
                    <td>{{$prospect->name ? $prospect->name : 'No Name'}}</td>
                    <td>{{$prospect->email ? $prospect->email : 'No Email'}}</td>
                    <td>{{$prospect->subject ? $prospect->subject : 'No Subject'}}</td>
                    <td>Message from Prospect</td>
                    <td>{{$prospect->created_at->diffForHumans()}}</td>
                    <td>{{$prospect->updated_at->diffForHumans()}}</td>
                    <td>
                        <a class="btn btn-dark" href="{{route('prospects.show', $prospect->id)}}"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop




