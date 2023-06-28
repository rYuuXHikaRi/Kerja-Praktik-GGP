@extends('layouts.App')

@section('container')

  <div class="tambah"> <h3 style="font: bolder; padding: 10px;border-radius: 10px;margin-left:15%">Tambah Akun</h3></div>
  <div class="card mt-5" style="margin-left: 15%;padding: 10px;border-radius: 10px">
      <div class="panel-body">

        <form action=" {{ route('StoreUser') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="control-group after-add-more">
            <label>Nama</label>
            <input type="text" name="NamaLengkap" class="form-control" >
            <label>Username</label>
            <input type="text" name="UserName" class="form-control" readonly>
            <label>Password</label>
            <input type="text" name="Password" class="form-control">
            <label>Nomor HP</label>
            <input type="text" name="NomorHp" class="form-control">
            <label>Role</label>
            <select class="form-control" name="Roles">
                <option value="1">Admin</option>
                <option value="2">User</option>
              </select> <br>
              <label>Foto</label>
            <input input type='file' name='Foto' accept='image/*'>
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
