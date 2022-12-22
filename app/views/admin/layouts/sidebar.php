<?php
$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', $uri);
?>

<aside id="sidebar" class="col-auto collapse collapse-horizontal show min-vh-100 text-white bg-theme-primary " id="sidebar">
  <div class="d-flex flex-column p-3 h-100">
    <h2 class="d-flex align-items-center me-md-auto mb-3 py-3 px-5">Admin</h2>
    <ul class="nav nav-pills gap-3 flex-column">
      <li class="nav-item">
        <a class="nav-link <?= $uri[2] == null ? 'link-active' : '' ?>" href="/admin">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $uri[2] == 'user' ? 'link-active' : '' ?>" href="/admin/user">User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  <?= $uri[2] == 'film' ? 'link-active' : '' ?>" href="/admin/film">Film</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  <?= $uri[2] == 'bioskop' ? 'link-active' : '' ?>" href="/admin/bioskop">Bioskop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  <?= $uri[2] == 'transaksi' ? 'link-active' : '' ?>" href="/admin/transaksi">Transaksi</a>
      </li>
      <li class="nav-item mt-auto">
        <a class="nav-link justify-content-end" href="/admin/logout">Logout</a>
      </li>
    </ul>
  </div>
</aside>