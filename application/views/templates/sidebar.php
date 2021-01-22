<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center mt-2 mb-2" href="">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url(); ?>assets/img/logogram.png" alt="logogram.png" width="60px">
    </div>
    <div class="sidebar-brand-text">Ini Lho ITS!</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <?php if ($title == 'Dashboard') : ?>
    <li class="nav-item active">
    <?php else : ?>
    <li class="nav-item">
    <?php endif; ?>
    <a class="nav-link" href="<?= base_url('admin2021'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Link -->
    <?php if ($title == 'Shorten Link') : ?>
      <li class="nav-item active">
      <?php else : ?>
      <li class="nav-item">
      <?php endif; ?>
      <a class="nav-link" href="<?= base_url('shortenlink'); ?>">
        <i class="fas fa-fw fa-link"></i>
        <span>Shorten Link</span>
      </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Merchandise
      </div>

      <!-- Nav Item - Merchant -->
      <?php if ($title == 'Merchandise Products') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url('merchant/product'); ?>">
          <i class="fas fa-fw fa-tshirt"></i>
          <span>Products</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Logout -->
        <li class="nav-item">
          <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Log Out</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->