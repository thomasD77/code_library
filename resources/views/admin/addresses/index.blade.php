@extends('layouts.admin_template')
@section('content')

    <h1><span class="badge badge-info display-1 shadow"><i class="fas fa-swimmer mr-2"></i>Addresses</span></h1>    <h3><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('addresses.create')}}">Add New</a></span></h3>
    @if(Session::has('address_message'))
        <p class="alert alert-info my-3">{{session('address_message')}}</p>
    @endif
    <p>Displaying {{$addresses->count()}} of {{ $addresses->total() }} address(es).</p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Customer</th>
            <th scope="col">@sortablelink('street')</th>
            <th scope="col">@sortablelink('number')</th>
            <th scope="col">@sortablelink('postbox')</th>
            <th scope="col">@sortablelink('city')</th>
            <th scope="col">@sortablelink('country')</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Deleted</th>



        </tr>
        </thead>
        <tbody>
        @if($addresses)
            @foreach($addresses as $address)
                <tr>
                    <td>{{$address->id}}</td>
                    <td>@foreach($address->users as $user)
                            <span class="badge badge-pill badge-info">{{$user->name}}</span>
                        @endforeach</td>
                    <td><a href="{{route('addresses.edit', $address->id)}}">{{$address->street}}</a></td>
                    <td>{{$address->number ? $address->number : 'No number'}}</td>
                    <td>{{$address->postbox ? $address->postbox : 'No postbox'}}</td>
                    <td>{{$address->city ? $address->city : 'No city'}}</td>
                    <td>{{$address->country ? $address->country : 'No country'}}</td>
                    <td>{{$address->created_at->diffForHumans()}}</td>
                    <td>{{$address->updated_at->diffForHumans()}}</td>
                    <td>{{$address->deleted_at}}</td>
                    <td>
                        @if($address->deleted_at != null)
                            <a class="btn btn-warning" href="{{route('admin.addressRestore', $address->id)}}">Restore</a>
                        @else
                            {!! Form::open(['method'=>'DELETE',
                            'action'=>['App\Http\Controllers\AdminAddressesController@destroy', $address->id]]) !!}
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
    {{$addresses->links()}}
@stop




