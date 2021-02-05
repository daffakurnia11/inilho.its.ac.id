<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Invoice <?= $data_order['no_order']; ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style>
    p {
      padding: 0;
      margin: 0;
      font-size: 10pt;
    }
  </style>
</head>

<body>
  <div class="invoice-card p-2" style="border: 2px solid black; width: 700px;">
    <div class="invoice-content">
      <img class="invoice-logo ml-2" src="<?= base_url('assets/img/logo.png') ?>" alt="" width="100px">
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
        <table class="table mt-2" style="color: black; font-size: 10pt; padding: 0; margin: 0;">
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
              <td colspan="2" class="text-left"><strong>Kode Referral : </strong><span class="font-italic"><?= $data_order['referral'] ?></span></td>
              <td colspan="2" class="text-right">Bonus/Potongan : </td>
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
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
  window.print();
</script>

</html>