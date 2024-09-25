<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Employe;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){
        
        return view('login');
    }

    public function login(){
       
            // User::create([
            //     'name' => 'cherif',
            //     'email'=>'cherif@fall.sn',
            //     'password' => Hash::make('4321'),
            // ]);
        
        
        return view('login');
    }
    
    public function logout(){
        Auth::logout();
        return to_route('auth.login');
    }

    public function authentication(LoginRequest $request){
        $credendials = $request->validated();
        // dd(Auth::attempt($credendials));

        if(Auth::attempt($credendials)){
            $request->session()->regenerate();
            return redirect(route('employee.list'));
        }

        return redirect()->back()->with('error','Email or password invalid.');
    }
}
