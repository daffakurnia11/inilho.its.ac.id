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
  <div id="merch-catalog-header" class="section">
    <div id="big-text" class="container-fluid d-lg-flex " style="z-index: 1; position: relative">
      <div class="merch-head row aic">
        <div class="col-xl-6 pb-3">
          <h1 class="merch-title">
            Ini Lho ITS! 2021
          </h1>
          <img class="merch-official" src="<?= base_url('public/merchandise/img/') ?>merch-official.png">
          <div class="text-center">
            <button class="btn btn-yellow">Beli Sekarang !</button>
          </div>
        </div>
        <div class="col-xl-6 clothes">
          <img src="<?= base_url('public/merchandise/img/') ?>kaos-tiedye.png" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- END OF LANDING HEADER -->

  <!-- INVOICE CONTENT -->
  <div id="invoice-body" class="mb-5">
    <div class="invoice-header text-center">
      <h3>Terimakasih telah melakukan pemesanan.</h3>
      <p>Selanjutnya, silakan melakukan pembayaran sesuai dengan petunjuk dibawah ini.</p>
    </div>
    <div class="invoice-card container-sm">
      <div class="invoice-content">
        <img class="invoice-logo ml-2" src="<?= base_url('assets/img/logo.png') ?>" alt="">
        <div class="invoice-details mt-2">
          <div class="row">
            <div class="col">
              <p><strong>Invoice :</strong> <?= $data_order['no_order']; ?></p>
              <p><strong>Nama :</strong> <?= $data_order['receiver']; ?></p>
              <p><strong>Status :</strong> <?= $data_order['status']; ?></p>
            </div>
            <div class="col">
              <p><strong>Alamat : </strong><?= $data_order['address'] ?></p>
              <p><strong>Kota : </strong><?= $data_order['city'] . ', ' . $data_order['province'] . ' - ' . $data_order['postal'] ?></p>
              <p><strong>No Telp : </strong><?= $data_order['phone'] ?></p>
            </div>
          </div>
        </div>
        <div class="table-responsive invoice-cart">
          <table class="table mt-2" style="color: black;">
            <thead>
              <tr class="text-center">
                <th scope="col">Nama</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Berat</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Harga</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php
              $subtotal = 0;
              ?>
              <?php foreach ($order_detail as $items) : ?>
                <?php
                $product = $this->db->get_where('tabel_product', ['id' => $items['product_id']])->row_array();
                $subtotal += ($product['price'] * $items['qty']);
                ?>
                <tr>
                  <td class="text-left">
                    <?= $items['product'] ?><br>
                    <?php if ($items['notes'] != 'null') {
                      echo 'Size : ' . $items['notes'];
                    } ?>
                  </td>
                  <td><?= $items['qty'] ?></td>
                  <td><?= number_format($product['weight'], 0) ?> gr.</td>
                  <td>
                    <div class="d-flex justify-content-between">
                      <span>Rp. </span>
                      <span><?= number_format($product['price'], 2) ?></span>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex justify-content-between">
                      <span>Rp. </span>
                      <span><?= number_format(($product['price'] * $items['qty']), 2) ?></span>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
              <?php if ($order_bundle) : ?>
                <?php foreach ($order_bundle as $items) : ?>
                  <?php
                  $product = $this->db->get_where('tabel_bundle', ['id' => $items['product_id']])->row_array();
                  $subtotal += ($product['price'] * $items['qty']);
                  ?>
                  <tr>
                    <td class="text-left">
                      <?= $items['bundle'] ?><br>
                      <p><?= 'Size : ' . $items['size']; ?></p>
                      <p>
                        <?php if ($items['hoodie']) : ?>
                          <?= $items['hoodie'] ?><br>
                        <?php endif; ?>
                        <?php if ($items['tshirt']) : ?>
                          <?= $items['tshirt'] ?><br>
                        <?php endif; ?>
                        <?php if ($items['totebag']) : ?>
                          <?= $items['totebag'] ?><br>
                        <?php endif; ?>
                        <?php if ($items['cap']) : ?>
                          <?= $items['cap'] ?><br>
                        <?php endif; ?>
                        <?php if ($items['keychain']) : ?>
                          <?= $items['keychain'] ?><br>
                        <?php endif; ?>
                        <?php if ($items['bracelet']) : ?>
                          <?= $items['bracelet'] ?><br>
                        <?php endif; ?>
                        <?php if ($items['lanyard']) : ?>
                          <?= $items['lanyard'] ?><br>
                        <?php endif; ?>
                        <?php if ($items['stickerbook']) : ?>
                          <?= $items['stickerbook'] ?><br>
                        <?php endif; ?>
                      </p>
                    </td>
                    <td><?= $items['qty'] ?></td>
                    <td><?= number_format($product['weight'], 0) ?> gr.</td>
                    <td>
                      <div class="d-flex justify-content-between">
                        <span>Rp. </span>
                        <span><?= number_format($product['price'], 2) ?></span>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex justify-content-between">
                        <span>Rp. </span>
                        <span><?= number_format(($product['price'] * $items['qty']), 2) ?></span>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
              <tr>
                <td colspan="4" class="text-right font-weight-bold">Sub Total : </td>
                <td class="d-flex justify-content-between">
                  <span>Rp. </span>
                  <span><?= number_format($subtotal, 2) ?></span>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-uppercase text-left"><strong>Kurir : </strong> <?= $data_order['courier'] . ' - ' . $data_order['package'] ?></td>
                <td><?= number_format($data_order['weight'], 0) ?> gr.</td>
                <td></td>
                <td class="d-flex justify-content-between">
                  <span>Rp. </span>
                  <span><?= number_format($data_order['shipping'], 2) ?></span>
                </td>
              </tr>
              <tr>
                <td colspan="4" class="text-left"><strong>Kode Referral : </strong><span class="font-italic"><?= $data_order['referral'] ?></span></td>
                <?php $discount =  $this->db->get_where('tabel_referral', ['code' => $data_order['referral']])->result_array()[0]; ?>
                <td class="text-right font-weight-bold">Diskon <?= $discount["discount"] ?>%</td>
              </tr>
              <tr>
                <td colspan="4" class="text-right font-weight-bolder">Total Payment : </td>
                <td class="d-flex justify-content-between">
                  <span>Rp. </span>
                  <span class="font-weight-bolder"><?= number_format($data_order['total'], 2) ?></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="text-center my-5">
      <a href="<?= base_url('merchandise') ?>" class="mx-2 btn btn-yellow">Kembali ke Katalog</a>
      <a href="<?= base_url('merchandise/tracking') ?>" class="mx-2 btn btn-green">Cek Status Pesanan</a>
    </div>
  </div>

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