<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;


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

    public function show($id)
    {
        $arsip = Arsip::where('id', $id)->first();
        $folderPath = storage_path('app/private/'.$arsip->NamaDokumen."-".$arsip->LokasiPenyimpanan);

        $files = collect(Storage::disk('local')->files('private/'.$arsip->NamaDokumen."-".$arsip->LokasiPenyimpanan))->map(function ($file) {
            return basename($file);
        });

        return view('admin.archive.detail', compact('arsip','files','folderPath'));
    }

    public function view($file,$id)
    {
        $arsip=Arsip::where('id',$id)->first();
        $folderPath = storage_path('app/private');
        $filePath = $folderPath . '/'.$arsip->NamaDokumen."-".$arsip->LokasiPenyimpanan."/". $file;
    
        $mimeType = File::mimeType($filePath);
    
        $headers = [
            'Content-Type' => $mimeType ?: 'application/octet-stream',
        ];
    
        return Response::file($filePath, $headers);
    }

    public function deleteFile($filename,$id)
    {
        $arsip=Arsip::where('id',$id)->first();   
        $filePath = storage_path('app/private/'.$arsip->NamaDokumen."-".$arsip->LokasiPenyimpanan."/".$filename);
    
        // Menggunakan Storage Facade
        if (Storage::disk('local')->exists('private/' . $filename)) {
            Storage::disk('local')->delete('private/' . $filename);
        }
        // Atau menggunakan File Facade
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
    
        // Lakukan operasi lain setelah menghapus file
    
        return redirect()->back()->with('success', 'File berhasil dihapus.');
    }

   
}

