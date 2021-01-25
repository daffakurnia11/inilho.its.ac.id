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

  <!-- CHECKOUT CONTENT -->
  <div id="checkout-body" class=" mb-5" style="color: black;">
    <div class="checkout-header">
      <h1 class="checkout-title">Checkout</h1>
      <div class="checkout-form text-center container">
        <h4>Silahkan isi data diri kalian</h4>
        <?= form_open(); ?>
        <?php
        date_default_timezone_set("Asia/Jakarta");
        $no_order = date('Ymd') . '-' . strtoupper(random_string('numeric', 3));
        ?>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="receiver">Nama Penerima</label>
              <input type="text" class="form-control" id="receiver" name="receiver">
              <?= form_error('receiver'); ?>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="phone">No Telpon</label>
              <input type="text" class="form-control" id="phone" name="phone">
              <?= form_error('phone'); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="address">Alamat Penerima</label>
          <textarea class="form-control" id="addres" rows="3" name="address"></textarea>
          <?= form_error('address'); ?>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="province">Provinsi</label>
              <select name="province" id="province" class="form-control"></select>
              <?= form_error('province'); ?>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="city">Kota</label>
              <select name="city" id="city" class="form-control"></select>
              <?= form_error('city'); ?>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="postal">Kode Pos</label>
              <input name="postal" id="postal" class="form-control">
              <?= form_error('postal'); ?>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="courier">Kurir</label>
              <select name="courier" id="courier" class="form-control">
                <option value="">--Pilih Kurir--</option>
                <option value="jne">JNE</option>
                <option value="tiki">TIKI</option>
                <option value="pos">Pos Indonesia</option>
              </select>
              <?= form_error('courier'); ?>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="package">Paket</label>
              <select name="package" id="package" class="form-control"></select>
              <?= form_error('package'); ?>
            </div>
          </div>
        </div>
        <h4 class="my-4">Silahkan cek kembali keranjang belanja</h4>
        <div class="table-responsive checkout-cart">
          <table class="table" style="color: black;">
            <thead>
              <tr>
                <th scope="col">Jumlah</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Berat</th>
                <th scope="col">Harga</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $weight = 0;
              ?>
              <?php foreach ($this->cart->contents() as $items) : ?>
                <?php
                $product = $this->db->get_where('tabel_product', ['id' => $items['id']])->row_array();
                $weight += $items['qty'] * $product['weight'];
                ?>
                <!-- CART ITEMS -->
                <tr>
                  <td scope="row"><?= $items['qty'] ?></td>
                  <td class="text-left">
                    <?= $items['options']['Category'] . ' ' . $items['name']; ?>
                    <br>
                    <?php if ($items['options']['Size'] != 'null') : ?>
                      <p class="text-uppercase">Size : <?= $items['options']['Size'] ?></p>
                    <?php endif; ?>
                  </td>
                  <td>IDR <?= number_format($items['price'], 2); ?></td>
                  <td><?= number_format(($items['qty'] * $product['weight']), 0); ?> gr</td>
                  <td>IDR <?= number_format($items['subtotal'], 2) ?></td>
                </tr>
                <!-- END OF CART ITEMS -->
                <?php $i++; ?>
              <?php endforeach; ?>
              <tr>
                <td colspan="4" class="text-right">Total Harga : </td>
                <td class="font-weight-bold">Rp. <?= number_format($this->cart->total(), 2) ?></td>
              </tr>
              <tr>
                <td colspan="4" class="text-right">Total Berat : </td>
                <td><?= number_format($weight) ?> gr</td>
              </tr>
              <tr>
                <td colspan="4" class="text-right">Ongkos Kirim : </td>
                <td id="cost-courier" class="font-weight-bold"></td>
              </tr>
              <tr class="font-weight-bolder">
                <td colspan="4" class="text-right">Total Pembayaran : </td>
                <td id="total-payment"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- HIDDEN FORM -->
        <input type="hidden" name="no_order" value="<?= $no_order ?>">
        <input type="hidden" name="etd">
        <input type="hidden" name="weight" value="<?= $weight ?>">
        <input type="hidden" name="shipping">
        <input type="hidden" name="subtotal" value="<?= $this->cart->total() ?>">
        <input type="hidden" name="total">
        <!-- END OF HIDDEN FORM -->

        <!-- SAVE DETAILS ITEM -->
        <?php
        $i = 1;
        foreach ($this->cart->contents() as $items) {
          echo form_hidden('qty' . $i++, $items['qty']);
        } ?>
        <!-- END OFSAVE DETAILS ITEM -->
        <a href="<?= base_url('merchandise/viewcart') ?>" class="mx-2 my-2 btn btn-yellow">Kembali ke Keranjang</a>
        <button type="submit" name="submit" class="mx-2 my-2 btn btn-green">Pesan Sekarang!</button>
        </form>

        <!-- JAVASCRIPT DISPLAYING PROVINCE AND CITY IN OPTIONS FORM -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
          $(document).ready(function() {
            // Province Data
            $.ajax({
              url: '<?= base_url('shipping/province') ?>',
              type: "POST",
              success: function(result_province) {
                // console.log(result_province);
                $('#province').html(result_province);
              }
            });

            // City Data
            $('#province').on('change', function() {
              var get_province = $("option:selected", this).attr("id_province");

              $.ajax({
                url: '<?= base_url('shipping/city') ?>',
                type: "POST",
                data: 'id_province=' + get_province,
                success: function(result_city) {
                  // console.log(result_city);
                  $('#city').html(result_city);
                }
              });
            });

            // Courier Data
            $('#courier').on('change', function() {
              var get_courier = $('#courier').val();
              var get_city = $("option:selected", '#city').attr("id_city");
              // var get_city = $('#city').val();
              var get_weight = '<?= $weight ?>';

              $.ajax({
                url: '<?= base_url('shipping/courier') ?>',
                type: "POST",
                data: 'courier=' + get_courier + '&city=' + get_city + '&weight=' + get_weight,
                success: function(result_courier) {
                  // console.log(result_courier);
                  $('#package').html(result_courier);
                }
              });
            });

            // Cost Data
            $('#package').on('change', function() {
              var shipping = $("option:selected", this).attr("cost");
              $("#cost-courier").html('Rp. ' + shipping + ',00');


              // Get Total Payment
              var payment = parseInt(shipping) + parseInt(<?= $this->cart->total() ?>);
              $('#total-payment').html('Rp. ' + payment + ',00');

              var estimate = $("option:selected", this).attr("estimate");
              $('input[name=etd]').val(estimate + ' Hari');
              $('input[name=shipping]').val(shipping);
              $('input[name=total]').val(payment);
            });
          });
        </script>
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