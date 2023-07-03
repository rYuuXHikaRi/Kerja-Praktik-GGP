@extends('layouts.App')

@section('container')

<div class="Kelolaarsip">
  <h3 style="font: bolder;border-radius: 10px;display:flex;">Kelola Arsip</h3>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  
  <link rel="stylesheet" href="/css/pup-ap.css" id="bootstrap-css">
</div>
  <form method="POST"  action="{{ route('arsip.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card mt-5" style="padding: 10px;border-radius: 10px; height: 425px;">
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
              <div>
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#ignismyModal">Simpan</button>
                <button href="/Dashboard" class="btn btn-danger" style="margin-left: 100px;">Batal</button>
                    
                    <!-- Model Popup starts -->
                    <div  class="content-primary" data-toggle="modal" data-target="#ignismyModal">
                      <div class="row">
                        <div class="modal" id="ignismyModal" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="thank-you-pop">
                                  <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                                  <h1>Succes!</h1>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Model Popup ends -->
              </div>
          </div>
      </div>
    </div>
  </form> 
  <script src="js/pup-ap.js"></script>
@endsection
