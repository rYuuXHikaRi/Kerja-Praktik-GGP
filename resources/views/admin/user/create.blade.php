@extends('layouts.App')

@section('container')

  <div class="tambah"> <h3>Tambah Akun</h3></div>
  <div class="card mt-5" style="padding: 10px;border-radius: 10px">
      <div class="panel-body">


        <form action=" {{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @error('UserName')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
          <div class="control-group after-add-more">
            <label>Nama</label>
            <input type="text" name="NamaLengkap" class="form-control" required>
            <label>Username</label>
            <input type="text" name="UserName" class="form-control" value="{{ old('UserName') }}" required>
            <label>Password</label>
            <input type="password" name="Password" class="form-control" required>
            <label>Nomor HP</label>
            <input type="number" name="NomorHp" class="form-control" required>
            <label>Role</label>
            <select class="form-control" name="Roles" required>
                <option value="1">Admin</option>
                <option value="2">User</option>
              </select> <br>
              <label>Foto</label>
            <input input type='file' name='Foto' accept='image/*' required>
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
