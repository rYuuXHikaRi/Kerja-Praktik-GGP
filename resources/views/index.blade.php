@extends('layouts.App')

@section('container')
<div id="dashboard-wrapper">
  <div class="dsbrd" style="border-color: white;">
    <h3>Dashboard</h3>
  </div>
  <br>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Statistik</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row" style="display: flex; flex-direction:row; justify-content:space-around;">
        @if (auth()->user()->Roles ==1)
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $TotalArsips }}<sup style="font-size: 20px;"></sup></h3>

              <p>Jumlah Dokumen</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars" style="color: white!important;"></i>
            </div>
            <a href="{{ route('archive.index') }}" class="small-box-footer">Lihat Dokumen <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box" style="background-color: #A6CE39;">
            <div class="inner">
              <h3 style="color: white;">{{ $JumlahAdmin }}</h3>

              <p style="color: white;">Jumlah Administrator</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add" style="color: white!important;"></i>
            </div>
            <a href="{{ route('user.index') }}" class="small-box-footer" style="color: white!important;">Lihat Daftar Admin <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3 style="color: white!important;">{{ $JumlahUser }}</h3>

              <p style="color: white!important;" >Jumlah Staff</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add" style="color: white!important;"></i>
            </div>
            <a href="{{ route('showuser') }}" class="small-box-footer" style="color: white!important;">Lihat Daftar Staff <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
            
        @else
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $TotalArsips }}<sup style="font-size: 20px;"></sup></h3>

              <p>Jumlah Dokumen</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars" style="color: white!important;"></i>
            </div>
            <a href="{{ route('arsip.index') }}" class="small-box-footer">Lihat Dokumen <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
            
        @endif

      </div>
    </div>
    <!-- /.card-body -->
  </div>

  <!-- <div class="Statistik">
    <h4>Statistik</h4>
    <hr>
    <div class="card-body">
      <br>
      <div class="grid-container">
          <div class="grid-item"><h4>Petugas</h4><img src="img/roni.jpeg" alt="statistik" width="130"><h6 style="text-align: center;">{{ $JumlahAdmin }}</h6></div>
          <div class="grid-item"><h4>User</h4><img src="img/roni.jpeg" alt="statistik" width="130"><h6 style="text-align: center;">{{ $JumlahUser }}</h6></div>
          <div class="grid-item"><h4>Total Arsip</h4><img src="img/roni.jpeg" alt="statistik" width="130"><h6 style="text-align: center;">{{ $TotalArsips }}</h6></div>
          {{-- <div class="grid-item"><h4>Kategori Arsip</h4><img src="img/grafik.png" alt="statistik" width="130"><h6 style="text-align: center;">6</h6></div> --}}
      </div>
    </div>  
  </div> -->
</div>

@endsection