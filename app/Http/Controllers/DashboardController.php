<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Arsip;
use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminindex()
    {
        $JumlahAdmin = User::where('Roles' , 1)->count();
        $JumlahUser = User::where('Roles' , 2)->count();
        $TotalArsips = Arsip::count();
        
        return view('index',compact('JumlahAdmin','JumlahUser','TotalArsips'));
    }

    public function userindex()
    {
        $JumlahAdmin = User::where('Roles' , 1)->count();
        $JumlahUser = User::where('Roles' , 2)->count();
        $TotalArsips = Arsip::count();
        
        return view('index',compact('JumlahAdmin','JumlahUser','TotalArsips'));
    }

    public function getDashboardStat() {
        $JumlahAdmin = User::where('Roles' , 1)->count();
        $JumlahUser = User::where('Roles' , 2)->count();
        $TotalArsips = Arsip::count();
        $Histories = History::count();

        return response()->json([
            'jumlahAdmin' => $JumlahAdmin,
            'jumlahUser' => $JumlahUser,
            'jumlahArsip' => $TotalArsips,
            'riwayatUnduhan' => $Histories,
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
