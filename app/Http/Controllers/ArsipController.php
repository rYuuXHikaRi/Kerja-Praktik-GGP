<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


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
        $arsip = Arsip::where('id', $id)->first();
        return view('admin.archive.edit', compact('arsip'));

    }

    public function update(Request $request, $id)
    {
        $arsip = Arsip::where('id', $id)->first();
        $arsip->NamaDokumen = $request->input('NamaDokumen');
        $arsip->Keterangan = $request->input('Keterangan');
        $arsip->NamaDesa = $request->input('NamaDesa');
        $arsip->Tahun = $request->input('Tahun');
        $arsip->LokasiPenyimpanan = $request->input('LokasiPenyimpanan');
        $arsip->NamaFile = $request->input('NamaFile');
        

        if ($request->hasFile('NamaFile')) {

            // Delete the previous photo if it exists
            // if ($arsip->NamaFole) {
            //     $filePath = public_path('assets/images/' .$arsip->Foto);
            //     File::delete($filePath);
            // }
            // Store the uploaded file
            $validatedData = $request->validate([
            
                'NamaFile' => 'required|mimes:jpeg,png,jpg,gif|max:5120 ',
            ]);
            $file = $validatedData[('NamaFile')];
            $filename =  $file->getClientOriginalName();
            // File upload location
            $location = '../public/assets/images/';
            $file->move(public_path($location), $filename);
            $arsip->NamaFile = $filename;
        }
        $arsip->save();

        $arsips=Arsip::all();
        return view('admin.archive.index',compact('arsips'));

    }

}

