<!-- Begin Page Content -->
<div class="container text-center" style="color: black;">
  <h4 class="mb-3 text-left">Pesanan : <?= $data_order['no_order'] ?></h4>

  <?= $this->session->flashdata('message'); ?>
  <?= $this->session->unset_userdata('message'); ?>

  <?= form_open('merch/editStatus/' . $data_order['no_order']); ?>
  <div class="invoice-details text-left mt-2">
    <div class="row">
      <div class="col">
        <p><strong>Nama :</strong> <?= $data_order['receiver']; ?></p>
        <p><strong>Alamat : </strong><?= $data_order['address'] ?></p>
        <p><strong>Kota : </strong><?= $data_order['city'] . ', ' . $data_order['province'] . ' - ' . $data_order['postal'] ?></p>
        <p><strong>No Telp : </strong><?= $data_order['phone'] ?></p>
      </div>
      <div class="col">
        <label for="status"><strong>Status :</strong></label>
        <select class="form-control" id="status" name="status">
          <option value="<?= $data_order['status'] ?>">Saat ini : <?= $data_order['status'] ?></option>
          <option value="Belum Bayar">Belum Bayar</option>
          <option value="Sudah Bayar">Sudah Bayar</option>
          <option value="Sedang Diproses">Sedang Diproses</option>
          <option value="Ditolak">Ditolak</option>
          <option value="Selesai">Selesai</option>
        </select>
        <?php if ($data_order['transfer'] != null) : ?>
          <div class="mt-2 ml-3">
            <a class="text-gray-800" style="text-decoration: none;" href="<?= base_url('public/merchandise/img/transfer/' . $data_order['transfer']) ?>" target="_blank"><strong>Klik untuk lihat bukti pembayaran</strong></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="table-responsive invoice-cart">
    <table class="table mt-2 table-hover bg-white" style="color: black; font-size: 15px;">
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
            <td><?= number_format($product['weight'], 0, ',', '.') ?> gr.</td>
            <td>
              <div class="d-flex justify-content-between">
                <span>IDR</span>
                <span><?= number_format($product['price'], 2, ',', '.') ?></span>
              </div>
            </td>
            <td>
              <div class="d-flex justify-content-between">
                <span>IDR</span>
                <span><?= number_format(($product['price'] * $items['qty']), 2, ',', '.') ?></span>
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
              <td><?= number_format($product['weight'], 0, ',', '.') ?> gr.</td>
              <td>
                <div class="d-flex justify-content-between">
                  <span>IDR</span>
                  <span><?= number_format($product['price'], 2, ',', '.') ?></span>
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-between">
                  <span>IDR</span>
                  <span><?= number_format(($product['price'] * $items['qty']), 2, ',', '.') ?></span>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        <tr>
          <td colspan="4" class="text-right font-weight-bold">Sub Total : </td>
          <td class="d-flex justify-content-between">
            <span>IDR</span>
            <span><?= number_format($subtotal, 2, ',', '.') ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="2" class="text-uppercase text-left"><strong>Kurir : </strong> <?= $data_order['courier'] . ' - ' . $data_order['package'] ?></td>
          <td><?= number_format($data_order['weight'], 0, ',', '.') ?> gr.</td>
          <td></td>
          <td class="d-flex justify-content-between">
            <span>IDR</span>
            <span><?= number_format($data_order['shipping'], 2, ',', '.') ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="4" class="text-left"><strong>Kode Referral : </strong><span class="font-italic"><?= $data_order['referral'] ?></span></td>
          <?php if (isset($data_order['referral'])) : ?>
            <?php $discount = $this->db->get_where('tabel_referral', ['code' => $data_order['referral']])->result_array()[0]; ?>
            <?php if (isset($discount['discount'])) : ?>
              <td class="text-right d-flex justify-content-between">
                <span>IDR</span>
                <span class="font-weight-bold"> - <?= $data_order["bonus"] ?></span>
              </td>
            <?php elseif (isset($discount['free'])) : ?>
              <td class="text-right font-weight-bold">Free <?= $discount['free'] ?></td>
            <?php endif; ?>
          <?php else : ?>
            <td class="text-right font-weight-bold">Tidak ada</td>
          <?php endif; ?>
        </tr>
        <tr>
          <td colspan="4" class="text-right font-weight-bolder">Total Payment : </td>
          <td class="d-flex justify-content-between">
            <span>IDR</span>
            <span><?= number_format($data_order['total'], 2, ',', '.') ?></span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <input type="hidden" name="no_order" value="<?= $data_order['no_order']; ?>">
  <input type="hidden" name="receiver" value="<?= $data_order['receiver']; ?>">
  <input type="hidden" name="phone" value="<?= $data_order['phone']; ?>">
  <input type="hidden" name="address" value="<?= $data_order['address']; ?>">
  <input type="hidden" name="province" value="<?= $data_order['province']; ?>">
  <input type="hidden" name="city" value="<?= $data_order['city']; ?>">
  <input type="hidden" name="postal" value="<?= $data_order['postal']; ?>">
  <input type="hidden" name="courier" value="<?= $data_order['courier']; ?>">
  <input type="hidden" name="package" value="<?= $data_order['package']; ?>">
  <input type="hidden" name="weight" value="<?= $data_order['weight']; ?>">
  <input type="hidden" name="shipping" value="<?= $data_order['shipping']; ?>">
  <input type="hidden" name="subtotal" value="<?= $data_order['subtotal']; ?>">
  <input type="hidden" name="total" value="<?= $data_order['total']; ?>">
  <a href="<?= base_url('merch') ?>" class="btn btn-warning mb-5">
    <i class="fas fa-edit pr-3"></i>Kembali
  </a>
  <button type="submit" class="btn btn-primary mb-5">
    <i class="fas fa-edit pr-3"></i>Ubah Status Pemesanan!
  </button>
  <?= form_close(); ?>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
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
  });
</script>