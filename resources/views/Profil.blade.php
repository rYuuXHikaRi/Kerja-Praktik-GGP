@extends('layouts.App')
@section('container')
<link rel="stylesheet" type="text/css" href="/css/style.css">
  
  <div class="card mt-3" style="margin-left: 15%;padding: 10px;border-radius: 10px">
    <div class="profile-container">
        <div class="profile-image">
          <img src="img/profil.jpeg" alt="Foto Profil" width="200px;"><br>
          <form enctype="multipart/form-data">
            <label>Ganti Foto</label><br>
              <input input type='file' name='foto' accept='image/*'>
          </form>
        </div>
        <div class="profile-form">
          <form action="proses.php" method="POST">
            <div class="control-group after-add-more">
              <label>Nama</label>
              <input type="text" name="nama[]" class="form-control">
              <label>Username</label>
              <input type="text" name="username[]" class="form-control">
              <label>Nomor HP</label>
              <input type="text" name="nohp[]" class="form-control">
              <label>Role</label>
              <input type="text" name="psswrd[]" class="form-control">
              <label>Password Lama</label>
              <input type="text" name="psswrd[]" class="form-control">
              <label>Password Baru</label>
              <input type="text" name="psswrd[]" class="form-control">
            </div>
          </form>

          <div class="submit-button">
            <button type="submit" style="margin-top: 20px;margin-left:500px;background-color: blue;">Submit</button>
          </div>
        </div>
        </div>
      </div>
      
</div>

@endsection
