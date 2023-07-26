<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
            'Foto' => 'Foto', 
            'Roles' => $request->Roles,
        ]);
    
        return response()->json(201);
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
}
