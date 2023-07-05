@extends('layouts.App')

@section('container')

  
<div class="card mt-5" style="padding: 10px;border-radius: 10px">
  <div class="panel-body">
      <div class="control-group after-add-more">
        <h5>Profile</h5>
        <hr>
          <div class="profile">
            <div class="profile-image">
              <img src="img/profil.jpeg" alt="Foto Profil" style="width: 20vh">
              <br>
              <br>
              <label for="foto-input" class="btn" style="background-color: #4CAF50;width:15vh;color: white;">Ganti Foto</label>
              <input type="file" id="foto-input" name="foto" accept="image/*" >
            </div>
            <div class="profile-form">
              <form>
    
                  <label for="name">Nama:</label>
                  <input class="mb-3"type="text" id="name" name="name">

                  <label for="username">Username:</label>
                  <input class="mb-3"type="username" id="username" name="username">

                  <label for="phone">Nomor Telepon:</label>
                  <input class="mb-3"type="text" id="phone" name="phone">

                  <label for="PasswordLama">Password Lama:</label>
                  <input class="mb-3"type="PasswordLama" id="PasswordLama" name="PasswordLama">

                  <label for="PasswordBaru">Password Baru:</label>
                  <input class="mb-3"type="PasswordBaru" id="PasswordBaru" name="PasswordBaru">
                  <br><br><br><br><br><br><br><br><br><br><br>
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
      
</div>

@endsection
