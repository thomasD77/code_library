@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">Orders Completed</span></h1>
    @if(Session::has('order_message'))
        <p class="alert alert-info my-3">{{session('order_message')}}</p>
    @endif
    <p>Displaying {{$orders->count()}} of {{ $orders->total() }} order(s).</p>
    <div class="d-flex justify-content-center align-items-center">
        <form class="row mb-0" name="orderDate" action="{{action('App\Http\Controllers\AdminOrdersController@OrderDateFinished')}}" method="post">
            @csrf
            <div>
                <input type="month" name="date">
                <button type="submit" class="btnstyle btn-dark rounded text-uppercase mt-lg-4"><i class="fas fa-sync"></i></button>
            </div>
        </form>
    </div>
    <a class="btn btn-dark my-3" href="{{route('complete.orders', ['download'=>'pdf'])}}">Export to PDF</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Customer</th>
            <th scope="col">Token</th>
            <th scope="col">Coupon</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Details</th>
            {{--<th scope="col">Deleted</th>
            <th scope="col">Action</th>--}}
        </tr>
        </thead>
        <tbody>
        @can('isAdmin')
        @if($orders)
            @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user ? $order->user->name : 'No Customer' }}</td>
                        <td>{{$order->token ? $order->token : 'No Token'}}</td>
                        <td>{{$order->coupon ? $order->coupon->code : 'No Coupon' }}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->updated_at->diffForHumans()}}</td>
                        <td><a class="btn btn-dark" href="{{route('orderdetails.show', $order->id)}}"><i class="fas fa-eye"></i></a></td>
                        {{--<td>{{$order->deleted_at}}</td>
                        <td>
                            @if($order->deleted_at != null)
                                <a class="btn btn-warning" href="{{route('admin.ordersRestore', $order->id)}}">Restore</a>
                            @else
                                {!! Form::open(['method'=>'DELETE',
                                'action'=>['App\Http\Controllers\AdminOrdersController@destroy', $order->id]]) !!}
                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                </div>
                                {!! Form::close() !!}
                            @endif
                        </td>--}}
                    </tr>
            @endforeach
        @endif
        @endcan
        @can('isCustomer')
            @if($orders)
                @foreach($orders as $order)
                    @if($order->user->id == Auth::user()->id)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->user ? $order->user->name : 'No Customer' }}</td>
                            <td>{{$order->token ? $order->token : 'No Token'}}</td>
                            <td>{{$order->coupon ? $order->coupon->code : 'No Coupon' }}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->updated_at->diffForHumans()}}</td>
                            <td><a class="btn btn-dark" href="{{route('orderdetails.show', $order->id)}}"><i class="fas fa-eye"></i></a></td>
                            {{--<td>{{$order->deleted_at}}</td>
                            <td>
                                @if($order->deleted_at != null)
                                    <a class="btn btn-warning" href="{{route('admin.ordersRestore', $order->id)}}">Restore</a>
                                @else
                                    {!! Form::open(['method'=>'DELETE',
                                    'action'=>['App\Http\Controllers\AdminOrdersController@destroy', $order->id]]) !!}
                                    <div class="form-group">
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                @endif
                            </td>--}}
                        </tr>
                    @endif
                @endforeach
            @endif
        @endcan
        </tbody>
    </table>
    {{$orders->links()}}
@stop




