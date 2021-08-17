@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow"><i class="fas fa-swimmer mr-2"></i>Coupons</span></h1>
<!--    <h3><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('coupons.create')}}">Add New</a></span></h3>-->
     @if(Session::has('coupon_message'))
         <p class="alert alert-info my-3">{{session('coupon_message')}}</p>
     @endif
    <p>Displaying {{$coupons->count()}} of {{ $coupons->total() }} coupon(s).</p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Description</th>
            <th scope="col">Code</th>
            <th scope="col">Discount %</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
<!--            <th scope="col">Deleted</th>-->
        </tr>
        </thead>
        <tbody>
        @if($coupons)
            @foreach($coupons as $coupon)
                <tr>
                    <td>{{$coupon->id}}</td>
                    <td>{{$coupon->description}}</td>
                    <td>{{$coupon->code}}</td>
                    <td>{{$coupon->discount}}</td>
                {{--    <td><a href="{{route('coupons.edit', $coupon->id)}}">{{$coupon->name}}</a></td>--}}
                    <td>{{$coupon->created_at->diffForHumans()}}</td>
                    <td>{{$coupon->updated_at->diffForHumans()}}</td>
<!--                    <td>{{$coupon->deleted_at}}</td>-->
                    {{--<td>
                        @if($coupon->deleted_at != null)
                            <a class="btn btn-warning" href="{{route('admin.couponRestore', $coupon->id)}}">Restore</a>
                        @else
                            {!! Form::open(['method'=>'DELETE',
                            'action'=>['App\Http\Controllers\AdmincouponsController@destroy', $coupon->id]]) !!}
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
    {{$coupons->links()}}
@stop




