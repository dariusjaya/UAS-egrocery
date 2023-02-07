@extends('layout.mainlayout')
@section('content')
    <div class="content">
        <div class="item-container">
            @foreach($items as $item)
                <a href="/item/{{$item->item_id}}" class="item">
                    <img src={{$img[$item->item_id%sizeof($img)]}} />
                    <div>{{$item->item_name}}</div>
                </a>
            @endforeach
        </div>
    </div>
    {{ $items->links() }}
@endsection
