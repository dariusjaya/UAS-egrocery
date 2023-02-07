@extends('layout.mainlayout')
@section('content')
    <div class="content">
        <h1>Profile</h1>
        <div style="display: flex">
            <img width="300px" height="300px" style="margin-right: 20px" src="{{asset($user->display_picture_link)}}">
            <form method="POST" enctype="multipart/form-data" action="/profile/update">
                @csrf
                <table>
                    <tr>
                        <td>
                            First Name:
                        </td>
                        <td>
                            <input style="width: 300px" value= "{{$user->first_name}}"  name="first_name" class="input" type="text">
                        </td>
                        <td>
                            Last Name:
                        </td>
                        <td>
                            <input style="width: 300px" value= "{{ $user->last_name }}" name="last_name" class="input" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email:
                        </td>
                        <td>
                            <input style="width: 300px" name="email" value= "{{ $user->email }}" class="input" type="email">
                        </td>
                        <td>
                            Role:
                        </td>
                        <td>
                            <select style="width: 300px" name="role" >
                                <option {{$user->role_id == 1 ? 'selected' : ''}} value=1>Admin</option>
                                <option {{$user->role_id == 2 ? 'selected' : ''}} value=2>User</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Gender:
                        </td>
                        <td>
                            <div style="display: flex">
                                <input type="radio" {{$user->gender_id == 1 ? 'checked' : ''}} name="gender" value=1 />
                                <label for="male">Male</label>
                                <input type="radio" {{$user->gender_id == 2 ? 'checked' : ''}} name="gender" value=2 />
                                <label for="female" >Female</label>
                            </div>
                        </td>
                        <td>
                            Display Picture:
                        </td>
                        <td>

                            <input type="file" name="dp"/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Password:
                        </td>
                        <td>
                            <input style="width: 300px" name="password" value=""  class="input" type="password">
                        </td>
                        <td>
                            Confirm Password:
                        </td>
                        <td>
                            <input style="width: 300px" name="password_confirmation" value="" class="input" type="password">
                        </td>
                    </tr>
                </table>
                <input class="button" type="submit" value="Submit">
            </form>
        </div>
        @if(Session::get('message') == "success")
            <span>Success update data</span>
        @endif
        @if ($errors->any())
            <div  style="color: red" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
