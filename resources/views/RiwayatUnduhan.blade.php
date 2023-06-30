@extends('layouts.App')

@section('container')
<link rel="stylesheet" type="text/css" href="/css/style.css">
<div class="datapetugas">
  <h3>Riwayat Unduhan</h3>
</div>
<br>
  <div class="data">
    <table border="2" cellpadding="10">
        <thead>
          <tr>
            <th>Nama Dokumen</th>
            <th>Tanggal Download</th>
            <th>Ukuran</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Contoh Dokumen 1</td>
            <td>2023-06-28</td>
            <td>2.5 MB</td>
            <td>Selesai</td>
          </tr>
          <tr>
            <td>Contoh Dokumen 2</td>
            <td>2023-06-29</td>
            <td>1.8 MB</td>
            <td>Gagal</td>

          </tr>
          <tr>
            <td>Contoh Dokumen 3</td>
            <td>2023-06-29</td>
            <td>30 MB</td>
            <td>Selesai</td>
          </tr>
        </tbody>
      </table>
      
  </div>
  
    
@endsection
