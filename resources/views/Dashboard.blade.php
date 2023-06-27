@extends('layouts.App')

@section('container')
<div class="card mt-5" style="margin-left: 15%;margin-bottom:10%;">
    <div class="card-body">
        <div class="border"><h3>Dashboard</h3></div>
          <br>
        <div class="grid-container">
            <div class="grid-item"><h4>Petugas</h4><img src="img/grafik.png" alt="statistik" width="130"><h6 style="text-align: center;">4</h6></div>
            <div class="grid-item"><h4>User</h4><img src="img/grafik.png" alt="statistik" width="130"><h6 style="text-align: center;">5</h6></div>
            <div class="grid-item"><h4>Total Arsip</h4><img src="img/grafik.png" alt="statistik" width="130"><h6 style="text-align: center;">10</h6></div>
            <div class="grid-item"><h4>Kategori Arsip</h4><img src="img/grafik.png" alt="statistik" width="130"><h6 style="text-align: center;">6</h6></div>
          </div>
    </div>
  </div>
@endsection
