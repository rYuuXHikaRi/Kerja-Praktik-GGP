@extends('layouts.App')

@section('container')
<div class="card" style="border-radius: 10px;">
      <div class="card-header">
        <h3 class="card-title">Riwayat Unduhan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nama User</th>
              <th>Tanggal Download</th>
              <th>Ukuran</th>
              <th>Lokasi Rak</th>
              <th>Nama File</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($histories as $history)
            <tr>
              <td>{{ $history->UserName }}</td>
              <td>{{ $history->created_at }}</td>
              <td>{{ $history->Ukuran }} MB</td>
              <td>{{ $history->LokasiPenyimpanan }}</td>
              <td>{{ $history->NamaFile }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>    
@endsection
