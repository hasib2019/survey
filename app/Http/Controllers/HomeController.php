<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('admin.dashboard');
        }if (auth()->user()->is_admin == 2) {
            return redirect()->route('merchant.dashboard');
        }
        if (auth()->user()->is_admin == 0) {
            return view('user.dashboard');
        }
    }
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('admin/dashboard');
    }
    public function merchantHome()
    {
        return view('merchant/dashboard');
    }
    public function usertHome()
    {
        return view('user/dashboard');
    }

    public function viewUser()
    {
        $user = User::all();
       return view('admin.user_view', compact('user'));
    }

    public function add_user()
    {
        return view('admin.user');
    }

    public function userCreate(Request $request)
    {
        // dd($request->password);
        $user = new User();
        $user->name = $request->name;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->role;
        if($user->save()){
            alert()->success('User Added Sucessfull!')->autoclose(3000);
            return redirect()->route('view.user');
        }else{
            alert()->error('Data Not Saved');
            return back();
        }
    }
}
