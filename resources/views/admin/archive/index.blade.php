@extends('layouts.App')

@section('container')
    <div class="folder">
      <h3>Folder</h3>
    </div>

    <br>
    <div class="Folder">
      <h4>Folder</h4>
    
      <hr>
      <br>

        <div class="search-box">
          <input type="text" class="search-input" placeholder= " Search..." >
        </div>

        <table>
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tahun</th>
                <th>Desa</th>
                <th>Lokasi Penyimpanan</th>
                <th>Keterangan</th>
                <th>Opsi</th>
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

                          <div class="menu-item active"></div>
                          <a href="{{ route('arsip.edit',$arsip->id) }}" class="edit-button">
                            <button class="lihat-btn"><i class="bi bi-pencil"></i></button>
                          </a>
                          <a href="{{ route('arsip.show',$arsip->id) }}" class="edit-button">
                            <button class="lihat-btn"><i class="bi bi-eye"></i></button>
                          </a>
                          <a role="button"  class="delete-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm{{$arsip->id}}">
                            <button class="hapus-btn" >Hapus</button>
                          </a>
                          <div class="modal fade bd-example-modal-sm{{$arsip->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><strong>Hapus Data</strong></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                    </div>
                                    <div class="modal-body">Apakah anda yakin ingin menghapus data?</div>
                                    <div class="modal-footer" style="left:0px;">
                                        <form action="{{route('arsip.destroy', $arsip->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" name="" id="" value="Hapus" style="left:5%;width:20%;">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="left:30%;width:20%;">Tidak</button>
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

  
              <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="#">1</a>
                <a class="active" href="#">2</a>
                <a href="#">3</a>
                <a href="#">&raquo;</a>
              </div>
    </div>
@endsection