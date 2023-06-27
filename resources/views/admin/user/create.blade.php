<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/admin/create.blade.php -->

<form action="{{ route('StoreUser') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name">Name</label>
        <input type="text" name="NamaLengkap" id="name" required>
    </div>

    <div>
        <label for="email">Username</label>
        <input type="text" name="UserName" id="email" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="Password" id="password" required>
    </div>

    <div>
        <label for="nomorhp">Nomor HP</label>
        <input type="text" name="NomorHp" id="hp" required>
    </div>

    <div>
        <label for="Foto">Foto</label>
        <input type="file" name="Foto" id="Foto" required>
    </div>

    <div>
        <label for="role">Role</label>
        <select name="Roles" id="role">
            <option value="1">Admin</option>
            <option value="2">User</option>
        </select>
    </div>

    <button type="submit">Create User</button>
</form>

    
</body>
</html>