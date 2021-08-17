@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">User</span></h1>
    <div class="row my-3">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-title mb-0 d-flex justify-content-end">
                    <a href="{{route('users.edit', $user->id)}}"><i class="fas fa-edit text-dark fa-2x m-3"></i></a>
                </div>
                <div class="card-body  pt-0">
                    <h4 class="card-title">Name:</h4>
                    <p class="card-text">{{$user->name}}</p>
                    <h4 class="card-title">Email:</h4>
                    <p class="card-text">{{$user->email}}</p>
                    <h4 class="card-title">Role:</h4>
                    <p>@foreach($user->roles as $role)
                            <span class="badge badge-pill badge-dark p-2 m-1">{{$role->name}}</span>
                        @endforeach</p>
                    <h4 class="card-title">Status:</h4>
                    <p class="card-text">{{$user->is_active ? 'Active' : 'NotActive'}}</p>
                    <hr>
                    <p class="card-text">Created:{{$user->created_at->diffForHumans()}}</p>
                    <p class="card-text">Updated:{{$user->updated_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <img class="img-thumbnail img-fluid shadow w-50" src="{{$user->photo ? asset('images/users') . $user->photo->file : 'http://placehold.it/62x62'}}" alt="{{$user->name}}">
        </div>
    </div>

    <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active bg-dark text-white mx-2" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Orders</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link bg-dark text-white mx-2" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Address(es)</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Token</th>
                    <th scope="col">Coupon</th>
                </tr>
                </thead>
                <tbody>
                @if($user->orders)
                @foreach($user->orders as $order)
                    <tr>
                        <td>{{$order->id ? $order->id : 'No Order ID' }}</td>
                        <td>{{$order->token ? $order->token : 'No Token'}}</td>
                        <td>{{$order->coupon ? $order->coupon->code : 'No Coupon' }}</td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="d-flex align-items-center">
                <h2><span class="badge badge-dark display-1 shadow">Invoice Address</span></h2>
                <h3><span class="badge badge-dark shadow mx-2">
                    <a class="text-white text-decoration-none" href="{{route('addresses.create')}}"> <i class="fas fa-plus"></i></a>
            </span>
                </h3>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Street</th>
                    <th scope="col">Number</th>
                    <th scope="col">City</th>
                    <th scope="col">Postal code</th>
                    <th scope="col">Country</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($user->addresses)
                @foreach($user->addresses as $address)
                    <tr>
                        <td>{{$address->street ? $address->street : 'No Street'}}</td>
                        <td>{{$address->number ? $address->number : 'No Number'}}</td>
                        <td>{{$address->city ? $address->city : 'No City'}}</td>
                        <td>{{$address->postbox ? $address->postbox : 'No Postal Code'}}</td>
                        <td>{{$address->country ? $address->country : 'No Country'}}</td>
                        <td><a href="{{route('addresses.edit', $address->id)}}"><i class="fas fa-edit text-dark"></i></a></td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop




