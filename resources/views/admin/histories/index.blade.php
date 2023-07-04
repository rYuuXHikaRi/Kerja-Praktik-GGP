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
            <th>Nama User</th>
            <th>Tanggal Download</th>
            <th>Ukuran</th>
            <th>Lokasi Penyimpanan</th>
            <th>Nama File</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($histories as $history)
                
            
          <tr>
            <td>{{ $history->UserName }}</td>
            <td>{{ $history->created_at }} </td>
            <td>{{ $history->Ukuran }} Mb</td>
            <td>{{ $history->LokasiPenyimpanan }}</td>
            <td>{{ $history->NamaFile }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
  </div>
  
    
@endsection
