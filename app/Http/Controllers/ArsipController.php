<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Arsip;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
        Log::info('Received POST data:', $request->all());
        $folderName = $request->NamaDokumen."-".$request->LokasiPenyimpanan;
        Storage::makeDirectory('private/' . $folderName);
        


        // Menyimpan multiple file dalam folder tersebut

        if ($request->has('NamaFile')){
            $files = $request->file('NamaFile');
            
            foreach ($files as $file) {

                
                $fileName = $file->getClientOriginalName();
                Storage::putFileAs('private/' . $folderName, $file, $fileName);
                $folderdirectory='private/'.$folderName;
     
            }
        }
        else{
            $folderdirectory=NULL;
        }

        $validatedData = $request->validate([
            'NamaDokumen' => [
                'required',
                Rule::unique('arsips')->where(function ($query) use ($request) {
                    return $query->where('NamaDokumen', $request->NamaDokumen);
                }),
            ],
        ]);
  
        Arsip::create([
            'NamaDokumen' => $request->NamaDokumen,
            'Keterangan' => $request->Keterangan,
            'NamaDesa' =>$request->NamaDesa,
            'Tahun' => $request->Tahun,
            'LokasiPenyimpanan' => $request->LokasiPenyimpanan,
            'NamaFile'=>$folderdirectory

         
        ]);
        // $file->move(public_path($location), $filename);
        // redirect()->back()->with("Berhasil cuy");
        Session::flash('success', 'Data Arsip Berhasil Ditambahkan');
        return view('admin.archive.create');
    }


    public function edit($id){
        $arsip = Arsip::where('id', $id)->first();
        return view('admin.archive.edit', compact('arsip'));

    }

    public function update(Request $request, $id)
    {
        $arsip=Arsip::where('id',$request->input('id'))->first();
        $sourceFilePath = 'private/'.$arsip->NamaDokumen."-".$arsip->LokasiPenyimpanan;
        $destinationFolderPath ='private/'.$request->input('NamaDokumen')."-".$request->input('LokasiPenyimpanan');
  

        // Check if the source file exists before moving


        $arsip = Arsip::where('id', $id)->first();
        $arsip->NamaDokumen = $request->input('NamaDokumen');
        $arsip->Keterangan = $request->input('Keterangan');
        $arsip->NamaDesa = $request->input('NamaDesa');
        $arsip->Tahun = $request->input('Tahun');
        $arsip->LokasiPenyimpanan = $request->input('LokasiPenyimpanan');
        $arsip->NamaFile = $request->$destinationFolderPath;
        
        Storage::makeDirectory('private/' . $request->input('NamaDokumen')."-".$request->input('LokasiPenyimpanan'));

  
        if (Storage::exists($sourceFilePath)) {

            $filePaths = Storage::files($sourceFilePath);

            // Move each file to the destination folder
            foreach ($filePaths as $filePath) {
                $fileName = pathinfo($filePath, PATHINFO_BASENAME);
                Storage::move($filePath, $destinationFolderPath . '/' . $fileName);
                Storage::deleteDirectory($sourceFilePath);
            }
        } else {
            // The source file does not exist
        }
        $arsip->save();
        Session::flash('success', 'Data Arsip Berhasil DiUbah');
        $arsips=Arsip::all();
        return view('admin.archive.index',compact('arsips'));

    }


    public function destroy($id)
    {
        $data = Arsip::where('id', $id)->first();
        $data->delete();
        Session::flash('success', 'Data Arsip Berhasil Dihapus');

        $arsips=Arsip::all();
        return view('admin.archive.index',compact('arsips'));
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

    public function view($file,$id,Request $request)
    {
        $arsip=Arsip::where('id',$id)->first();
        $folderPath = storage_path('app/private');
        $filePath = $folderPath . '/'.$arsip->NamaDokumen."-".$arsip->LokasiPenyimpanan."/". $file;

        $user=User::where('id',1)->first();
    
        $mimeType = File::mimeType($filePath);
        $size=round((filesize($filePath)/1000000),2);
        $filename=basename($filePath);

    
        $headers = [
            'Content-Type' => $mimeType ?: 'application/octet-stream',
        ];

        History::create([
            'UserName' => $user->UserName,
            'Ukuran' => $size,
            'LokasiPenyimpanan'=>$arsip->NamaDokumen."-".$arsip->LokasiPenyimpanan,
            'NamaFile'=>$filename
        ]);
    
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
        Session::flash('success', 'File Berhasil Dihapus');
        return redirect()->back()->with('success', 'File berhasil dihapus.');
    }  

    public function addFile(request $request,$id){


        $arsip=Arsip::where('id',$id)->first();
        $folderPath = storage_path('app/private/'.$arsip->NamaDokumen."-".$arsip->LokasiPenyimpanan);
        $folderName = $arsip->NamaDokumen."-".$arsip->LokasiPenyimpanan;



        if ($request->has('NamaFile')){
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
                $arsip->NamaFile ='private/'.$folderName;
                $arsip->save();
            }
            
            $files = $request->file('NamaFile');
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                Storage::putFileAs('private/' . $folderName, $file, $fileName);
            }
        }
        Session::flash('successdelete', 'File Berhasil Ditambahkan');
        return redirect()->back();
        
    }

    
}

