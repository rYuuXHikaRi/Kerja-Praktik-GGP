@extends('layouts.App')

@section('container')
{{-- <link rel="stylesheet" type="text/css" href="/css/style.css"> --}}
<!DOCTYPE html>
<html>
<head>
<div class="card mt-5" style="padding: 10px;border-radius: 10px">
  <div class="panel-body">
      <div class="control-group after-add-more">
        <h5>Profile</h5>
        <hr>
          <div class="profile">
            <div class="profile-image">
              <img src="{{ asset('assets/images/' . $user->Foto) }}" alt="Foto Profil" style="width: 20vh">
              <br>
              <br>
            </div>
            <div class="profile-form">
              <form action="{{ route('EditProfile',$user->id) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                  <label for="name">Nama:</label>
                  <input class="mb-3" name="NamaLengkap" class="form-control" value="{{ $user->NamaLengkap }}" placeholder="{{ $user->NamaLengkap }}" required>

                  <label for="username">Username:</label>
                  <input class="mb-3" type="text" name="UserName" class="form-control" value="{{ $user->UserName }}" placeholder="{{ $user->UserName }}" readonly>

                  <label for="phone">Nomor Telepon:</label>
                  <input class="mb-3"type="text" name="NomorHp" class="form-control" value="{{ $user->NomorHp }}" placeholder="{{ $user->NomorHp }}">

                  <label for="PasswordLama">Password Lama:</label>
                  <input class="mb-3" type="text" name="Password_lama" value="" class="form-control">

                  <label for="PasswordBaru">Password Baru:</label>
                  <input class="mb-3" type="text" name="Password" class="form-control">

                  <label for="foto-input" class="btn">Ganti Foto</label>
                  <input type="file" id="foto-input" name='Foto' accept='image/*' style="display: none;">
                  
                  <div class="button-container">
                    <button type="submit">Simpan</button>
                  </div>
              </form>
            </div>
          </div>

        <br>
        <hr>
      </div>
</div>


@endsection