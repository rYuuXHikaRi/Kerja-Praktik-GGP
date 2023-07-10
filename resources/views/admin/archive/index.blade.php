@extends('layouts.App')

@section('container')
    <div class="folder">
      <h3>Folder</h3>
    </div>

    <div class="card" style="border-radius: 10px;">
      <div class="card-header">
        <h3 class="card-title">Folder</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Tahun</th>
              <th>Desa</th>
              <th>Lokasi Rak</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($arsips as $arsip)
            <tr>
              <td>{{ $no++}}</td>
              <td>{{ $arsip->NamaDokumen }}</td>
              <td>{{ $arsip->Tahun }}</td>
              <td>{{ $arsip->NamaDesa }}</td>
              <td>{{ $arsip->LokasiPenyimpanan }}</td>
              <td>{{ $arsip->Keterangan }}</td>
              <td>
                <li>
                  @if (auth()->user()->Roles ==1 )
                  <a href="{{ route('archive.edit',$arsip->id) }}" class="edit-button">
                    <button class="lihat-btn" ><i class="bi bi-pencil"></i></button>
                  </a>

                  <a href="{{ route('archive.show',$arsip->id) }}" class="edit-button">
                    <button class="lihat-btn"><i class="bi bi-eye"></i></button>
                  </a>

                  @elseif (auth()->user()->Roles ==2 )
                  <a href="{{ route('arsip.edit',$arsip->id) }}" class="edit-button">
                    <button class="lihat-btn" ><i class="bi bi-pencil"></i></button>
                  </a>

                  <a href="{{ route('arsip.show',$arsip->id) }}" class="edit-button">
                    <button class="lihat-btn"><i class="bi bi-eye"></i></button>
                  </a>
                  @endif





                  <a role="button"  class="delete-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm{{$arsip->id}}">
                    <button class="hapus-btn bi bi-trash" ></button>
                  </a>
                  
                  <div class="modal fade bd-example-modal-sm{{$arsip->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><strong>Hapus Data</strong></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">Apakah anda yakin ingin menghapus data?</div>
                            <div class="modal-footer" style="left:0px; height: 80px;">
                              @if (auth()->user()->Roles ==1 )
                              <form action="{{route('archive.destroy', $arsip->id)}}" method="POST"> 
                              @elseif (auth()->user()->Roles ==2 )
                              <form action="{{route('arsip.destroy', $arsip->id)}}" method="POST">
                              @endif
                              
                                @method('DELETE')
                                @csrf
                                <div style="display: flex; justify-content: space-between;">
                                  <button type="button" class="btn submit-btn submit-btn-yes" data-bs-dismiss="modal" style="width: 49%;">Tidak</button>
                                  <input type="submit" class="btn submit-btn submit-btn-no" name="" id="" value="Hapus" style="width: 49%;">
                              </div>
                              
                              </form>
                            </div>
                        </div>
                    </div>
                  </div>
                </li>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>

@endsection