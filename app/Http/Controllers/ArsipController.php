<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


class ArsipController extends Controller
{   

    public function index()
    {
        $arsips = Arsip::all();
        return view('admin.archive.index', compact('arsips'));
    }
    public function create()
    {
        return view('admin.archive.create');
    }
    //data store
    public function store(Request $request)
    {
        // Membuat folder baru
        $folderName = $request->NamaDokumen."-".$request->LokasiPenyimpanan;
        Storage::makeDirectory('private/' . $folderName);

        // Menyimpan multiple file dalam folder tersebut
        $files = $request->file('NamaFile');
        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();
            Storage::putFileAs('private/' . $folderName, $file, $fileName);
        }
        $folderdirectory='private/'.$folderName;
        Arsip::create([
            'NamaDokumen' => $request->NamaDokumen,
            'Keterangan' => $request->Keterangan,
            'NamaDesa' =>$request->NamaDesa,
            'Tahun' => $request->Tahun,
            'LokasiPenyimpanan' => $request->LokasiPenyimpanan,
            'NamaFile'=> $folderdirectory
         
        ]);
        // $file->move(public_path($location), $filename);
        redirect()->back()->with("Berhasil cuy");
    }


    public function edit($id){
        $archive = Arsip::where('id', $id)->first();
        return view('admin.archive.edit', compact('archive'));

    }


}

