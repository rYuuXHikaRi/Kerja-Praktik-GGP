@extends('layouts.App')

@section('container')

  <div class="tambah"> <h3 >Tambah Akun</h3></div>
  <div class="card mt-2" style="padding: 10px;border-radius: 10px">
      <div class="panel-body">
        <form action="proses.php" method="POST">
          <div class="control-group after-add-more">
            <h5>Input Data Akun</h5>
            <label>Nama</label>
            <input type="text" name="nama[]" class="form-control">
            <label>Username</label>
            <input type="text" name="username[]" class="form-control">
            <label>Password</label>
            <input type="text" name="psswrd[]" class="form-control">
            <label>Nomor HP</label>
            <input type="text" name="nohp[]" class="form-control">
            <label>Role</label>
            <select class="form-control" name="role[]">
                <option>Admin</option>
                <option>User</option>
              </select> <br>
              <label>Foto</label>
            <input input type='file' name='foto' accept='image/*'>
            <br>
            <hr>
          </div>
          <button class="btn btn-success" type="submit">Submit</button>
        </form>
          </div>
    </div>
  </div>
</div>

@endsection
