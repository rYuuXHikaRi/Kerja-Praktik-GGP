<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Nomor Hp</th>
                <th>Foto</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->UserName }}</td>
                    <td>{{ $user->NamaLengkap }}</td>
                    <td>{{ $user->NomorHp }}</td>
                    <td><iframe id="qrCode" src="{{ asset('assets/images')}}/{{ $user->Foto }} "></iframe></td>
                    <td>{{ $user->Roles }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>