@extends('layouts.App')
@section('container')
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


<div class="card" style="border-radius: 10px;">
    <div class="card-header">
        <h3 class="card-title">Detail Arsip</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <p>Nama : {{ $arsip->NamaDokumen }} </p>
        <p>Tahun : {{ $arsip->Tahun }}</p>
        <p>Desa : {{ $arsip->NamaDesa }}</p>
        <p>Lokasi Penyimpanan : {{ $arsip->LokasiPenyimpanan }}</p>
        <p>Keterangan : {{ $arsip->Keterangan }}</p>


         <div id="uploadDialog" title="Upload Document" style="display: none;">
        </div>


        <a role="button" class="delete-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1{{$arsip->id}}">
          <button class="plus-btn submit-btn-yes"><i class="bi bi-plus"></i> Tambah Dokumen</button>
        </a>

        <div class="modal fade bd-example-modal-sm1{{$arsip->id}} " id="modal1" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Tambah Dokumen</strong></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ route('add.arsip',$arsip->id) }}" method="POST"
                            enctype="multipart/form-data" style="width: 80vh;">
                      <div class="modal-body">
                        <input type='file' name='NamaFile[]' multiple>
                      </div>
                      <div class="modal-footer" style="left:0px;">
                            @csrf
                            @method('POST')
                            <div style="display: flex; flex-direction: row;justify-content: space-between; ">
                                <input type="submit" class="btn btn-primary" name="" id="" value="Simpan"
                                    style="width: 10vh;margin-top:5vh;">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                    style="width: 10vh; margin-left: 12vh;margin-top:5vh;margin-right:10vh;">Tidak</button>
                            </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @php
                  $no=1;
                  @endphp
                  @foreach ($files as $file)
                  <tr>
                      <td>{{ $no++}}</td>
                      <td>{{ $file }}</td>
                      <td>
                          <li>
                              <a href="{{ route('view.arsip', ['file' => $file, 'id' => $arsip->id]) }}" class="edit-button">
                                  <button class="lihat-btn"><i class="bi bi-eye"></i></button>
                              </a>
                              <a role="button" class="delete-button" data-bs-toggle="modal"
                                  data-bs-target=".bd-example-modal-sm{{$arsip->id}}">
                                  <button class="hapus-btn bi bi-trash"></button>
                              </a>

                              <div class="modal fade bd-example-modal-sm{{$arsip->id}}" tabindex="-1" role="dialog"
                                  aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title"><strong>Hapus Data</strong></h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal">
                                              </button>
                                          </div>
                                          <div class="modal-body">Apakah anda yakin ingin menghapus data?</div>
                                          <div class="modal-footer" style="left:0px; height: 80px;">
                                              <form action="{{ route('delete.arsip', ['file' => $file, 'id' => $arsip->id]) }}" method="POST">
                                                  @method('DELETE')
                                                  @csrf
                                                  <button type="button" class=" btn submit-btn submit-btn-yes"
                                                      data-bs-dismiss="modal" style="left:30%;width:20%;">Tidak</button>
                                                  <input type="submit" class=" btn submit-btn submit-btn-no" name="" id=""
                                                      value="Hapus" style="left:5%;width:20%;">
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </li>
                      </td>
                    @php
                    $no++
                    @endphp
                  </tr>
                  @endforeach
              </tbody>
          </table>
    </div>
    <!-- /.card-footer -->
</div>

@endsection
