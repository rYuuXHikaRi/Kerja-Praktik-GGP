@extends('layouts.App')

@section('container')
<link rel="stylesheet" type="text/css" href="/css/style.css">
  <div class="Kelolaarsip"> <h3 style="font: bolder;border-radius: 10px;display:flex;">Edit Arsip</h3></div>
    <form method="POST"  action="{{ route('arsip.update' ,$arsip->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
        <div class="card mt-5" style="padding: 10px;border-radius: 10px">
            <div class="panel-body">
                <div class="control-group after-add-more">
                    <h5>Edit Dokumen</h5>
                    <hr>
                    <label for="namadokumen" class="nama-dokumen">Nama Dokumen</label>
                    <input id="namadokumen"  name='NamaDokumen' type="text" value="{{ $arsip->NamaDokumen }}" placeholder="{{ $arsip->NamaDokumen }}"><br>
                    <br>
                    <label for="keterangan" class="ket">Keterangan</label>
                    <input id="keterangan" name='Keterangan' type="text" value="{{ $arsip->Keterangan }}" placeholder="{{ $arsip->Keterangan }}">
                    <br>
                    <br>
                    <label for="namadesa" class="nama-desa">Nama Desa</label>
                    <input id="namadesa" name='NamaDesa' type="text" value="{{ $arsip->NamaDesa }}" placeholder="{{ $arsip->NamaDesa }}">
                    <br>
                    <br>
                    <label for="tahun" class="thn">Tahun</label>
                    <input id="tahun" name='Tahun'  type="text" value="{{ $arsip->Tahun }}" placeholder="{{ $arsip->Tahun }}">
                    <br>
                    <br>
                    <label for="lokasipenyimpanan" class="lok">Lokasi Penyimpanan</label>
                    <input id="lokasipenyimpanan" name='LokasiPenyimpanan' type="text" value="{{ $arsip->LokasiPenyimpanan }}" placeholder="{{ $arsip->LokasiPenyimpanan }}">
                    <br>
                    <br>
                  <label>Upload File</label>
                  <input type='file' name='NamaFile' accept='image/*'>
                  <br>
                  <hr>
      <div>        <button type="submit" class="btn btn-primary">Simpan</button>
        <button href="/cancel" class="btn btn-danger" style="margin-left: 100px;">Batal</button></div>
      </form>
      
    </div>
  </div>

@endsection
