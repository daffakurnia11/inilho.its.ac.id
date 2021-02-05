<!-- INVOICE CONTENT -->
<div id="tracking-body" class="mb-5">
  <div id="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
    <?= $this->session->unset_userdata('flash'); ?>
  </div>
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
              <?= form_hidden('redirect_page', str_replace('index.php/', '', current_url())) ?>
              <div class="input-group">
                <input type="hidden" name="no_order" value="<?= $data_order['no_order'] ?>">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="transfer" id="transfer-input" aria-describedby="inputGroupFileAddon04">
                  <label id="transfer-file" class="custom-file-label text-left" for="transfer-input">Choose file</label>
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
        <div class="tracking-card container-sm" id="printArea">
          <div class="btn-area">
            <a href="<?= base_url('merchandise/print/') . $data_order['no_order']; ?>" class="btn-print"><i class="fas fa-print pr-2"></i>Cetak Invoice</a>
          </div>
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
                          <span class="font-weight-bold"> - <?= number_format($data_order["bonus"], 2, ',', '.') ?></span>
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
                      <span class="font-weight-bolder"><?= number_format($data_order['total'], 2, ',', '.') ?></span>
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


</html>