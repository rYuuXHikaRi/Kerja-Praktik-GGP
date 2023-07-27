<?php

namespace App\Http\Controllers\Api;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        Log::info('Received POST data:', $request->all());

        $data = $request->only(['NamaDokumen', 'Keterangan', 'Tahun', 'NamaDesa', 'LokasiPenyimpanan','NamaFile']);
        $createdData = Arsip::create($data);

        $folderName = $request->NamaDokumen."-".$request->LokasiPenyimpanan;
        Storage::makeDirectory('private/' . $folderName);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // // Simpan file ke penyimpanan "private"
            // $path = $file->store('', 'private/' . $folderName); // Simpan di folder private dengan nama file yang di-generate otomatis

            // // Lakukan operasi lain yang diperlukan, misalnya menyimpan data ke database

            $fileName = $file->getClientOriginalName();
            Storage::putFileAs('private/' . $folderName, $file, $fileName);
            $folderdirectory='private/'.$folderName;

            return response()->json(['message' => $file . 'Upload berhasil']);
        }

        // $uploadedFile = $request->file('file');
        // $fileName = $uploadedFile->getClientOriginalName();

        // $destinationPath = storage_path('app/private/'.$folderName); // You can change 'private' to your desired folder name

        // // Move the file to the destination folder
        // $uploadedFile->move($destinationPath, $fileName);




        // if ($request->hasFile('file')) {
        //     // foreach ($request->file('file') as $index) {
        //     //     // Simpan file ke folder private dengan nama folder $folderName
        //     //     $filename = $index->getClientOriginalName();
        //     //     echo($filename);
                
        //     //     $index->storeAs("private/$folderName", $filename);
        //     //     // Lakukan sesuatu dengan data file, seperti menyimpan informasi file ke database
        //     // }
        //     $files = $request->file('NamaFile');
        //     foreach ($files as $file) {
        //         $fileName = $file->getClientOriginalName();
        //         Storage::putFileAs('private/' . $folderName, $file, $fileName);
        //         $folderdirectory='private/'.$folderName;
     
        //     }
        // }

        

        // Validasi request jika diperlukan
        // Arsip::create([
        //     'NamaDokumen' => $request->NamaDokumen,
        //     'Keterangan' => $request->Keterangan,
        //     'NamaDesa' =>$request->NamaDesa,
        //     'Tahun' => $request->Tahun,
        //     'LokasiPenyimpanan' => $request->LokasiPenyimpanan,
        //     'NamaFile'=>$request->NamaFile

         
        // ]);

        // Kirim respons
        //return response()->json(['message' => 'Data created successfully', 'data' => $createdData]);
        

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
    public function update(Request $request, $id)
    {
        try {
            // Cari data arsip berdasarkan ID
            $arsip = Arsip::findOrFail($id);

            $sourceFilePath = 'private/'.$arsip->NamaDokumen."-".$arsip->LokasiPenyimpanan;
            $destinationFolderPath ='private/'.$request->input('NamaDokumen')."-".$request->input('LokasiPenyimpanan');

            if($sourceFilePath != $destinationFolderPath){
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
            }

            // Update data arsip berdasarkan nilai yang diterima dari form
            $arsip->NamaDokumen = $request->input('NamaDokumen');
            $arsip->Keterangan = $request->input('Keterangan');
            $arsip->Tahun = $request->input('Tahun');
            $arsip->NamaDesa = $request->input('NamaDesa');
            $arsip->LokasiPenyimpanan = $request->input('LokasiPenyimpanan');
            $arsip->NamaFile = $request->input('NamaFile');
            $arsip->save();

            // Respon jika update berhasil
            return response()->json(['message' => 'Arsip berhasil diupdate', 'data' => $arsip], 200);
        } catch (\Exception $e) {
            // Respon jika terjadi error saat update
            return response()->json(['message' => 'Terjadi kesalahan saat mengupdate arsip', 'error' => $e->getMessage()], 500);
        }

  
        // Check if the source file exists before moving
        // $arsip->NamaDokumen = $request->input('NamaDokumen');
        // $arsip->Keterangan = $request->input('Keterangan');
        // $arsip->Tahun = $request->input('Tahun');
        // $arsip->NamaDesa = $request->input('NamaDesa');
        // $arsip->LokasiPenyimpanan = $request->input('LokasiPenyimpanan');
        // $arsip->NamaFile = $request->input('NamaFile');
        // $arsip->save();
        // // Storage::makeDirectory('private/' . $request->input('NamaDokumen')."-".$request->input('LokasiPenyimpanan'));

        // Log::info($request->all());
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
  
        // return response()->json(['message' => $arsip . 'Upload berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arsip $arsip)
    {
        //
    }


    public function getFiles($id)
    {

        $arsip=Arsip::where('id',$id)->first();
        // Set the known directory where files are stored (e.g., 'public/')
        $directory = 'private/'.$arsip->NamaDokumen.'-'.$arsip->LokasiPenyimpanan;

        // Get all files from the storage directory
        $files = Storage::files($directory);
        $id=$arsip->id;

        // Map the files to an array of objects containing filename and URL
        $fileList = array_map(function ($file) use ($directory) {
            
            return [
                'filename' => basename($file),
                'url' => asset('storage/' . $file), // Assuming you are using the 'public' disk in Laravel
            ];
        }, $files);

        // Return the list of files as JSON
        return response()->json($fileList);
    }

    public function downloadFile($filename,$id)
    {
        $arsip=Arsip::where('id',$id)->first();
        // Set the known directory where files are stored (e.g., 'public/')
        $directory = 'private/'.$arsip->NamaDokumen.'-'.$arsip->LokasiPenyimpanan.'/';
        // Set the known directory where files are stored (e.g., 'public/')

        // Full path to the file
        $file = $directory . $filename;

        // Check if the file exists in the storage
        if (Storage::exists($file)) {
            // Get the file's mime type
            $mime = Storage::mimeType($file);

            // Read the file content
            $fileContent = Storage::get($file);

            // Return the file data in the API response
            return response()->make($fileContent, 200, [
                'Content-Type' => $mime,
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ]);
        } else {
            // File not found, return an error response
            return response()->json(['message' => 'File not found'], 404);
        }
    }
}
