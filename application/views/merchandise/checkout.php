<!-- CHECKOUT CONTENT -->
<div id="checkout-body" class=" mb-5" style="color: black;">
  <div class="checkout-header">
    <h1 class="checkout-title">Checkout</h1>
    <div class="checkout-form text-center container">
      <h4>Silahkan isi data diri kalian</h4>
      <?= form_open(); ?>
      <?php
      date_default_timezone_set("Asia/Jakarta");
      $no_order = date('dmY') . '-' . strtoupper(random_string('numeric', 3));
      ?>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="receiver">Nama Penerima</label>
            <input type="text" class="form-control" id="receiver" name="receiver">
            <?= form_error('receiver', '<p style="color: red">', '</p>'); ?>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="phone">No Telpon</label>
            <input type="text" class="form-control" id="phone" name="phone">
            <?= form_error('phone', '<p style="color: red">', '</p>'); ?>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="address">Alamat Penerima</label>
        <textarea class="form-control" id="addres" rows="3" name="address"></textarea>
        <?= form_error('address', '<p style="color: red">', '</p>'); ?>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="province">Provinsi</label>
            <select name="province" id="province" class="form-control"></select>
            <?= form_error('province', '<p style="color: red">', '</p>'); ?>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="city">Kota</label>
            <select name="city" id="city" class="form-control"></select>
            <?= form_error('city', '<p style="color: red">', '</p>'); ?>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="postal">Kode Pos</label>
            <input name="postal" id="postal" class="form-control">
            <?= form_error('postal', '<p style="color: red">', '</p>'); ?>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="courier">Ekspedisi</label>
            <select name="courier" id="courier" class="form-control">
              <option value="">--Pilih Kurir--</option>
              <option value="jne">JNE</option>
              <option value="tiki">TIKI</option>
              <option value="pos">Pos Indonesia</option>
            </select>
            <?= form_error('courier', '<p style="color: red">', '</p>'); ?>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="package">Paket</label>
            <select name="package" id="package" class="form-control"></select>
            <?= form_error('package', '<p style="color: red">', '</p>'); ?>
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
              if ($items['options']['Category'] != 'Bundle') {
                $product = $this->db->get_where('tabel_product', ['id' => $items['id']])->row_array();
              } else {
                $product = $this->db->get_where('tabel_bundle', ['id' => $items['id']])->row_array();
              }
              $weight += $items['qty'] * $product['weight'];
              ?>
              <!-- CART ITEMS -->
              <tr>
                <td scope="row"><?= $items['qty'] ?></td>
                <td class="text-left" width="30%">
                  <?= $items['options']['Category'] . ' ' . $items['name']; ?>
                  <br>
                  <?php if ($items['options']['Size'] != 'null') : ?>
                    <p class="text-uppercase">Size : <?= $items['options']['Size'] ?></p>
                  <?php endif; ?>
                  <?php if ($items['options']['Category'] == 'Bundle') : ?>
                    <p>
                      <?php if ($items['options']['Hoodie']) : ?>
                        <?= $items['options']['Hoodie'] ?>
                        <?= form_hidden('bundle-items' . 1, $items['options']['Hoodie']); ?><br>
                      <?php endif; ?>
                      <?php if ($items['options']['T-Shirt']) : ?>
                        <?= $items['options']['T-Shirt'] ?>
                        <?= form_hidden('bundle-items' . 2, $items['options']['T-Shirt']); ?><br>
                      <?php endif; ?>
                      <?php if ($items['options']['Totebag']) : ?>
                        <?= $items['options']['Totebag'] ?>
                        <?= form_hidden('bundle-items' . 3, $items['options']['Totebag']); ?><br>
                      <?php endif; ?>
                      <?php if ($items['options']['Dad Cap']) : ?>
                        <?= $items['options']['Dad Cap'] ?>
                        <?= form_hidden('bundle-items' . 4, $items['options']['Dad Cap']); ?><br>
                      <?php endif; ?>
                      <?php if ($items['options']['Keychain']) : ?>
                        <?= $items['options']['Keychain'] ?>
                        <?= form_hidden('bundle-items' . 5, $items['options']['Keychain']); ?><br>
                      <?php endif; ?>
                      <?php if ($items['options']['Bracelet']) : ?>
                        <?= $items['options']['Bracelet'] ?>
                        <?= form_hidden('bundle-items' . 6, $items['options']['Bracelet']); ?><br>
                      <?php endif; ?>
                      <?php if ($items['options']['Lanyard']) : ?>
                        <?= $items['options']['Lanyard'] ?>
                        <?= form_hidden('bundle-items' . 7, $items['options']['Lanyard']); ?><br>
                      <?php endif; ?>
                      <?php if ($items['options']['Stickerbook']) : ?>
                        <?= $items['options']['Stickerbook'] ?>
                        <?= form_hidden('bundle-items' . 8, $items['options']['Stickerbook']); ?>
                      <?php endif; ?>
                    </p>
                  <?php endif; ?>
                </td>
                <td>
                  <div>
                    <span>IDR</span>
                    <span><?= number_format($items['price'], 2, ',', '.'); ?></span>
                  </div>
                </td>
                <td><?= number_format(($items['qty'] * $product['weight']), 0, ',', '.'); ?> gr</td>
                <td>
                  <div class="d-flex justify-content-between">
                    <span>IDR</span>
                    <span><?= number_format($items['subtotal'], 2, ',', '.') ?></span>
                  </div>
                </td>
              </tr>
              <!-- END OF CART ITEMS -->
              <?php $i++; ?>
            <?php endforeach; ?>
            <tr>
              <td colspan="4" class="text-right">Total Harga : </td>
              <td class="font-weight-bold">
                <div class="d-flex justify-content-between">
                  <span>IDR</span>
                  <span id="total-price"><?= number_format($this->cart->total(), 2, ',', '.') ?></span>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="4" class="text-right">Total Berat : </td>
              <td class="text-right"><?= number_format($weight, 0, ',', '.') ?> gr</td>
            </tr>
            <tr>
              <td colspan="4" class="text-right">Ongkos Kirim : </td>
              <td class="font-weight-bold">
                <div class="d-flex justify-content-between">
                  <span>IDR</span>
                  <span id="cost-courier"></span>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <div class="input-group my-0">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Kode Referral : </span>
                  </div>
                  <input id="code_referral" name="referral" type="text" class="form-control" placeholder="Masukkan Kode Referral">
                </div>
              </td>
              <td>
                <button type="button" id="check-code" class="btn btn-blue">Cek Kode!</button>
              </td>
              <td class="text-right d-flex justify-content-end align-items-center h-100"><span>Potongan : </span></td>
              <td id="referral" class="font-weight-bold text-right"></td>
            </tr>
            <tr class="font-weight-bolder">
              <td colspan="4" class="text-right">Total Pembayaran : </td>
              <td>
                <div class="d-flex justify-content-between">
                  <span>IDR</span>
                  <span id="total-payment"></span>
                </div>
              </td>
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
          const numberFormatter = new Intl.NumberFormat('id-ID', "currency");

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
            $("#cost-courier").html(numberFormatter.format(shipping) + ',00');

            // Get Total Payment
            var payment = parseInt(shipping) + parseInt(<?= $this->cart->total() ?>);
            $('#total-payment').html(numberFormatter.format(payment) + ',00');

            var estimate = $("option:selected", this).attr("estimate");
            $('input[name=etd]').val(estimate + ' Hari');
            $('input[name=shipping]').val(shipping);
            $('input[name=total]').val(payment);
          })
        });
      </script>
    </div>
  </div>
  <!-- END OF CART LISTS -->