<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Intervention\Image\Facades\Image;
use Psy\Util\Str;

class AccountController extends Controller
{
    protected $primaryKey = 'account_id';
    //
    public function authenticate(Request $request)
    {
        $errors = new MessageBag(); // initiate MessageBag

        error_log(Session::getId());
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) // use the inbuilt Auth::attempt method to log in the user ( if the credentials are wrong, this will fail )
        {

            return Redirect::to('/home')->with('alert-success', 'You are now logged in.'); // if the credentials were correct, Auth::attempt will log in the user
        }

        $errors = new MessageBag(['password' => ['email and/or password invalid.']]); // if Auth::attempt fails (wrong credentials) create a new message bag instance.

        return Redirect::to('/login')->withErrors($errors); // redirect back to the login page, using ->withErrors($errors) you send the error created above
    }

    public function register(Request $request){
        $request->validate([
            'first_name' => 'required|alpha_dash:ascii|max:25',
            'last_name' => 'required|alpha_dash:ascii|max:25',
            'email' => 'required|email:rfc,dns',
            'role' => 'required|between:1,2',
            'gender' => 'required',
            'dp' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'required|min:8|alpha_num:ascii|confirmed',
            'password_confirmation' => 'required|min:8|alpha_num:ascii'
        ]);

        $new_acc = new Account();
        $new_acc->first_name = $request->first_name;
        $new_acc->last_name = $request->last_name;
        $new_acc->email = $request->email;
        $new_acc->role_id = $request->role;
        $new_acc->gender_id = $request->gender;

        $new_acc->password = Hash::make($request->password);


        if($request->hasfile('dp'))
        {
            $destinationPath = 'public';
            $path = $request->file('dp')->store($destinationPath);
            $path = str_replace('public','storage',$path);
            $new_acc->display_picture_link = $path;
        }


        $new_acc->save();


        return Redirect::to('/login');

    }

    public function update(Request $request){
        $request->validate([
            'first_name' => 'required|alpha_dash:ascii|max:25',
            'last_name' => 'required|alpha_dash:ascii|max:25',
            'email' => 'required|email:rfc,dns',
            'role' => 'required|between:1,2',
            'gender' => 'required',
            'dp' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'required|min:8|alpha_num:ascii|confirmed',
            'password_confirmation' => 'required|min:8|alpha_num:ascii'
        ]);

        $curr_acc = Auth::user();
        $curr_acc->first_name = $request->first_name;
        $curr_acc->last_name = $request->last_name;
        $curr_acc->email = $request->email;
        $curr_acc->role_id = $request->role;
        $curr_acc->gender_id = $request->gender;

        $curr_acc->password = Hash::make($request->password);


        if($request->hasfile('dp'))
        {
            $destinationPath = 'public';
            $path = $request->file('dp')->store($destinationPath);
            $path = str_replace('public','storage',$path);
            $curr_acc->display_picture_link = $path;
        }


        $curr_acc->save();


        return view('message', ['message'=> "Saved!"]);

    }

    public function update_role(Request  $request, $acc_id){
        $acc = Account::all()->where('id','=', $acc_id)->first();
        $acc->role_id = $request->role_id;

        $acc->save();
        return Redirect::back()->with(['message' => 'role for '.$acc->first_name." ".$acc->last_name.' updated']);
    }

    public function delete($id){
        $acc = Account::all()->where('id','=', $id)->first();
        $acc->delete();
        return Redirect::back()->with(['message' => $acc->first_name." ".$acc->last_name.' deleted']);
    }

    public function logout(){
        Auth::logout();
        return view('message', ['message' => "Log Out Success!"]);
    }

    public function profile_page(){
        return view('profile', ['user' => Auth::user()]);
    }

    public function accounts_page(){
        $users = Account::all();
        $roles = Role::all();
        return view('accounts', ['accounts' => $users, 'roles' => $roles]);
    }
}
