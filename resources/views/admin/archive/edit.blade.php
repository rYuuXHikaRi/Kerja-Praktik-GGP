@extends('layouts.App')

@section('container')
<div class="Kelolaarsip">
    <h3 style="font: bolder;border-radius: 10px;display:flex;">Edit Arsip</h3>
</div>
@if (auth()->user()->Roles ==1 )
<form method="POST" action="{{ route('archive.update' ,$arsip->id) }}" enctype="multipart/form-data">
@elseif (auth()->user()->Roles ==2 )
<form method="POST" action="{{ route('arsip.update' ,$arsip->id) }}" enctype="multipart/form-data">
@endif

    @csrf
    @method('PUT')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="card mt-5" style="padding: 10px;border-radius: 10px; height: 400px;">
      <div class="panel-body">
        <div class="control-group after-add-more">
          <h5>Edit Dokumen</h5>
          <hr>
          <input id="id" name="id" value="{{ $arsip->id }}" hidden>
          <label for="namadokumen" class="nama-dokumen">Nama Dokumen</label>
          <input id="namadokumen" name='NamaDokumen' type="text" value="{{ $arsip->NamaDokumen }}"
              placeholder="{{ $arsip->NamaDokumen }}"><br>
          <br>
          <label for="keterangan" class="ket">Keterangan</label>
          <input id="keterangan" name='Keterangan' type="text" value="{{ $arsip->Keterangan }}"
              placeholder="{{ $arsip->Keterangan }}">
          <br>
          <br>
          <label for="namadesa" class="nama-desa">Nama Desa</label>
          <input id="namadesa" name='NamaDesa' type="text" value="{{ $arsip->NamaDesa }}"
              placeholder="{{ $arsip->NamaDesa }}">
          <br>
          <br>
          <label for="tahun" class="thn">Tahun</label>
          <input id="tahun" name='Tahun' type="text" value="{{ $arsip->Tahun }}"
              placeholder="{{ $arsip->Tahun }}">
          <br>
          <br>
          <label for="lokasipenyimpanan" class="lok">Lokasi Penyimpanan</label>
          <input id="lokasipenyimpanan" name='LokasiPenyimpanan' type="text"
              value="{{ $arsip->LokasiPenyimpanan }}" placeholder="{{ $arsip->LokasiPenyimpanan }}">
          <br>
          <br>
          <hr>
          <div>
            <button type="submit" class="btn submit-btn submit-btn-yes">Simpan</button>
            <button href="/cancel" class="btn submit-btn submit-btn-no" style="margin-left:5%;">Batal</button>
          </div>
        </div>
      </div>
    </div>
</form>

@endsection
