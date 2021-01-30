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
  <nav class="navbar navbar-expand-lg navbar-light position-absolute w-100 no-header" style="z-index: 1000">
    <div id="mobileNavContainer" class="d-flex justify-content-between order-0 order-lg-1 bp">
      <button id="navbar-button" class="navbar-toggler left" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand bp no-header" href="#">
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

  <!-- INVOICE CONTENT -->
  <div id="tracking-body" class="mb-5">
    <div class="tracking-header text-center">
      <h3>Cek Status dan Pesanan Kalian!</h3>
      <p>Silakan masukkan nomor invoice kalian untuk memeriksa status dan pesanan kalian.</p>
    </div>
    <div class="tracking-search container">
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukkan No Invoice" name="keyword" autofocus required>
          <div class="input-group-append">
            <input class="btn btn-blue" type="submit" name="submit">
          </div>
        </div>
      </form>
    </div>

    <div class="tracking-result">
      <?php if ($this->input->post('submit')) :  ?>
        <?php if ($data_order) : ?>
          <div class="container invoice-transfer text-center my-3">
            <h5>Status pemesanan kamu adalah <strong><?= $data_order['status'] ?></strong>.</h5>
            <?php if ($data_order['status'] == 'Belum Bayar') : ?>
              <h6>Silakan lakukan pembayaran dengan cara transfer pada berikut ini.</h6>
              <p>
                <strong>BCA :</strong> 8221052552 (Erlina Nabila Puteri)<br>
                <strong>BNI :</strong> 0842439585 (Amalia Lutvita Nia)<br>
                <strong>OVO :</strong> 081357259614 (M. Firman Fardiansyah)
              </p>
              <h6>Upload bukti pembayaran kamu pada kolom upload berikut.</h6>
              <div class="container text-center" style="max-width: 500px;">
                <?= form_open_multipart('merchandise/transferupload'); ?>
                <div class="input-group">
                  <input type="hidden" name="no_order" value="<?= $data_order['no_order'] ?>">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="transfer" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                    <label class="custom-file-label text-left" for="inputGroupFile04">Choose file</label>
                  </div>
                  <div class="input-group-append mb-4">
                    <button class="btn btn-blue" type="submit" id="inputGroupFileAddon04">Upload!</button>
                  </div>
                </div>
                <?= form_close() ?>
              </div>
            <?php elseif ($data_order['status'] == 'Ditolak') : ?>
              <h6 class="mb-4">Silakan hubungi kami terkait masalah dan keluhan anda. Terima kasih.</h6>
            <?php elseif ($data_order['status'] == 'Selesai') : ?>
              <h6 class="mb-4">Terima kasih telah melakukan pemesanan, kami tunggu <i>next order!</i></h6>
            <?php else : ?>
              <h6 class="mb-4">Silakan ditunggu atau hubungi kami lebih lanjut. Terima Kasih.</h6>
            <?php endif; ?>
          </div>
          <div class="tracking-card container-sm">
            <div class="tracking-content">
              <img class="tracking-logo ml-2" src="<?= base_url('assets/img/logo.png') ?>" alt="">
              <div class="tracking-details mt-2">
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
        <?php elseif (!$data_order) : ?>
          <div class="tracking-notfound container text-center">
            <h4>Pesanan tidak ditemukan!</h4>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <!-- CONTACT PERSON -->
    <div class="contact-person text-center my-5">
      <h1 class="cp-title">Ada Kendala?</h1>
      <p>Silakan hubungi kami untuk pertanyaan dan informasi selengkapnya. Kami tunggu ya!</p>
      <div class="container cp-content text-center">
        <div class="row ">
          <div class="col-sm-6">
            <a class="cp-link" href="https://line.me/R/ti/p/@679jhhqc" target="_blank">
              <i class="fab fa-3x fa-line"></i><br>
              <p>Admin Merchandise Ini Lho ITS! 2021</p>
            </a>
          </div>
          <div class="col-sm-6">
            <a class="cp-link" href="https://wa.me/6289531413410?text=Saya%20tertarik%20dengan%20Merchandise%20Ini%20Lho%20ITS!%202021" target="_blank">
              <i class="fab fa-3x fa-whatsapp-square"></i>
              <p>Admin Merchandise Ini Lho ITS! 2021</p>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- END OF CONTACT PERSON -->
    <div class="text-center my-5">
      <a href="<?= base_url('merchandise') ?>" class="mx-2 btn btn-yellow">Kembali ke Katalog</a>
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