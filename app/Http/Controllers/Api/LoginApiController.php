<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginApiController extends Controller
{

    public function authenticate(Request $request)
    {
        
        $credentials=$request->validate([
            'UserName'=> 'required',
            'password'=> 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // The user is authenticated through the session.
            return response()->json(['user' => $user]);
        }

        // if (Auth::attempt($credentials) ) {
        //     $request->session()->regenerate();
        //     if(auth()->user()->Roles ==1 ){
        //         return redirect()->intended('/dashboardadmin');
        //     }
        //     else{
        //         return redirect()->intended('/dashboarduser');
        //     }
        //     # code...
        // }
        return response()->json(['message' => 'Invalid credentials'], 401);

        
        
        
    }
    public function logout()
    {
        Auth::logout();
        return view('/Login');
        // Logika lain setelah logout
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

}
