<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <!-- LINK GLOBAL STYLE -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/main.css" />
  <title>Ini Lho ITS! 2021</title>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light position-absolute w-100 p-lg-2 p-0" style="z-index: 1000">
    <div id="mobileNavContainer" class="d-flex justify-content-between order-0 order-lg-1 bp">
      <button id="navbar-button" class="navbar-toggler left" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand bp" href="#">
        <img src="<?= base_url() ?>assets/img/logo.png" alt="Logo ILITS2021" loading="lazy" />
      </a>
    </div>
    <div class="collapse navbar-collapse bp" id="navbarNav">
      <ul id="navbarNavUl" class="navbar-nav d-flex justify-content-between text-center bp">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#fakultas">fakultas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#prestasi">prestasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#fasilitas">fasilitas</a>
        </li>
        <li class="nav-item dropdown-li bp">
          <p href="" class="nav-link nav-dropdown bp">more</p>
          <div class="nav-dropdown-content bp">
            <a href="" class="nav-link">Pendaftaran Tryout</a>
            <a href="" class="nav-link">Pendaftaran Webinar</a>
            <a href="" class="nav-link">Pendaftaran Open Campus</a>
            <a href="" class="nav-link">Pemesanan Merch</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <!-- END OF NAVBAR -->

  <!-- LANDING HEADER SECTION -->
  <div id="merch-header" class="section">
    <div id="big-text" class="container-fluid d-lg-flex " style="z-index: 1; position: relative">
      <div class="merch-head row aic">
        <div class="col-xl-6 pb-3">
          <h1 class="merch-title">
            Ini Lho ITS! 2021
          </h1>
          <img class="merch-official" src="<?= base_url('assets/img/') ?>product/merch-official.png">
          <div class="text-center">
            <button class="btn btn-yellow">Beli Sekarang !</button>
          </div>
        </div>
        <div class="col-xl-6 clothes">
          <img src="<?= base_url('assets/img/') ?>product/kaos-tiedye.png" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- END OF LANDING HEADER -->

  <!-- CART LISTS -->
  <div id="cart-lists" class="container">

    <?= form_open('merchandise/update'); ?>
    <?php $i = 1; ?>
    <?php foreach ($this->cart->contents() as $items) : ?>
      <!-- CART ITEMS -->
      <div class="cart-items">
        <div class="row cart-details">
          <div class="col-md-4 text-center">
            <?php $product = $this->db->get_where('tabel_product', ['id' => $items['id']])->row_array() ?>
            <img class="cart-images" src="<?= base_url('assets/img/product/') . $product['catalog'] ?>">
          </div>
          <div class="col-md-8 cart-desc d-flex flex-column jcc">
            <h5 class="mt-2"><?= $items['options']['Category'] . ' ' . $items['name']; ?></h5>
            <span class="form-group d-flex aic">
              <?= form_input(array('name' => $i . '[qty]', 'type' => 'number', 'class' => 'form-control', 'value' => $items['qty'], 'maxlength' => '3', 'min' => '1')); ?>
              <span class="mx-3">x IDR <?= number_format($items['price'], 2); ?></span>
            </span>
            <p class="text-muted">Berat : <?= number_format($product['weight'], 0) ?> gr</p>
            <p class="text-muted">Total : <?= number_format($items['subtotal'], 2) ?></p>
            <?php if ($items['options']['Size'] != 'null') : ?>
              <p class="text-uppercase">Size : <?= $items['options']['Size'] ?></p>
            <?php endif; ?>
            <a href="<?= base_url('merchandise/delete/') . $items['rowid'] ?>" class="btn btn-delete">
              <i class="fas fa-fw fa-trash"></i>
            </a>
            <button type="submit" class="btn btn-update">
              <i class="fas fa-fw fa-pen"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="dropdown-divider my-4"></div>
      <!-- END OF CART ITEMS -->
      <?php $i++; ?>
    <?php endforeach; ?>
    <?= form_close(); ?>
    <div class="cart-total text-right mb-3">
      <h4>Total : Rp. <?= number_format($this->cart->total(), 2) ?></h4>
    </div>
    <div class="text-center mb-5">
      <a href="<?= base_url('merchandise') ?>" class="mx-2 btn btn-yellow">Kembali ke Katalog</a>
      <a href="<?= base_url('merchandise/clear') ?>" class="mx-2 btn btn-red">Hapus Keranjang Belanja</a>
      <a href="<?= base_url('merchandise/checkout') ?>" class="mx-2 btn btn-green">Checkout</a>
    </div>
  </div>
  <!-- END OF CART LISTS -->

  <!-- SCROLL TO TOP -->
  <div class="scroll-to-top bounce-container bounce d-flex jcc aic" onclick="(function(){
			document.body.scrollTop = 0; // For Safari
			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		})()">
    <div class="btn">
      <i class="fa fa-chevron-up text-white"></i>
    </div>
  </div>
  <!-- END OF SCROLL TO TOP -->



  <!-- FOOTER -->

  <div id="footer">
    <div id="footer-logo">
      <img src="<?= base_url('assets/img/') ?>logo.png" alt="Logo ILITS2021" />
    </div>
    <div class="medspons-container">
      <div class="medspons">
        <h3>Media Partner</h3>
        <div class="medspons-content">
          <img src="<?= base_url('assets/img/') ?>google.png" />
          <img src="<?= base_url('assets/img/') ?>google.png" />
          <img src="<?= base_url('assets/img/') ?>google.png" />
          <img src="<?= base_url('assets/img/') ?>google.png" />
          <img src="<?= base_url('assets/img/') ?>google.png" />
        </div>
      </div>

      <div class="medspons">
        <h3>Sponsor</h3>
        <div class="medspons-content">
          <img src="<?= base_url('assets/img/') ?>google.png" />
          <img src="<?= base_url('assets/img/') ?>google.png" />
        </div>
      </div>
    </div>
    <p id="footer-copy">&copy; Copyright Ini LHO ITS 2021. All Rights Reserved</p>
  </div>


  <!-- END OF FOOTER -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
  <script src="<?= base_url('assets/') ?>js/sweetalert2.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/merch-modal.js"></script>
</body>

</html>