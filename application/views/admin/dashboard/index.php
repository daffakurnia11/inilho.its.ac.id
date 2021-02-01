<!-- Begin Page Content -->
<div class="container" style="color: black;">

  <!-- Page Heading -->
  <h1 class="h3 my-3">Selamat Datang di Dashboard Ini Lho ITS! 2021</h1>
  <div class="row">
    <div class="col-lg-6 mb-3">
      <div class="card shadow">
        <div class="card-header" style="background-color: #f6014f; color: white; font-weight: 600">
          Shorten Link
        </div>
        <div class="card-body">
          <h5 class="card-title"><strong>Ini Lho ITS! Shorten Link</strong></h5>
          <p class="card-text">Buat Shorten Link sendiri pake URL <strong>inilhoits.ac.id</strong>.</p>
          <p class="card-text">Jumlah Shorten Link yang dibuat : <strong><?= $shorten_link; ?></strong> Link</p>
          <a href="<?= base_url('shortenlink'); ?>" class="btn btn-primary">Buat Link!</a>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card shadow">
        <div class="card-header" style="background-color: #f6014f; color: white; font-weight: 600">
          Fundraising
        </div>
        <div class="card-body">
          <h5 class="card-title"><strong>Merchandise Selling</strong></h5>
          <p class="card-text">Data Penjualan <i>merchandise</i> Ini Lho ITS! 2021</p>
          <p class="card-text">Total Pemesanan : <strong><?= $order_total->num_rows(); ?></strong> Pesanan</p>
          <a href="<?= base_url('merch'); ?>" class="btn btn-primary">Liat Data!</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Page Heading -->

  <!-- Merchandise Statistics -->
  <h2 class="h4 my-3">Rincian Total Pemesanan</h2>
  <div class="row">

    <!-- Total Unpaid Orders -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card shadow h-100 py-2" style="border-left: 5px solid #f99121;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #f99121;">
                Belum Bayar</div>
              <div class="h5 mb-0 font-weight-bold"><?= $unpaid; ?> <span class="h6 font-weight-normal">Pesanan</span></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-receipt fa-2x" style="color: #f99121;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Total Paid Orders -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card shadow h-100 py-2" style="border-left: 5px solid #0c0c6d;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #0c0c6d;">
                Sudah Bayar / Proses</div>
              <div class="h5 mb-0 font-weight-bold"><?= $paid; ?> <span class="h6 font-weight-normal">Pesanan</span></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-paper-plane fa-2x" style="color: #0c0c6d;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Total Finished Orders -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card shadow h-100 py-2" style="border-left: 5px solid #13bf2b;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #13bf2b;">
                Selesai</div>
              <div class="h5 mb-0 font-weight-bold"><?= $finished; ?> <span class="h6 font-weight-normal">Pesanan</span></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-check-circle fa-2x" style="color: #13bf2b;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Total Finished Orders -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card shadow h-100 py-2" style="border-left: 5px solid #f6014f;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #f6014f;">
                Ditolak</div>
              <div class="h5 mb-0 font-weight-bold"><?= $reject; ?> <span class="h6 font-weight-normal">Pesanan</span></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-times-circle fa-2x" style="color: #f6014f;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->