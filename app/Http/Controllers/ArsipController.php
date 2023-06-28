<?php

namespace App\Http\Controllers;

use App\Models\Arsip;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class ArsipController extends Controller
{   

    public function index()
    {
        $arsips = Arsip::all();
        return view('Folder', compact('arsips'));
    }
    public function create()
    {
        return view('KelolaArsip');
    }
    //data store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'NamaFile' => 'mimes:jpeg,png,jpg,gif|max:5120 ',
        ]);
        $file = $validatedData[('NamaFile')];
        $filename =  $file->getClientOriginalName();
        // File upload location
        
        $location = '../public/assets/images/';
        Arsip::create([
            'NamaDokumen' => $request->NamaDokumen,
            'Keterangan' => $request->Keterangan,
            'NamaDesa' =>$request->NamaDesa,
            'Tahun' => $request->Tahun,
            'LokasiPenyimpanan' => $request->LokasiPenyimpanan,
            'NamaFile' => $filename
        ]);
        $file->move(public_path($location), $filename);
        return view('KelolaArsip')->with('success', 'User berhasil ditambahkan!');
    }

}

