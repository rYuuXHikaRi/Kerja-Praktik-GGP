@extends('layouts.App')

@section('container')
<div id="dashboard-wrapper">
  <div class="dsbrd">
    <h3>Dashboard</h3>
  </div>
  <br>
  <div class="Statistik">
    <h4>Statistik</h4>
    <hr>
    <div class="card-body">
      <br>
      <div class="grid-container">
          <div class="grid-item"><h4>Petugas</h4><img src="img/grafik.png" alt="statistik" width="130"><h6 style="text-align: center;">{{ $JumlahAdmin }}</h6></div>
          <div class="grid-item"><h4>User</h4><img src="img/grafik.png" alt="statistik" width="130"><h6 style="text-align: center;">{{ $JumlahUser }}</h6></div>
          <div class="grid-item"><h4>Total Arsip</h4><img src="img/grafik.png" alt="statistik" width="130"><h6 style="text-align: center;">{{ $TotalArsips }}</h6></div>
          {{-- <div class="grid-item"><h4>Kategori Arsip</h4><img src="img/grafik.png" alt="statistik" width="130"><h6 style="text-align: center;">6</h6></div> --}}
      </div>
    </div>  
  </div>
</div>

@endsection