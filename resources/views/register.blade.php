@extends('layout.mainlayout')
@section('content')
    <div>
        <div class="form">
            <b style="font-size: 25px">Login</b>
            <form method="POST" enctype="multipart/form-data" action="/doregister">
                @csrf
                <table>
                    <tr>
                        <td>
                            First Name:
                        </td>
                        <td>
                            <input style="width: 300px" value= "{{ old('first_name') }}"  name="first_name" class="input" type="text">
                        </td>
                        <td>
                            Last Name:
                        </td>
                        <td>
                            <input style="width: 300px" value= "{{ old('last_name') }}" name="last_name" class="input" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email:
                        </td>
                        <td>
                            <input style="width: 300px" name="email" value= "{{ old('email') }}" class="input" type="email">
                        </td>
                        <td>
                            Role:
                        </td>
                        <td>
                            <select style="width: 300px" name="role" >
                                <option {{old('role') == 1 ? 'selected' : ''}} value="1">Admin</option>
                                <option {{old('role') == 2 ? 'selected' : ''}} value="2">User</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Gender:
                        </td>
                        <td>
                            <div style="display: flex">
                                <input type="radio" {{old('gender') == 1 ? 'checked' : ''}} name="gender" value=1 />
                                <label for="male">Male</label>
                                <input type="radio" {{old('gender') == 2 ? 'checked' : ''}} name="gender" value=2 />
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
                            <input style="width: 300px" name="password" value="{{old('password')}}"  class="input" type="password">
                        </td>
                        <td>
                            Confirm Password:
                        </td>
                        <td>
                            <input style="width: 300px" name="password_confirmation" value="{{old('password_confirmation')}}"} class="input" type="password">
                        </td>
                    </tr>
                </table>

                <input class="button" type="submit" value="Submit">
                <p>Already have an account? Click <a href="/login">here</a></p>
            </form>
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
    </div>
@endsection
