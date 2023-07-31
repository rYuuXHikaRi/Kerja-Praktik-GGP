<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
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
        // // Validasi permintaan untuk memastikan file gambar diunggah
        // $request->validate([
        //     'Foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
    
        // // Mengambil file gambar dari permintaan
        // $file = $request->file('Foto');
    
        // // Menyimpan file gambar ke direktori yang sesuai (misalnya, direktori 'public/images')
        // $fileName = time() . '.' . $file->getClientOriginalExtension();
        // $file->storeAs('public/images', $fileName);
    
        // Menyimpan data pengguna ke dalam database dengan nama file gambar yang disimpan
        User::create([
            'NamaLengkap' => $request->NamaLengkap,
            'UserName' => $request->UserName,
            'password' => Hash::make($request->Password),
            'NomorHp' => $request->NomorHp,
            'Foto' => 'Foto', 
            'Roles' => $request->Roles,
        ]);
    
        return response()->json(['message' => 'Create Account Success'], 201);
    }
    

    public function show(User $user)
    {
    }

    public function update(Request $request, $id)
    {

        Log::info('Received POST data:', $request->all());

        $user = User::findOrFail($id);
        $user->NamaLengkap = $request->input('NamaLengkap');
        $user->UserName = $request->input('UserName');
        $user->password = $request->input('password');
        $user->NomorHp = $request->input('NomorHp');
        $user->Roles = $request->input('Roles');

        $user->save();

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

    public function viewprofile($id){
        $users = User::where('id',$id)->first();
        return response()->json($users);

    }
    public function destroyFile($id)
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
