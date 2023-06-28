@extends('layouts.App')

@section('container')
<link rel="stylesheet" type="text/css" href="/css/style.css">
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
      <tr>
        <td>1</td>
        <td>Data 1</td>
        <td>2023</td>
        <td>Desa A</td>
        <td>Loker A</td>
        <td>Surat Izin Pengelolaan</td>
        <td>

        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>Data 2</td>
        <td>2022</td>
        <td>Desa B</td>
        <td>Loker B</td>
        <td>Surat Sengketa</td>
        <td>

        </td>
      </tr>
      
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
     </div>
@endsection