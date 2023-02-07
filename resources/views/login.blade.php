@extends('layout.mainlayout')
@section('content')
    <div>
        <div class="form">
            <b style="font-size: 25px">Login</b>
            <form method="POST" action="/dologin">
                @csrf
                <table>
                    <tr>
                        <td>
                            Email:
                        </td>
                        <td>
                            <input style="width: 300px" name="email" class="input" type="text" placeholder="email">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password:
                        </td>
                        <td>
                            <input style="width: 300px" name="password" class="input" type="password" placeholder="password">
                        </td>
                    </tr>
                </table>
                @if ($error = $errors->first('password'))
                    <div style="color: red">
                        {{ $error }}
                    </div>
                @endif
                <input class="button" type="submit" value="Submit">
                <p>Don't have an account? Register <a href="/register">here</a></p>
            </form>
        </div>
    </div>
@endsection
