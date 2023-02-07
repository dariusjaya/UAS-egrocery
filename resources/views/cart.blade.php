@extends('layout.mainlayout')
@section('content')
    <div class="content">
        @php
            $total = 0
        @endphp
        <h2>Cart</h2>
        <table style="text-align: center;margin-left: auto; margin-right: auto; width: 50%">
            @foreach($cart_items as $cart_item)
                <tr>
                    <td><img width="100px" height="100px" src={{$img[$cart_item->item->item_id%sizeof($img)]}} /></td>
                    <td><div>{{$cart_item->item->item_name}}</div></td>
                    <td><div>Rp. {{$cart_item->item->price}},-</div></td>
                    @php
                        $total += $cart_item->item->price
                    @endphp
                    <td>
                        <form action="cart/delete/{{$cart_item->id}}" method="post" >
                            @csrf
                            <input value="Delete" type="submit" />
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
        <div style="display: flex; justify-content: flex-end">
            <b style="margin: 0 20px" >TOTAL: Rp. {{$total}},-</b>
            <form method="post" action="cart/checkout">
                @csrf
                <input type="submit" value="Check out" />
            </form>
        </div>
        <div>{{Session::get('message')}}</div>
    </div>
@endsection
