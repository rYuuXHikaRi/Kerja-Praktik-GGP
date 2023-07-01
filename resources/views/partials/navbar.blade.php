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
        <button class="menu-item isactive" href="{{ route('arsip.create') }}">
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