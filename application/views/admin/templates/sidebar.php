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
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Shorten Link
    </div>

    <!-- Shorten Link - Add Link -->
    <?php if ($title == 'Add Shorten Link') : ?>
      <li class="nav-item active">
      <?php else : ?>
      <li class="nav-item">
      <?php endif; ?>
      <a class="nav-link" href="<?= base_url('shortenlink'); ?>">
        <i class="fas fa-fw fa-link"></i>
        <span>Add Link</span>
      </a>
      </li>

      <!-- Shorten Link - List Links -->
      <?php if ($title == 'List Shorten Link') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url('shortenlink/list'); ?>">
          <i class="fas fa-fw fa-link"></i>
          <span>List Link</span>
        </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Merchandise
        </div>

        <!-- Merchandise - Order -->
        <?php if ($title == 'Merchandise Order') : ?>
          <li class="nav-item active">
          <?php else : ?>
          <li class="nav-item">
          <?php endif; ?>
          <a class="nav-link" href="<?= base_url('merch'); ?>">
            <i class="fas fa-fw fa-cart-arrow-down"></i>
            <span>Order</span></a>
          </li>

          <!-- Merchandise - Settings -->
          <?php if ($title == 'Merchandise Settings') : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link" href="<?= base_url('merch/settings'); ?>">
              <i class="fas fa-fw fa-user-cog"></i>
              <span>Settings</span></a>
            </li>

            <!-- Merchandise - Referral -->
            <?php if ($title == 'Merchandise Referral Code') : ?>
              <li class="nav-item active">
              <?php else : ?>
              <li class="nav-item">
              <?php endif; ?>
              <a class="nav-link" href="<?= base_url('merch/referral'); ?>">
                <i class="fas fa-fw fa-percentage"></i>
                <span>Referral Code</span></a>
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