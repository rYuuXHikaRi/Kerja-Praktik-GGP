@extends('layouts.App')
@section('container')
<link rel="stylesheet" type="text/css" href="/css/style.css">
<div class="lihat">
  <h3>Lihat Dokumen</h3>
</div>
<br>
  <div class="Lihat">
    <h4>Semua Arsip <input type="text" class="search-input" placeholder= " Search..." ></h4>
<hr>
<p>Nama               : </p>
<p>Tahun              : </p>
<p>Desa               : </p>
<p>Lokasi Penyimpanan : </p>
<p>Keterangan         : </p>
<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Surat Izin Pengelolaan Perkebunan Pisang</td>
      <td>
          <button class="unduh-btn"><i class="bi bi-cloud-download"></i></button>
          <button class="lihat-btn"><i class="bi bi-eye"></i></button>
          <button class="hapus-btn"><i class="bi bi-trash"></i></button>
      </td>
    </tr>
    <tr>
      <td>2</td>
      <td>Surat Pernyataan Status Lahan Tidak Sengketa</td>
      <td>
          <button class="unduh-btn"><i class="bi bi-cloud-download"></i></button>
          <button class="lihat-btn"><i class="bi bi-eye"></i></button>
          <button class="hapus-btn"><i class="bi bi-trash"></i></button>
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


  

@endsection