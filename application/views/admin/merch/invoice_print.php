<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
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
  <div class="invoice-card p-2" id="printArea" style="width: 600px; border: 2px solid black">
    <div class="invoice-content">
      <div class="d-flex justify-content-between">
        <img class="invoice-logo ml-2" src="<?= base_url('assets/img/logo.png') ?>" alt="" width="100px">
        <p class="mt-3">
          <strong>Invoice :</strong> <?= $data_order['no_order']; ?><br>
          <strong>Ekspedisi :</strong> <span class="text-uppercase"><?= $data_order['courier'] . '-' . $data_order['package']; ?></span>
        </p>
      </div>
      <div class="invoice-details mt-2">
        <div class="row">
          <div class="col-5">
            <h1 class="text-center" style="font-size: 12pt; text-decoration:underline;">Pengirim</h1>
            <p><strong>Nama :</strong> <?= $data_store['sender']; ?></p>
            <p><strong>Asal : </strong> <?= $data_store['city']; ?></p>
            <p><strong>No Telp :</strong> <?= $data_store['phone']; ?></p>
            <p><strong>Total Berat : </strong> <?= $data_order['weight'] ?> gram</p>
            <p><strong>Biaya : </strong> Rp. <?= number_format($data_order['shipping'], 2, ',', '.'); ?></p>
          </div>
          <div class="col-7" style="border-left: 2px solid lightgrey;">
            <h1 class="text-center" style="font-size: 12pt; text-decoration:underline;">Tujuan</h1>
            <p><strong>Nama :</strong> <?= $data_order['receiver']; ?></p>
            <p><strong>Alamat : </strong><?= $data_order['address'] ?>, <?= $data_order['city'] . ', ' . $data_order['province'] . ' - ' . $data_order['postal'] ?></p>
            <p><strong>No Telp : </strong><?= $data_order['phone'] ?></p>
          </div>
        </div>
      </div>
      <div class="table-responsive invoice-cart">
        <table class="table mt-2" style="color: black; font-size: 10pt; padding: 0; margin: 0;">
          <thead>
            <tr class="text-center">
              <th scope="col" class="p-1">Jumlah</th>
              <th scope="col" class="p-1">Nama Barang</th>
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
                <td class="p-1"><?= $items['qty'] ?></td>
                <td class="text-left p-1">
                  <strong><?= $items['product'] ?></strong><br>
                  <?php if ($items['notes'] != 'null') {
                    echo 'Size : ' . $items['notes'];
                  } ?>
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
                  <td class="p-1"><?= $items['qty'] ?></td>
                  <td class="text-left p-1">
                    <strong><?= $items['bundle'] ?></strong><br>
                    <p><?= 'Size : ' . $items['size']; ?></p>
                    <p>
                      <?php if ($items['hoodie']) : ?>
                        <?= $items['hoodie'] ?> |
                      <?php endif; ?>
                      <?php if ($items['tshirt']) : ?>
                        <?= $items['tshirt'] ?> |
                      <?php endif; ?>
                      <?php if ($items['totebag']) : ?>
                        <?= $items['totebag'] ?> |
                      <?php endif; ?>
                      <?php if ($items['cap']) : ?>
                        <?= $items['cap'] ?> |
                      <?php endif; ?>
                      <?php if ($items['keychain']) : ?>
                        <?= $items['keychain'] ?> |
                      <?php endif; ?>
                      <?php if ($items['bracelet']) : ?>
                        <?= $items['bracelet'] ?> |
                      <?php endif; ?>
                      <?php if ($items['lanyard']) : ?>
                        <?= $items['lanyard'] ?> |
                      <?php endif; ?>
                      <?php if ($items['stickerbook']) : ?>
                        <?= $items['stickerbook'] ?> |
                      <?php endif; ?>
                    </p>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
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