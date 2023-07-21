<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
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
        // Validasi request jika diperlukan
        $validatedData = $request->validate([
            'NamaLengkap' => 'required',
            'UserName' => 'required|unique:users',
            'NomorHp' => 'required',
            'Foto' => 'required',
            'Roles' => 'required',
            'password' => 'required|min:6',
            'id' => 'required',
        ]);

        // Buat data user baru
        $user = User::create([
            'NamaLengkap' => $validatedData['NamaLengkap'],
            'UserName' => $validatedData['UserName'],
            'NomorHp' => $validatedData['NomorHp'],
            'Foto' => $validatedData['Foto'],
            'Roles' => $validatedData['Roles'],
            'password' => bcrypt($validatedData['password']),
            'id' => $validatedData['id'],
        ]);

        // Kirim respons
        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi request jika diperlukan
        $validatedData = $request->validate([
            'NamaLengkap' => 'required',
            'UserName' => 'required|unique:users,UserName,'.$id,
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

    /**
     * Remove the specified resource from storage.
     */
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
