<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Arsip;
use Illuminate\Http\Request;

class ArsipApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $users = Arsip::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // Validasi request jika diperlukan
        Arsip::create([
            'NamaDokumen' => $request->NamaDokumen,
            'Keterangan' => $request->Keterangan,
            'NamaDesa' =>$request->NamaDesa,
            'Tahun' => $request->Tahun,
            'LokasiPenyimpanan' => $request->LokasiPenyimpanan,
            'NamaFile'=>$request->NamaFile

         
        ]);

        // Kirim respons
        return response()->json(201);
        

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $archive = Arsip::find($id);

        if (!$archive) {
            return response()->json(['message' => 'Archive not found'], 404);
        }
        return response()->json($archive);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arsip $arsip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
               // Cari user berdasarkan ID
               $arsip = Arsip::findOrFail($id);
               // Hapus user
               $arsip->delete();
               // Kirim respons
               return response()->json([
                   'message' => 'User deleted successfully',
               ]);
    }
}
