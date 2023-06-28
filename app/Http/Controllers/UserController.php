<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'Foto' => 'required|mimes:jpeg,png,jpg,gif|max:5120 ',
        ]);
        $file = $validatedData[('Foto')];
        $filename =  $file->getClientOriginalName();
        // File upload location
        $location = '../public/assets/images/';


        User::create([
            'NamaLengkap' => $request->NamaLengkap,
            'UserName' => $request->UserName,
            'Password' =>  Hash::make($request->Password),
            'NomorHp' => $request->NomorHp,
            'Foto' => $filename,
            'Roles' => $request->Roles
        ]);

        $users = User::all();
        $file->move(public_path($location), $filename);
        return view('admin.user.index',compact('users'));
    }
}
