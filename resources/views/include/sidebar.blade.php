<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
<div class="app-brand demo">
  <a href="/dashboard" class="app-brand-link">
    <img src="{{ asset('assets/img/logo-unuha.jpeg') }}" width="40"/>
    <span class="app-brand-text demo menu-text fw-bolder ms-2">Jurnal Kelas</span>
  </a>

  <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
    <i class="bx bx-chevron-left bx-sm align-middle"></i>
  </a>
</div>

<div class="menu-inner-shadow"></div>

<ul class="menu-inner py-1">
  <!-- Dashboard -->
  <li class="menu-item {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
    <a href="/dashboard" class="menu-link">
      <i class="menu-icon tf-icons bx bx-home-circle"></i>
      <div data-i18n="Analytics">Dashboard</div>
    </a>
  </li>

  <li class="menu-header small text-uppercase">
    <span class="menu-header-text">Data</span>
  </li>
  <li class="menu-item {{ request()->segment(1) == 'mahasiswa' ? 'active' : '' }}">
    <a href="/mahasiswa" class="menu-link">
      <i class="menu-icon tf-icons bx bxs-user-rectangle"></i>
      <div data-i18n="Basic">Mahasiswa</div>
    </a>
  </li>
  <li class="menu-item {{ request()->segment(1) == 'pembayaran' ? 'active' : '' }}">
    <a href="/pembayaran" class="menu-link">
      <i class="menu-icon tf-icons bx bxs-user"></i>
      <div data-i18n="Basic">Dosen</div>
    </a>
  </li>
  <li class="menu-item {{ request()->segment(1) == 'wisuda' ? 'active' : '' }}">
    <a href="/wisuda" class="menu-link">
      <i class="menu-icon tf-icons bx bxs-graduation"></i>
      <div data-i18n="Basic">Prodi</div>
    </a>
  </li>
</ul>
</aside>