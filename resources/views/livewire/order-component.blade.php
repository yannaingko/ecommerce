<div>
    @if(session('message'))
        <div class="alert alert-info">
            {{session('message')}}
        </div>
    @endif
    <table class="table my-5"> 
        <tr class="bg-info">
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Total</th>
            <th>Discount</th>
            <th>Products</th>
            <th>Cancle Order</th>
        </tr>
        @foreach($orders as $order)
            @if(auth()->user()->name == $order->user_name)
                <tr>
                    <td>{{$order->user_name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->total}} $</td>
                    <td>{{(int)$order->discount}} $</td>
                    <td>
                        <table class="table table-striped">
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                            @foreach($orderitems as $orderitem)
                                @if($orderitem->order_id == $order->id)
                                    <tr>
                                        <td>{{$orderitem->productname}}</td>
                                        <td>$ {{(int)$orderitem->price}}</td>
                                        <td>{{$orderitem->quantity}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm" wire:click.prevent="cancleOrder({{$order->id}})">Cancle Order</a>
                    </td>
                </tr>
            @endif 
        @endforeach
    </table>

    @livewire('footer-component')
</div>
