<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        // first check if you are loggedin and admin user ...
      
        // check if user not login and not in login page : redirect to the if statement 2 , to make sur 
        if (!Auth::check() && $request->path() != 'admin/login') {
            return redirect('/admin/login');
        }
        // show login page
        if (!Auth::check() && $request->path() == 'admin/login') {
            return view('admin');
        }

        // you are already logged in... so check for if you are an admin user..
        $user = Auth::user();
       
        if ($user->userType == 'User') {
            return redirect('/admin/login');
        }

        //if you come from login and you already logged
        if ($request->path() == 'admin/login') {
            return redirect('/admin');
        }

        return view('admin');

       
    }
}
