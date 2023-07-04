@extends('layouts.App')
@section('container')
<link rel="stylesheet" type="text/css" href="/css/style.css">
<div class="lihat">
  <h3>Lihat Dokumen</h3>
</div>
<br>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@elseif (session('successdelete'))
<div class="alert alert-success">
  {{ session('successdelete') }}
</div>
@endif
  <div class="Lihat">
    <h4>Semua Arsip <input type="text" class="search-input" placeholder= " Search..." > </h4>
    
<hr>
<p>Nama               : {{ $arsip->NamaDokumen }} </p>
<p>Tahun              : {{ $arsip->Tahun }}</p>
<p>Desa               : {{ $arsip->NamaDesa }}</p>
<p>Lokasi Penyimpanan : {{ $arsip->LokasiPenyimpanan }}</p>
<p>Keterangan         : {{ $arsip->Keterangan }}</p>


<div id="uploadDialog" title="Upload Document" style="display: none;">

</div>


<a role="button"  class="delete-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1{{$arsip->id}}">
  <button class="plus-btn" ><i class="bi bi-plus"></i> Tambah Dokumen</button>
</a>

<div class="modal fade bd-example-modal-sm1{{$arsip->id}} " id="modal1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Tambah Data</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">Tambah Dokumen</div>
      <div class="modal-footer" style="left:0px;">
        <form form action="{{ route('add.arsip',$arsip->id) }}" method="POST" enctype="multipart/form-data" style="width: 80vh;">
          @csrf
          @method('POST')
          <input type='file' name='NamaFile[]' multiple>
          <div style="display: flex; flex-direction: row;justify-content: space-between; ">
              <input type="submit" class="btn btn-primary" name="" id="" value="Simpan" style="width: 10vh;margin-top:5vh;">
              <button type="button"class="btn btn-danger"  data-bs-dismiss="modal" style="width: 10vh; margin-left: 12vh;margin-top:5vh;margin-right:10vh;">Tidak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<table>
  <thead>
    <tr>
      <th style="width:5vh ">No</th>
      <th>Nama</th>
      <th style="width: 20vh">Opsi</th>
    </tr>
  </thead>
  <tbody>
    @php
        $no=1;
    @endphp
    @foreach ($files as $file)
    <tr>
        <td>{{ $no }}</td>
        
         <td>
            <p>{{ $file }}</p>
         </td> 
         <td>
            <a href="{{ route('view.arsip', ['file' => $file, 'id' => $arsip->id]) }}"><button class="unduh-btn"><i class="bi bi-eye"></i></button></a>

            <a role="button"  class="delete-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm2{{$arsip->id}}"><button class="hapus-btn"><i class="bi bi-trash"></i></button></a>

            <div class="modal fade bd-example-modal-sm2{{$arsip->id}}" id="modal2" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><strong>Hapus Data</strong></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">Apakah anda yakin ingin menghapus data?</div>
                        <div class="modal-footer" style="left:0px;">
                            <form action="{{ route('delete.arsip', ['file' => $file, 'id' => $arsip->id]) }}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-danger" name="" id="" value="Hapus" style="left:5%;width:20%;">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="left:30%;width:20%;">Tidak</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>

        </td>
        <p></p>

        @php
            $no++
        @endphp
        
    </tr>
 
    @endforeach
    
  </tbody>
  </table>

<div class="pagination">
  <a href="#">&laquo;</a>
  <a href="#">1</a>
  <a class="active" href="#">2</a>
  <a href="#">3</a>
  <a href="#">&raquo;</a>
</div>
</div>




  

@endsection