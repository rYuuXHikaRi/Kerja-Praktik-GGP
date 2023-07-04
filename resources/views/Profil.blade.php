@extends('layouts.App')

@section('container')

  
  <div class="card mt-3" style="margin-left: 15%;padding: 10px;border-radius: 10px">
    <div class="profile-container">
        <div class="profile-image">
          <img src="{{ asset('assets/images/' . $user->Foto) }}" alt="Foto Profil" width="200px;">
        </div>
        <div class="profile-form">
          <form action="{{ route('EditProfile',$user->id) }}"  method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="control-group after-add-more">
              <h5>Data Diri</h5>
              <label>Nama Lengkap</label>
              <input type="text" name="NamaLengkap" class="form-control" value="{{ $user->NamaLengkap }}" placeholder="{{ $user->NamaLengkap }}" readonly>
              <label>Username</label>
              <input type="text" name="UserName" class="form-control" value="{{ $user->UserName }}" placeholder="{{ $user->UserName }}" required>
              <label>Nomor HP</label>
              <input type="text" name="NomorHp" class="form-control" value="{{ $user->NomorHp }}" placeholder="{{ $user->NomorHp }}">
              <label>Password Lama</label>
              <input type="text" name="Password_lama" value="" class="form-control">
              <label>Konfirmasi Password Baru</label>
              <input type="text" name="Password" class="form-control">
              <label>Ganti Foto</label>
              <input input type='file' name='Foto' accept='image/*'>
            </div>
            <div class="form-actions">
                <br>
                <button class="update-btn">Update</button>
              </div>
          </form>
          
        </div>
      </div>
      
</div>

@endsection
