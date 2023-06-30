@extends('layouts.App')

@section('container')

  <div class="tambah"> <h3 style="font: bolder; padding: 10px;border-radius: 10px;margin-left:15%">Edit Akun</h3></div>
  <div class="card mt-5" style="margin-left: 15%;padding: 10px;border-radius: 10px">
      <div class="panel-body">

        <form action=" {{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="control-group after-add-more">
            <label>Nama</label>
            <input type="text" name="NamaLengkap" class="form-control" value="{{ $user->NamaLengkap }}" placeholder="{{ $user->NamaLengkap }}">
            <label>Username</label>
            <input type="text" name="UserName" class="form-control" value="{{ $user->UserName }}" placeholder="{{ $user->UserName }}" readonly>
            <label>Nomor HP</label>
            <input type="text" name="NomorHp" class="form-control" value="{{ $user->NomorHp }}" placeholder="{{ $user->NomorHp }}">
            <label>Role</label>
            <select class="form-control" name="Roles" aria-placeholder="{{ $user->Roles }}">
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
