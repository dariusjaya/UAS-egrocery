@extends('layout.mainlayout')
@section('content')
    <div class="content" style="display: flex; justify-content: center">
        <div style="display: flex; flex-direction: column; height: 400px;width:400px; justify-content: center;align-items: center;border-radius: 50%;border: 5px solid #f6e06c">
            <div style="margin: 20px 0;font-size: 15px;">{{$message}}</div>

            <div>
                @if(\Illuminate\Support\Facades\Auth::user() != null)
                    <a href="/home">Click here to "Home"</a>
                @endif
            </div>

        </div>

    </div>
@endsection
