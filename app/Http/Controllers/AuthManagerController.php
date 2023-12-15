<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthManagerController extends Controller
{
    //Register
    public function showRegistration(){
        return view('authenticate.registration');
    }
    function register(Request $request){
        $email = request()->input('email');

    // Kiểm tra email đã có trong database chưa
        if (Customer::where('email', $email)->exists()) {
            // Email đã tồn tại
            return redirect()->back()->with('exist-email', 'This email already exists! Use a different email.');
        }
        else{
            $user = new User();
            $customer = new Customer();
            
            $request->validate([
                'password' => 'min:8',
                'confirm' => 'same:password',
            ], [
                'password.min' => 'The password must be at least 8 characters long.',
                'confirm.same' => 'The confirmation password is incorrect. Please try again',
            ]);

            if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                return redirect()->back()->with('invalid-email', 'The email is invalid');
            }

            $password = bcrypt($request->password);
            
            $customer->fullName = $request->fullName;
            $customer->email = $request->email;
            $customer->password = $password;
            $customer->save();

            $user->name = $request->fullName;
            $user->email = $request->email;
            $user->password = $password;
            $user->save();
            return redirect()->route('show-login')->with('register-successfully', 'Đăng ký thành công!');
        }
    }

    //Login
    public function showLogin(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('authenticate.login');
    }

    function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->put('email', $request->email);
            return redirect()->route('index')->with('login-checked', 'Sign in successfull!');
        }
        return redirect()->route('show-login')->with('login-failed', 'Email or password invalid!');
    }
    
    //Logout
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('index');
    }
}
