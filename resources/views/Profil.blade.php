@extends('layouts.App')

@section('container')

  
  <div class="card mt-3" style="margin-left: 15%;padding: 10px;border-radius: 10px">
    <div class="profile-container">
        <div class="profile-image">
          <img src="img/profil.jpeg" alt="Foto Profil" width="200px;">
        </div>
        <div class="profile-form">
          <form action="proses.php" method="POST">
            <div class="control-group after-add-more">
              <h5>Data Diri</h5>
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
              <label>Konfirmasi Password Baru</label>
              <input type="text" name="psswrd[]" class="form-control">
              <label>Ganti Foto</label>
              <input input type='file' name='foto' accept='image/*'>
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
