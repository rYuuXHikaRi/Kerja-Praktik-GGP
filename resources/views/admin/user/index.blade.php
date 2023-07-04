@extends('layouts.App')

@section('container')
<div class="datauser">
  <h3>{{ $title }}</h3>
</div>
<br>
<br>
  <div class="data">
    <h6>{{ $title }}</h6>
    <p style="font-size: 15px">Hasil Untuk “Data User" <input type="text" class="search-input" placeholder= " Search..." > <br> Daya Tampung : 12/30</p>
    <table border="2" cellpadding="15">
        <thead>
          <tr>
            <th style="width: 5vh">No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Nomor Hp</th>
            <th>Role</th>
            <th style="width: 25vh">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          @foreach ($users as $user)
          <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->UserName }}</td>
              <td>{{ $user->NamaLengkap }}</td>
              <td>{{ $user->NomorHp }}</td>
              <td>{{ $user->Roles }}</td>
              <td>
                <a href="{{ route('user.edit',$user->id) }}" class="edit-button">
                    <button class="edit-btn" >Edit</button>
                </a>
                <a role="button"  class="delete-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm{{$user->id}}">
                    <button class="delete-btn" >Hapus</button>
                </a>
                  <!-- Modal -->
                  <div class="modal fade bd-example-modal-sm{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><strong>Hapus Data</strong></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">Apakah anda yakin ingin menghapus data?</div>
                            <div class="modal-footer" style="left:0px;">
                                <form action="{{route('user.destroy', $user->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger" name="" id="" value="Hapus" style="left:5%;width:20%;">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="left:30%;width:20%;">Tidak</button>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
      <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a class="active" href="#">2</a>
        <a href="#">3</a>
        <a href="#">&raquo;</a>
      </div>
  </div>  
@endsection





