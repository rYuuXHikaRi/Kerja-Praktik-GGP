@extends('layouts.App')

@section('container')

  <div class="tambah"> <h3 style="font: bolder; padding: 10px;border-radius: 10px;margin-left:15%">Tambah Akun</h3></div>
  <div class="card mt-5" style="margin-left: 15%;padding: 10px;border-radius: 10px">
      <div class="panel-body">
        <form action="proses.php" method="POST">
          <div class="control-group after-add-more">
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
