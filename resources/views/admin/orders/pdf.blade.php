<h1><span class="badge badge-info display-1 shadow"><i class="fas fa-swimmer mr-2"></i>Orders</span></h1>
<p>Displaying {{$orders->count()}} of {{ $orders->total() }} order(s).</p>

<style type="text/css" media="all">
    #body{
        color: red;
    }
    td{
        text-align: center;
        vertical-align: middle;
        margin-top: 25%;
    }
</style>


<table style="width: 100%" class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Customer</th>
        <th scope="col">Token</th>
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
        <th scope="col">Deleted</th>
    </tr>
    </thead>
    <tbody id="body">
    @if($orders)
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user ? $order->user->name : 'Deleted customer' }}</td>
                <td>{{$order->token}}</td>
                <td>{{$order->created_at->diffForHumans()}}</td>
                <td>{{$order->updated_at->diffForHumans()}}</td>
                <td>{{$order->deleted_at}}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>




