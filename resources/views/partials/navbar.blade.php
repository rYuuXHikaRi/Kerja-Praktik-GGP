<!-- Sidebar -->
<div>

  <div class="sidebar bg-white" id="sidebar">
    <h4 class="text-black" style="margin-left: 7px; margin-top: 7px;"><img src="/img/logo.png" alt="logo" width="45"></h4>

    <ul class="p-2">
    @auth
    @if (auth()->user()->Roles == 1)
    <li class="menu-item" href="{{ route('admindashboard') }}">
      <a href="{{ route('admindashboard') }}">
        <a class="Icon Dashboard" href="{{ route('admindashboard') }}"> <!-- SVG Code Here --> </a>
      </a>
    </li>
    <li class="menu-item" href="{{ route('archive.index') }}">
      <a href="{{ route('archive.index') }}">
          <a class="Icon Folders" href="{{ route('archive.index') }}"> <!-- SVG Code Here --> </a>
      </a>
    </li>
    <li class="menu-item" href="{{ route('archive.create') }}">
      <a href="{{ route('archive.create') }}">
            <a class="Icon KelolaArsip" href="{{ route('archive.create') }}"> <!-- SVG Code Here --> </a>
      </a>
    </li>
    <li class="menu-item" href="{{ route('history.index') }}">
      <a href="{{ route('history.index') }}">
              <a class="Icon RiwayatUnduhan" href="{{ route('history.index') }}"> <!-- SVG Code Here --> </a>
      </a>
    </li>
    <li class="menu-item" href="{{ route('user.index') }}">
      <a href="{{ route('user.index') }}">
              <a class="Icon DataPetugas" href="{{ route('user.index') }}"> <!-- SVG Code Here --> </a>
      </a>
    </li>
    <li class="menu-item" href="{{ route('showuser') }}">
      <a href="{{ route('showuser') }}">
                <a class="Icon DataUser" href="{{ route('showuser') }}"> <!-- SVG Code Here --> </a>
      </a>
    </li>
    <li class="menu-item" href="{{ route('user.create') }}">
      <a href="{{ route('user.create') }}">
                  <a class="Icon TambahAkun" href="{{ route('user.create') }}"> <!-- SVG Code Here --> </a>
      </a>
    </li>
    <li class="menu-item">
      <a  href="/">
                    <a class="Icon LogOut" href="{{ route('logout') }}"> <!-- SVG Code Here --> </a>
      </a>
    </li>  
    @elseif(auth()->user()->Roles == 2)
    <li class="menu-item" href="{{ route('userdashboard') }}">
      <a href="{{ route('userdashboard') }}">
        <a class="Icon Dashboard" href="{{ route('userdashboard') }}"> <!-- SVG Code Here --> </a>
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
    <li class="menu-item">
      <a  href="/">
                    <a class="Icon LogOut" href="{{ route('logout') }}"> <!-- SVG Code Here --> </a>
      </a>
    </li>  
    
    @endif
        
    @endauth
    
    

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
    @if (auth()->user()->Roles == 1)
    <a href="{{ route('adminShowProfile') }}" style="text-decoration: none; color: inherit; font-size: 12px;"> {{ auth()->user()->UserName }} | </a>
    <a href="{{ route('adminShowProfile') }}">
      <img src="{{ asset('assets/images/'.auth()->user()->Foto) }}" alt="admin" width="36" class="img-circle">
    </a>
        
    @elseif (auth()->user()->Roles == 2)
    <a href="{{ route('ShowProfile') }}" style="text-decoration: none; color: inherit; font-size: 12px;"> {{ auth()->user()->UserName }} | </a>
    <a href="{{ route('ShowProfile') }}">
      <img src="{{ asset('assets/images/'.auth()->user()->Foto) }}" alt="admin" width="36" class="img-circle">
    </a>
        
    @endif
  </div>
</nav>