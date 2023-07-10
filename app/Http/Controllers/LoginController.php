<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function authenticate(Request $request)
    {
        
        $credentials=$request->validate([
            'UserName'=> 'required',
            'password'=> 'required',
        ]);
        if (Auth::attempt($credentials) ) {
            $request->session()->regenerate();
          
    
 
            return redirect()->intended('/dashboard');
            
            # code...
        }
        return back()->with('loginError','Username atau Password tidak valid!');

        
        
        
    }
    public function logout()
    {
        Auth::logout();
        return view('/Login');
        // Logika lain setelah logout
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
