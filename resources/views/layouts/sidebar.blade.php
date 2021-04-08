<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= url('admin/home') ?>">TeenaBimbel</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="/admin/home"><i class="fas fa-tachometer-alt"></i> <span>Home</span></a></li>
      </li>
      <li class="menu-header">Data Registrasi</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-import"></i><span>Pendaftaran</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?= route('registrasi.index') ?>">List Data</a></li>
          </ul>
        </li>
      </li>
        <li class="menu-header">Data Jenjang</li>
            <li><a class="nav-link" href="<?= route('jenjang.index') ?>"><i class="far fa-file-code"></i><span>List Data Jenjang</span></a></li>
        </li>
        <li class="menu-header">Data Paket Bimbel</li>
          <li><a class="nav-link" href="<?= route('paket.index') ?>"><i class="fas fa-file-alt"></i> <span>List Paket Bimbel</span></a></li>
        </li>
    </ul>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="fas fa-sign-out-alt"></i>Logout</button>
        </form> 
      </div>
  </aside>