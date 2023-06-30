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
    
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
  </head>

  <body>

  <!-- Sidebar -->
    <div>
      <div class="sidebar bg-white" id="sidebar">
        <h4 class="mb-5 p-4 text-black"><img src="img/logo.png" alt="logo" width="100"></h4>

        <ul class="p-3">
          <li>
            <button class="menu-item isactive" href="/Dashboard">
              <a class="Icon Dashboard" href="/Dashboard"> <!-- SVG Code Here --> </a>
            </button>
          </li>
          <li>
            <button class="menu-item isactive" href="/Folder">
                <a class="Icon Folders" href="/Folder"> <!-- SVG Code Here --> </a>
            </button>
          </li>
          <li>
            <button class="menu-item isactive" href="/KelolaArsip">
                  <a class="Icon KelolaArsip" href="/KelolaArsip"> <!-- SVG Code Here --> </a>
            </button>
          </li>
          <li>
          <button class="menu-item isactive" href="/RiwayatUnduhan">
                  <a class="Icon RiwayatUnduhan" href="/RiwayatUnduhan"> <!-- SVG Code Here --> </a>
            </button>
          </li>
          <li>
            <button class="menu-item isactive" href="/DataPetugas">
                    <a class="Icon DataPetugas" href="/DataPetugas"> <!-- SVG Code Here --> </a>
            </button>
          </li>
          <li>
            <button class="menu-item isactive" href="/DataUser">
                      <a class="Icon DataUser" href="/DataUser"> <!-- SVG Code Here --> </a>
            </button>
          </li>
          <li>
            <button class="menu-item isactive" href="/RanbahAkun">
                        <a class="Icon TambahAkun" href="/TambahAkun"> <!-- SVG Code Here --> </a>
            </button>
          </li>
          <li>
          <button class="menu-item isactive" href="/">
                        <a class="Icon LogOut" href="/"> <!-- SVG Code Here --> </a>
            </button>
          </li>
        
        </ul>

      </div>

    </div >

    <!-- Navbar -->
    <nav class="navbar"> 
      <div id="main-content">
        <button class="navbar-toggler" id="button-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="bi bi-list" style="font-size: 2rem;"></span>
        </button>
      </div>
      <div class="corner-text" style="justify-content: center; ">
            <a href="/Profile" style="text-decoration: none; color: inherit;"> Administrator | </a>
            <a href="/Profile">
              <img src="img/administrator.png" alt="admin" width="40">
            </a>
      </div>
    </nav>

    <!-- Toogle Button -->



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