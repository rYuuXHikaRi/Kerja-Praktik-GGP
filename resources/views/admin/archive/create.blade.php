@extends('layouts.App')

@section('container')
<div class="Kelolaarsip">
  <h3 style="font: bolder;border-radius: 10px;display:flex;">Kelola Arsip</h3>
</div>

  <form method="POST"  action="{{ route('arsip.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card mt-5" style="padding: 10px;border-radius: 10px">
      <div class="panel-body">
          <div class="control-group after-add-more">
              <h5>Tambah Dokumen</h5>
              <hr>
              <label for="namadokumen" class="nama-dokumen">Nama Dokumen</label>
              <input id="namadokumen"  name='NamaDokumen' type="text"><br>
              <br>
              <label for="keterangan" class="ket">Keterangan</label>
              <input id="keterangan" name='Keterangan' type="text">
              <br>
              <br>
              <label for="namadesa" class="nama-desa">Nama Desa</label>
              <input id="namadesa" name='NamaDesa' type="text">
              <br>
              <br>
              <label for="tahun" class="thn">Tahun</label>
              <input id="tahun" name='Tahun'  type="text">
              <br>
              <br>
              <label for="lokasipenyimpanan" class="lok">Lokasi Penyimpanan</label>
              <input id="lokasipenyimpanan" name='LokasiPenyimpanan' type="text">
              <br>
              <br>
              <label>Upload File</label>
              <input type='file' name='NamaFile' accept='image/*'>
              <br>
              <hr>
          </div>
        <div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button href="/cancel" class="btn btn-danger" style="margin-left: 100px;">Batal</button>
        </div>
      </div>
    </div>
  </form>
    
  </div>
</div>
@endsection
