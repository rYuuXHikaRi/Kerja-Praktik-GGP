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
                          <a href="{{ route('arsip.edit',$arsip->id) }}"><button class="ubah-btn"><i class="bi bi-pencil"></i></button></a>
                          <a href="/LihatDokumen"><button class="lihat-btn"><i class="bi bi-eye"></i></button></a>
                          <a href="/Delete"> <button class="hapus-btn"><i class="bi bi-trash"></i></button></a>
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