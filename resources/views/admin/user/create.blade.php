@extends('layouts.App')

@section('container')

@error('UserName')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror
@if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif

<div class="card" style="border-radius: 10px;"> 
  <div class="card-header">
    <h3 class="card-title">Tambah Akun</h3>
  </div>

  <form action=" {{ route('user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <label>Nama</label>
      <input type="text" name="NamaLengkap" class="form-control" required>
      <label>Username</label>
      <input type="text" name="UserName" class="form-control" value="{{ old('UserName') }}" required>
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
      <label>Nomor HP</label>
      <input type="number" name="NomorHp" class="form-control" required>
      <label>Role</label>
      <select class="form-control" name="Roles" required>
          <option value="1">Admin</option>
          <option value="2">User</option>
      </select> <br>
      <label>Foto</label>
      <input input type='file' name='Foto' accept='image/*' required>
    </div>
    <div class="card-footer">
      <button class="btn submit-btn submit-btn-yes" type="submit">Submit</button>
    </div>
  </form>
</div>

@endsection
