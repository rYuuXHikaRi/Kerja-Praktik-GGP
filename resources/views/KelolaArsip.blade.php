@extends('layouts.App')

@section('container')

  <div class="Kelolaarsip"> <h3 style="font: bolder;border-radius: 10px;margin-left:15%;display:flex;">Kelola Arsip</h3></div>
    <form action="/action" method="POST">
        <div class="card mt-5" style="margin-left: 15%;padding: 10px;border-radius: 10px">
            <div class="panel-body">
              <form action="proses.php" method="POST">
                <div class="control-group after-add-more">
                    <h3>Tambah Dokumen</h3>
                    <hr>
                    <label for="namadokumen" class="nama-dokumen">Nama Dokumen</label>
                    <input id="namadokumen" type="text"><br>
                    <br>
                    <label for="keterangan" class="ket">Keterangan</label>
                    <input id="keterangan" type="text">
                    <br>
                    <br>
                    <label for="namadesa" class="nama-desa">Nama Desa</label>
                    <input id="namadesa" type="text">
                    <br>
                    <br>
                    <label for="tahun" class="thn">Tahun</label>
                    <input id="tahun" type="text">
                    <br>
                    <br>
                    <label for="lokasipenyimpanan" class="lok">Lokasi Penyimpanan</label>
                    <input id="lokasipenyimpanan" type="text">
                    <br>
                    <br>
                  <label>Upload File</label>
                  <input input type='file' name='foto' accept='image/*'>
                  <br>
                  <hr>
      <div>        <button type="submit" class="btn btn-primary">Simpan</button>
        <button href="/cancel" class="btn btn-danger" style="margin-left: 100px;">Batal</button></div>
      </form>
      
    </div>
  </div>
<style>
    label {
    float: left;
    width: 200px;
    padding-right: 24px;
}
input {
    float: left;
    width: calc(100% - 200px);
}
</style>
@endsection
