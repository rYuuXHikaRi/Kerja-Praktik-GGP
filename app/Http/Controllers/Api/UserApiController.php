<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserApiController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        // Validasi permintaan untuk memastikan file gambar diunggah
        $request->validate([
            'Foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Mengambil file gambar dari permintaan
        $file = $request->file('Foto');
    
        // Menyimpan file gambar ke direktori yang sesuai (misalnya, direktori 'public/images')
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $fileName);
    
        // Menyimpan data pengguna ke dalam database dengan nama file gambar yang disimpan
        User::create([
            'NamaLengkap' => $request->NamaLengkap,
            'UserName' => $request->UserName,
            'password' => Hash::make($request->Password),
            'NomorHp' => $request->NomorHp,
            'Foto' => $fileName, // Menggunakan nama file yang disimpan dalam kolom 'Foto'
            'Roles' => $request->Roles,
        ]);
    
        return response()->json(['message' => 'Create Account Success'], 201);
    }
    

    public function show(User $user)
    {
    }

    public function update(Request $request, $id)
    {
        // Validasi request jika diperlukan
        $validatedData = $request->validate([
            'NamaLengkap' => 'required',
            'UserName' => 'required|unique:users,UserName,' . $id,
            'NomorHp' => 'required',
            'Foto' => 'required',
            'Roles' => 'required',
            'password' => 'required|min:6',
        ]);

        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Update data user
        $user->update([
            'NamaLengkap' => $validatedData['NamaLengkap'],
            'UserName' => $validatedData['UserName'],
            'NomorHp' => $validatedData['NomorHp'],
            'Foto' => $validatedData['Foto'],
            'Roles' => $validatedData['Roles'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Kirim respons
        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user,
        ]);
    }

    public function destroy($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);
        // Hapus user
        $user->delete();
        // Kirim respons
        return response()->json([
            'message' => 'User deleted successfully',
        ]);
    }

    public function getUserData(Request $request) {
        return response()->json($request->user());
    public function viewprofile($id){
        $users = User::where('id',$id)->first();
        return response()->json($users);

    }

    public function editprofile(Request $request, $id)
    {
        Log::info('Received POST data:', $request->all());
        $user = User::where('id',$id)->first();
        $user->NamaLengkap = $request->input('NamaLengkap');
        $user->UserName = $request->input('UserName');
        $user->NomorHp = $request->input('NomorHp');
        $password_lama = $user->password;
        $location = '.../public/assets/images/';



        if ( $request->input('passwordBaru') != '' && $request->input('passwordBaru')!='' ){
            if (Hash::check($request->input('password'), $password_lama)) {
                    if ($request->input('passwordBaru') === $request->input('password')) {
                        // Password baru sama dengan password lama, return an error response
                        return response()->json(['error' => 'Error: Password baru tidak boleh sama dengan password lama'], 400);
                    }
                    // Pembaruan password baru
                    $user->Password = Hash::make($request->input('passwordBaru'));
                } else {
                    // Password lama tidak cocok, return an error response
                    return response()->json(['error' => 'Error: Password lama tidak cocok'], 400);
                }
        }

        if ($request->hasFile('Foto')) {
            $file = $request->file('Foto');

            // // Simpan file ke penyimpanan "private"
            // $path = $file->store('', 'private/' . $folderName); // Simpan di folder private dengan nama file yang di-generate otomatis

            // // Lakukan operasi lain yang diperlukan, misalnya menyimpan data ke database

            $fileName = $file->getClientOriginalName();
            $location = '/assets/images/';
            $filePath= public_path('assets/images/'.$user->Foto);
            File::delete($filePath);
            $file->move(public_path($location), $fileName);

            $user->Foto = $fileName;
            // Storage::putFileAs('private/', $file, $fileName);
            // rename(storage_path('private/'.$fileName), public_path('/assets/images/'.$fileName));

            $user->save();
            return response()->json(['message' => $file . 'Upload berhasil']);
        }

        $user->save();
    
        
        // Return the updated user data as a JSON response
        return response()->json(['message' => 'Profile Berhasil Diubah', 'user' => $user]);
    }
}
