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
          <form>
            <div style="display: flex;">
              <div class="profile-image" style="display: flex; flex-direction: column;">
                <img src="img/profil.jpeg" alt="Foto Profil" style="width: 15vh">
                <div class="mt-2">
                  <label for="foto-input" class="btn submit-btn-yes" style="width:15vh;">Ganti Foto</label>
                  <input type="file" id="foto-input" name="foto" accept="image/*">
                </div>
              </div>
              <div style="margin-left: 20px;">
                <label for="name">Nama:</label>
                <input class="mb-3" type="text" id="name" name="name">
          
                <label for="username">Username:</label>
                <input class="mb-3" type="username" id="username" name="username">
          
                <label for="phone">Nomor Telepon:</label>
                <input class="mb-3" type="text" id="phone" name="phone">
          
                <label for="PasswordLama">Password Lama:</label>
                <input class="mb-3" type="PasswordLama" id="PasswordLama" name="PasswordLama">
          
                <label for="PasswordBaru">Password Baru:</label>
                <input class="mb-3" type="PasswordBaru" id="PasswordBaru" name="PasswordBaru">
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