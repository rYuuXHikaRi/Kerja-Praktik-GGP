<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 Side Bar Navigation</title>
    <!-- bootstrap 5 css -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
      integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
      crossorigin="anonymous"
    />
    <!-- custom css -->
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />

    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>

  <body>
    <div>
     <div class="sidebar p-4 bg-white" id="sidebar">
            <h4 class="mb-5 text-black"><img src="img/logo.png" alt="logo" width="100"></h4>
            <li>
              <a class="menu-item active" href="/Dashboard">
                <i class="bi bi-house mr-2"></i>
                Dashboard
              </a>
            </li>
            <li>
              <a class="menu-item" href="/Folder">
                <i class="bi bi-folder mr-2"></i>
                Folder
              </a>
            </li>
            <li>
              <a class="text-green" href="/KelolaArsip">
                <i class="bi bi-newspaper mr-2"></i>
                Kelola Arsip
              </a>
            </li>
            <li>
              <a class="text-green" href="/RiwayatUnduhan">
                <i class="bi bi-clock-history mr-2"></i>
                Riwayat Unduhan
              </a>
            </li>
            <li>
              <a class="text-green" href="/DataPetugas">
                <i class="bi bi-person mr-2"></i>
                Data Petugas
              </a>
            </li>
            <li>
                <a class="text-green" href="/DataUser">
                  <i class="bi bi-person mr-2"></i>
                  Data User
                </a>
              </li>
            <li>
              <a class="text-green" href="{{ route('user.create') }}">
                <i class="bi bi-plus mr-2"></i>
                Tambah Akun
              </a>
            </li>
            <li>
              <a class="text-green" href="#">
                <i class="bi bi-box-arrow-right mr-2"></i>
                Log Out
              </a>
            </li>
          </div>

    </div >
    <nav class="navbar"> 
        <div class="corner-text">
             <img src="img/administrator.png" alt="admin" width="40">| Administrator| </div>
    </nav>

    
    <div class="p-4" id="main-content">
      <button class="btn" id="button-toggle" >
        <i class="bi bi-list"></i>
      </button>
    </div>
    <script>

      // event will be executed when the toggle-button is clicked
      document.getElementById("button-toggle").addEventListener("click", () => {

        // when the button-toggle is clicked, it will add/remove the active-sidebar class
        document.getElementById("sidebar").classList.toggle("active-sidebar");

        // when the button-toggle is clicked, it will add/remove the active-main-content class
        document.getElementById("main-content").classList.toggle("active-main-content");
      });

    </script>
  </body>
</html>