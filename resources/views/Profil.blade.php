@extends('layouts.App')
@section('container')
{{-- <link rel="stylesheet" type="text/css" href="/css/style.css"> --}}

<div class="card" style="border-radius: 10px;">
      <div class="card-header">
        <h3 class="card-title">Profil</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body" style="height: 350px;">
        <div class="profile">
          @if (auth()->user()->Roles==1)
          <form action="{{ route('adminEditProfile',$user->id) }}"  method="POST" enctype="multipart/form-data">
              
          @elseif (auth()->user()->Roles==2)
          <form action="{{ route('EditProfile',$user->id) }}"  method="POST" enctype="multipart/form-data">
          @endif
            @csrf
            @method('PUT')
            
            @error('Password_lama')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div style="display: flex;">
              <div class="profile-image" style="display: flex; flex-direction: column;">
                <img src="{{ asset('assets/images/' . $user->Foto) }}" alt="Foto Profil" style="width: 15vh">
                <div class="mt-2">
                  <label for="foto-input" class="btn submit-btn-yes" style="width:15vh;">Ganti Foto</label>
                  <input type="file" id="foto-input" name="Foto" accept="image/*">
                </div>
              </div>
              <div style="margin-left: 20px;">
                <label for="name">Nama:</label>
                <input class="mb-3" type="text" name="NamaLengkap" class="form-control" value="{{ $user->NamaLengkap }}" placeholder="{{ $user->NamaLengkap }}" required>
          
                <label for="username">Username:</label>
                <input class="mb-3" type="username" type="text" name="UserName" class="form-control" value="{{ $user->UserName }}" placeholder="{{ $user->UserName }}" readonly>
          
                <label for="phone">Nomor Telepon:</label>
                <input class="mb-3" type="text" name="NomorHp" class="form-control" value="{{ $user->NomorHp }}" placeholder="{{ $user->NomorHp }}">
          
                <label for="PasswordLama">Password Lama:</label>
                <input class="mb-3" type="password" name="Password_lama" value="{{ old('Password_lama') }}">

          
                <label for="PasswordBaru">Password Baru:</label>
                <input class="mb-3" type="password" name="Password" value="{{ old('Password') }}">
              </div>
            </div>
            
            <div style="display: flex; justify-content:flex-end;">
              <button type="submit" class="btn submit-btn-yes save-btn">Simpan</button>
            </div>
          </form>
          
          
        </div>
      </div>
      <!-- /.card-body -->
</div>


@endsection
