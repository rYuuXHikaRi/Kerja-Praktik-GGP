<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;


class LoginApiController extends Controller
{
    use HasApiTokens;
    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['authenticate']]);
    }

    public function authenticate(Request $request)
    {
        
        $credentials=$request->validate([
            'username'=> 'required',
            'password'=> 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);


        }
        $user = Auth::user();
        $token = $user->createToken('ARSIPin_Mobile_Apps')->plainTextToken;
        // The user is authenticated through the session.
        return response()->json(['token' => $token], 200);

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
