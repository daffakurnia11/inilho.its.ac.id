<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <!-- LINK GLOBAL STYLE -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css" />
  <title>Ini Lho ITS! 2021</title>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light position-absolute w-100 p-lg-2 p-0" style="z-index: 1000">
    <div id="mobileNavContainer" class="d-flex justify-content-between order-0 order-lg-1">
      <button class="navbar-toggler left" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand bp" href="#">
        <img src="<?= base_url() ?>assets/img/logo.png" alt="Logo ILITS2021" loading="lazy" />
      </a>
    </div>
    <div class="collapse navbar-collapse bp" id="navbarNav">
      <ul id="navbarNavUl" class="navbar-nav d-flex justify-content-between text-center">
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
        <li class="nav-item">
          <a class="nav-link" href="#">tryout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- END OF NAVBAR -->

  <!-- CONTENT -->
  <div id="merchant-header" class="section">
    <img class="section-bg" src="<?= base_url() ?>assets/img/departemen-top.png" />
    <div id="big-text" class="container-fluid " style="z-index: 1; position: relative">
      <div class="row d-flex jcc align-items-center vh-100 p-5">
        <div class="col-5 d-flex flex-column p-5">
          <h1 class="font-weight-bold text-white display-3">
            <?= $tabel_product['product'] ?>
          </h1>
          <h3 class="font-weight-bold text-white display-5">
            Rp. <?= $tabel_product['price'] ?>,00
          </h3>
          <?php
          echo form_open('merchandise/add');
          echo form_hidden('id', $tabel_product['id']);
          echo form_hidden('price', $tabel_product['price']);
          echo form_hidden('name', $tabel_product['product']);
          echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
          ?>
          <div class="row">
            <div class="col-3">
              <input type="number" name="qty" class="form-control" value="1" min="1">
            </div>
            <div class="col-9">
              <button class="btn btn-yellow swalDefaultSuccess">Tambah ke Keranjang !</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
        <div class="col-7 item-images d-flex jcc">
          <img src="<?= base_url('assets/img/products/') . $tabel_product['img'] ?>" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- END OF CONTENT -->

  <!-- CART -->
  <div class="cart bounce-container bounce d-flex jcc aic">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
      <i class="fas fa-shopping-cart text-white"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <?php foreach ($this->cart->contents() as $items) : ?>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="mr-3">
            <div class="icon-circle bg-primary">
              <i class="fas fa-file-alt text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500"><?= $items['name']; ?></div>
            <span class="font-weight-bold"><?= $items['qty']; ?> x Rp. <?= $this->cart->format_number($items['price']); ?>,00</span>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- END OF CART -->

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



  <!-- END OF FOOTER -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>assets/js/main.js"></script>
  <script src="<?= base_url() ?>assets/js/sweetalert2.min.js"></script>
  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: 'Keranjang Belanja berhasil ditambahkan !'
        })
      });
    });
  </script>
</body>

</html>