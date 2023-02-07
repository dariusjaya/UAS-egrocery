@extends('layout.mainlayout')
@section('content')
    <div class="content" style="display: flex; align-items: center; flex-direction: column">
        <table border="2" style="text-align: center;margin-left: auto; margin-right: auto; width: 500px">
            <tr>
                <th>Account</th>
                <th>Action</th>
            </tr>
            @foreach($accounts as $account)
                <tr>
                    <td>
                        {{$account->first_name." ".$account->last_name." - ".$account->role->role_name}}
                    </td>
                    <td>
                        @if(\Illuminate\Support\Facades\Auth::id() != $account->id)
                            <form style="margin: 5px" action="/account/{{$account->id}}/update-role" method="post">
                                @csrf
                                <select value="{{$account->role->role_id}}" name="role_id">
                                    @foreach($roles as $role)
                                        <option {{$account->role->role_id == $role->role_id ? 'selected' : ''}} value="{{$role->role_id}}">{{$role->role_name}}</option>
                                    @endforeach
                                </select>
                                <input type="submit" value="Update role"/>
                            </form>
                            <form style="margin: 5px" action="/account/{{$account->id}}/delete" method="post">
                                @csrf
                                <input type="submit" value="Delete"/>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
            <h3>{{Session::get('message')}}</h3>
    </div>
@endsection
