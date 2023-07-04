<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users= User::where('Roles',1)->get();
        $title="Data Admin";
        return view('admin.user.index', compact('users','title'));
    }

    public function showuser()
    {
        $users= User::where('Roles',2)->get();
        $title="Data User";
        return view('admin.user.index',compact('users','title'));
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


    public function edit($id)
    {
     
        $user = User::where('id', $id)->first();
        return view('admin.user.edit', compact('user'));
    }



    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->NamaLengkap = $request->input('NamaLengkap');
        $user->NomorHp = $request->input('NomorHp');
        $user->Roles = $request->input('Roles');

        if ($request->hasFile('Foto')) {

            // Delete the previous photo if it exists
            if ($user->Foto) {
                $filePath = public_path('assets/images/' .$user->Foto);
                File::delete($filePath);
            }
            // Store the uploaded file
            $validatedData = $request->validate([
            
                'Foto' => 'required|mimes:jpeg,png,jpg,gif|max:5120 ',
            ]);
            $file = $validatedData[('Foto')];
            $filename =  $file->getClientOriginalName();
            // File upload location
            $location = '../public/assets/images/';
            $file->move(public_path($location), $filename);
            $user->Foto = $filename;
        }
        

        $user->save();

        $users=User::all();
        return view('admin.user.index',compact('users'));

    }
    public function destroy($id)
    {
        $data = User::where('id', $id)->first();
        $data->delete();

        $users=User::all();
        return view('admin.user.index',compact('users'));
    }

}

