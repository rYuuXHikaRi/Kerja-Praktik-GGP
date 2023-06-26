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
    <style>
      li {
        list-style: none;
        margin: 20px 0 20px 0;
      }

      a {
        text-decoration: none;
      }

      .sidebar {
        width: 250px;
        height: 100vh;
        margin-left: -300px;
        transition: 0.4s;
      }

      .active-main-content {
        margin-left: 250px;
      }

      .active-sidebar {
        margin-left: 0;
      }

      #main-content {
        transition: 0.4s;
      }

      .grid-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(2, 1fr);
        gap: 10px;

}

    .grid-item {
    border: 2px solid black;
    padding: 10px;
    border-radius: 10px;
}

    </style>
  </head>

  <body>
    <div>
    
       
     <div class="sidebar p-4 bg-white" id="sidebar" style=" position: absolute;z-index: 3;">
            <h4 class="mb-5 text-black"><img src="img/logo.png" alt="logo" width="100"></h4>
            <li>
              <a class="text-green" href="#">
                <i class="bi bi-house mr-2"></i>
                Dashboard
              </a>
            </li>
            <li>
              <a class="text-green" href="#">
                <i class="bi bi-folder mr-2"></i>
                Folder
              </a>
            </li>
            <li>
              <a class="text-green" href="#">
                <i class="bi bi-newspaper mr-2"></i>
                Kelola Arsip
              </a>
            </li>
            <li>
              <a class="text-green" href="#">
                <i class="bi bi-clock-history mr-2"></i>
                Riwayat Unduhan
              </a>
            </li>
            <li>
              <a class="text-green" href="#">
                <i class="bi bi-person mr-2"></i>
                Data Petugas
              </a>
            </li>
            <li>
                <a class="text-green" href="#">
                  <i class="bi bi-person mr-2"></i>
                  Data User
                </a>
              </li>
            <li>
              <a class="text-green" href="#">
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
    <nav class="navbar " style="position :absolute; background: #A6D17A;z-index:1;border:#A6D17A solid 4px;width:100%;height:10%"> 
            
        <div class="corner-text" style="position: absolute;right: 0;transform: translate(-100%, 0);font-weight: bold;size:48;">
             <img src="img/administrator.png" alt="admin" width="40">| Administrator| </div>
    </nav>
        
    
    <div class="p-4" id="main-content">
      <button class="btn btn" id="button-toggle" style="position: absolute;z-index:4;">
        <i class="bi bi-list"></i>
      </button>

      <div class="card mt-5">
        <div class="card-body">
            <div class="border" style="border:#A6D17A solid 4px;width:100%;height:10%"></div><h2>Dashboard</h4>

            <div class="grid-container">
                <div class="grid-item"><h4>Petugas</h4><img src="img/grafik.png" alt="statistik" width="130"><h6 style="text-align: center;">4</h6></div>
                <div class="grid-item"><h4>User</h4><img src="img/grafik.png" alt="statistik" width="130"><h6 style="text-align: center;">5</h6></div>
                <div class="grid-item"><h4>Total Arsip</h4><img src="img/grafik.png" alt="statistik" width="130"><h6 style="text-align: center;">10</h6></div>
                <div class="grid-item"><h4>Kategori Arsip</h4><img src="img/grafik.png" alt="statistik" width="130"><h6 style="text-align: center;">6</h6></div>
              </div>
        </div>
      </div>
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