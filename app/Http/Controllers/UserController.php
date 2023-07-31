<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Arsip;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

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
            'UserName' => [
                'required',
                Rule::unique('users')->where(function ($query) use ($request) {
                    return $query->where('UserName', $request->UserName);
                }),
            ],
        ]);
        
        $file = $validatedData[('Foto')];
        $filename =  $file->getClientOriginalName();
        // File upload location
        $location = '../public/assets/images/';


        User::create([
            'NamaLengkap' => $request->NamaLengkap,
            'UserName' => $request->UserName,
            'password' =>  Hash::make($request->password),
            'NomorHp' => $request->NomorHp,
            'Foto' => $filename,
            'Roles' => $request->Roles
        ]);

        $file->move(public_path($location), $filename);
        Session::flash('success', 'Data User Berhasil Ditambahkan');
        return view('admin.user.create');

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
        Session::flash('success', 'Data User Berhasil DiUbah');
        return redirect()->back();

    }
    public function destroy($id)
    {
        $data = User::where('id', $id)->first();
        $data->delete();



        Session::flash('success', 'Data User Berhasil DiHapus');
        $users=User::all();
        return redirect()->back();
    }
    public function ShowCountDashboard(){

        $JumlahAdmin = User::where('Roles' , 1)->count();
        $JumlahUser = User::where('Roles' , 2)->count();
        $TotalArsips = Arsip::count();;

        return view('Dashboard',compact('JumlahAdmin','JumlahUser','TotalArsips'));
    }

    public function ShowProfile()
    {
     
        $user = User::where('id', auth()->user()->id)->first();
        return view('profil', compact('user'));
    }

    public function adminShowProfile()
    {
     
        $user = User::where('id', auth()->user()->id)->first();
        return view('profil', compact('user'));
    }

    public function EditProfile(Request $request, $id){

        $user = User::where('id',auth()->user()->id)->first();
        $user->NamaLengkap = $request->input('NamaLengkap');
        $user->UserName = $request->input('UserName');
        $user->NomorHp = $request->input('NomorHp');
        $password_lama = $user->password;

        if (Hash::check($request->input('Password_lama'), $password_lama)) {
            if ($request->input('Password_lama') === $request->input('Password')) {
                // Password baru sama dengan password lama, tampilkan pesan error
                return redirect()->back()->withErrors(['Password' => 'Error: Password baru tidak boleh sama dengan password lama']);
            }
            // Pembaruan password baru
            $user->Password = Hash::make($request->input('Password'));
        } else {
            // Password lama tidak cocok, tampilkan pesan error
            return redirect()->back()->withErrors(['Password_lama' => 'Error: Password lama tidak cocok']);
        }

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
        $user=User::where('id',auth()->user()->id)->first();
        Session::flash('success', 'Profile Berhasil Di Ubah');
        return view('Profil',compact('user'));
    }

    public function adminEditProfile(Request $request, $id){

        $user = User::where('id',auth()->user()->id)->first();
        $user->NamaLengkap = $request->input('NamaLengkap');
        $user->UserName = $request->input('UserName');
        $user->NomorHp = $request->input('NomorHp');
        $password_lama = $user->password;

        if (Hash::check($request->input('Password_lama'), $password_lama)) {
            if ($request->input('Password_lama') === $request->input('Password')) {
                // Password baru sama dengan password lama, tampilkan pesan error
                return redirect()->back()->withErrors([
                    'Password' => 'Error: Password baru tidak boleh sama dengan password lama',
                    'Password_lama' => 'Error: Password baru tidak boleh sama dengan password lama'
                ]);
            }
            // Pembaruan password baru
            $user->Password = Hash::make($request->input('Password'));
        } else {
            // Password lama tidak cocok, tampilkan pesan error
            return redirect()->back()->withErrors(['Password_lama' => 'Error: Password lama tidak cocok']);
        }
        


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
        $user=User::where('id',auth()->user()->id)->first();
        Session::flash('success', 'Profile Berhasil Di Ubah');
        return view('Profil',compact('user'));
    }



}

