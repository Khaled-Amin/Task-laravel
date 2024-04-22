<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {

        if($request->isMethod('post')) {
            $data =  $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|max:30'
            ];

            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required'
            ];

            $this->validate($request, $rules, $customMessages);

            // echo '<pre>'; print_r($data); die;
            if(Auth::guard('admin')->attempt(['email' => $data['email'] , 'password'=>$data['password']])){
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error_message' , 'Error in login email or password');
            }
        }

        return view('admin.login');
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login')->with('error_message' , 'The admin has been logged out');
    }
}
