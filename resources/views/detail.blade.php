@extends('layout.mainlayout')
@section('content')
<div class="content" style="padding-left: 200px;padding-right: 200px">
    <h2>{{$item->item_name}}</h2>
    <div style="display: flex;">

        <img width="400px"  height="400px" src={{$img[$item->item_id%sizeof($img)]}} />
        <div style="margin: 25px">
            <div><b>Price: Rp. {{$item->price}},-</b></div>
            <div style="margin: 25px 0">{{$item->item_desc}}</div>
            <form method="post" action="/cart/add/{{$item->item_id}}">
                @csrf
                <input style="padding: 10px 25px; font-size: 10px; font-weight: bold; background-color: #f6e06c" type="submit" value="Buy"/>
            </form>
            <span>{{Session::get('message')}}</span>
        </div>
    </div>



</div>
@endsection
