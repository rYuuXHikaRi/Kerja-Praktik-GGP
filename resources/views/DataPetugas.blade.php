@extends('layouts.App')

@section('container')
<div class="datapetugas">
  <h3>Data Petugas </h3>
</div>
<br>
<br>
  <div class="data">
    <h6>Data Petugas</h6>
    <p style="font-size: 15px">Hasil Untuk “Data Petugas" <input type="text" class="search-input" placeholder= " Search..." ><br> Daya Tampung : 29/30</p>

    <table border="2" cellpadding="15">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Agus</td>
            <td>agus@gmail.com</td>
            <td>johndoe123</td>
            <td>***</td>
            <td>Admin</td>
            <td>
              <button class="edit-btn" >Edit</button>
              <button class="delete-btn ">Hapus</button>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Bopak</td>
            <td>pakbo@gmail.com</td>
            <td>bopaknih326</td>
            <td>***</td>
            <td>Admin</td>
            <td>
              <button class="edit-btn">Edit</button>
              <button class="delete-btn">Hapus</button>
            </td>
          </tr>
          <tr>
            <td>1</td>
            <td>Cung</td>
            <td>lahsicung@gmail.com</td>
            <td>cung.gans</td>
            <td>***</td>
            <td>Admin</td>
            <td>
              <button class="edit-btn">Edit</button>
              <button class="delete-btn">Hapus</button>
            </td>
          </tr>
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
