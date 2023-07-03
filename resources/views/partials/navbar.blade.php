<!-- Sidebar -->
<div>

  <div class="sidebar bg-white" id="sidebar">
    <h4 class="text-black" style="margin-left: 7px; margin-top: 7px;"><img src="/img/logo.png" alt="logo" width="45"></h4>


    
    <ul class="p-2">
      <li class="menu-item" href="/Dashboard">
        <a href="/Dashboard">
          <a class="Icon Dashboard" href="/Dashboard"> <!-- SVG Code Here --> </a>
        </a>
      </li>
      <li class="menu-item" href="{{ route('arsip.index') }}">
        <a href="{{ route('arsip.index') }}">
            <a class="Icon Folders" href="{{ route('arsip.index') }}"> <!-- SVG Code Here --> </a>
        </a>
      </li>
      <li class="menu-item" href="{{ route('arsip.create') }}">
        <a href="{{ route('arsip.create') }}">
              <a class="Icon KelolaArsip" href="{{ route('arsip.create') }}"> <!-- SVG Code Here --> </a>
        </a>
      </li>
      <li class="menu-item" href="/RiwayatUnduhan">
        <a href="/RiwayatUnduhan">
                <a class="Icon RiwayatUnduhan" href="/RiwayatUnduhan"> <!-- SVG Code Here --> </a>
        </a>
      </li>
      <li class="menu-item" href="/DataPetugas">
        <a href="/DataPetugas">
                <a class="Icon DataPetugas" href="/DataPetugas"> <!-- SVG Code Here --> </a>
        </a>
      </li>
      <li class="menu-item" href="/DataUser">
        <a href="/DataUser">
                  <a class="Icon DataUser" href="/DataUser"> <!-- SVG Code Here --> </a>
        </a>
      </li>
      <li class="menu-item" href="/TambahAkun">
        <a href="/TambahAkun">
                    <a class="Icon TambahAkun" href="/TambahAkun"> <!-- SVG Code Here --> </a>
        </a>
      </li>
      <li class="menu-item">
        <a  href="/">
                      <a class="Icon LogOut" href="/"> <!-- SVG Code Here --> </a>
        </a>
      </li>
    </ul>
  </div>
</div >

<!-- Navbar -->
<nav class="navbar sticky-top"> 
  <div id="main-content">
    <button class="navbar-toggler" id="button-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="bi bi-list" style="font-size: 1.5rem;"></span>
    </button>
  </div>
  <div class="corner-text" style="justify-content: center; ">
        <a href="/Profil" style="text-decoration: none; color: inherit; font-size: 12px;"> Administrator | </a>
        <a href="/Profil">
          <img src="https://demos.wrappixel.com/free-admin-templates/bootstrap/ample-bootstrap-free/html/plugins/images/users/varun.jpg" alt="admin" width="36" class="img-circle">
        </a>
  </div>
</nav>