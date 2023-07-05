@extends('layouts.App')

@section('container')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@elseif (session('successdelete'))
<div class="alert alert-success">
    {{ session('successdelete') }}
</div>
@endif

<div class="card" style="border-radius: 10px;">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Nama Lengkap</th>
                  <th>Nomor HP</th>
                  <th>Role</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->UserName }}</td>
                <td>{{ $user->NamaLengkap }}</td>
                <td>{{ $user->NomorHp }}</td>
                <td>{{ $user->Roles }}</td>
                  <td>
                      <li>
                          <a href="{{ route('user.edit',$user->id) }}" class="edit-button">
                              <button class="lihat-btn"><i class="bi bi-pencil"></i></button>
                          </a>
                          <a role="button"  class="delete-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm{{$user->id}}">
                            <button class="hapus-btn bi bi-trash" ></button>
                          </a>

                          <div class="modal fade bd-example-modal-sm{{$user->id}}" tabindex="-1" role="dialog"
                              aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title"><strong>Hapus Data</strong></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal">
                                          </button>
                                      </div>
                                      <div class="modal-body">Apakah anda yakin ingin menghapus data?</div>
                                      <div class="modal-footer" style="left:0px; height: 80px;">
                                          <form
                                              action="{{route('user.destroy', $user->id)}}"
                                              method="POST">
                                              @method('DELETE')
                                              @csrf
                                              <button type="button" class=" btn submit-btn submit-btn-yes"
                                                  data-bs-dismiss="modal" style="left:30%;width:20%;">Tidak</button>
                                              <input type="submit" class=" btn submit-btn submit-btn-no" name="" id=""
                                                  value="Hapus" style="left:5%;width:20%;">
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </li>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
