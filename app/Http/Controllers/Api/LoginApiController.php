<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
{
    $credentials = $request->only('UserName', 'password');

    if (Auth::attempt($credentials)) {
        dd('RRR');

       
    } else {
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
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
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
