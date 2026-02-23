<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="{{ asset('template/assets/images/faces/face1.jpg') }}" alt="profile" />
          <span class="login-status online"></span>
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ Auth::user()->name ?? 'David Grey. H' }}</span>
          <span class="text-secondary text-small">Administrator</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>

<li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
  <a class="nav-link" href="{{ route('dashboard') }}">
    <span class="menu-title">Dashboard</span>
    <i class="mdi mdi-home menu-icon"></i>
  </a>
</li>

<li class="nav-item {{ request()->routeIs(['buku.index', 'buku.create', 'buku.store']) ? 'active' : '' }}">
  <a class="nav-link" href="{{ route('buku.index') }}">
    <span class="menu-title">Buku</span>
    <i class="mdi mdi-book-open-page-variant menu-icon"></i>
  </a>
</li>

<li class="nav-item {{ request()->routeIs(['kategori.index', 'kategori.create', 'kategori.store']) ? 'active' : '' }}">
  <a class="nav-link" href="{{ route('kategori.index') }}">
    <span class="menu-title">Kategori</span>
    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
  </a>
</li>

<li class="nav-item {{ request()->routeIs(['pdf.sertifikat','pdf.undangan']) ? 'active' : '' }}">
  <a class="nav-link" data-bs-toggle="collapse" href="#pdfMenu" aria-expanded="false" aria-controls="pdfMenu">
    <span class="menu-title">PDF Generator</span>
    <i class="menu-arrow"></i>
    <i class="mdi mdi-file-pdf-box menu-icon"></i>
  </a>
  <div class="collapse" id="pdfMenu">
    <ul class="nav flex-column sub-menu">

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/pdf/sertifikat') }}">
          Sertifikat (Landscape)
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/pdf/undangan') }}">
          Undangan (Portrait)
        </a>
      </li>

    </ul>
  </div>
</li>

  </ul>
</nav>