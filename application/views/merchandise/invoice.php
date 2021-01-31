<!-- INVOICE CONTENT -->
<div id="invoice-body" class="mb-5">
  <div id="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
    <?= $this->session->unset_userdata('flash'); ?>
  </div>
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

                <td class="text-right font-weight-bold">Diskon <?= $discount["discount"] ?>%</td>
              <?php else : ?>
                <td class="text-right font-weight-bold">Tidak ada</td>

              <?php endif; ?>
            </tr>
            <tr>
              <td colspan="4" class="text-right font-weight-bolder">Total Payment : </td>
              <td class="d-flex justify-content-between">
                <span>IDR</span>
                <span class="font-weight-bolder"><?= number_format($data_order['total'], 2, ',', '.') ?></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="container invoice-transfer text-center mt-3">
    <h5>Status pemesanan kamu adalah <strong><?= $data_order['status'] ?></strong></h5>
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
        <?= form_hidden('redirect_page', str_replace('index.php/', '', current_url())) ?>
        <div class="input-group">
          <input type="hidden" name="no_order" value="<?= $data_order['no_order'] ?>">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="transfer" id="transfer-input" aria-describedby="inputGroupFileAddon04">
            <label id="transfer-file" class="custom-file-label text-left" for="transfer-input">Choose file</label>
          </div>
          <div class="input-group-append">
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
  <div class="text-center my-5">
    <a href="<?= base_url('merchandise') ?>" class="mx-2 btn btn-yellow">Kembali ke Katalog</a>
    <a href="<?= base_url('merchandise/tracking') ?>" class="mx-2 btn btn-green">Cek Status Pesanan</a>
  </div>
</div>