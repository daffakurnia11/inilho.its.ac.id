<!-- CART LISTS -->
<div id="cart-lists" class="container">
  <div id="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
    <?= $this->session->unset_userdata('flash'); ?>
  </div>
  <?= form_open('merchandise/update'); ?>
  <?php $i = 1; ?>
  <?php foreach ($this->cart->contents() as $items) : ?>
    <?php if ($items['options']['Category'] != 'Bundle') {
      $product = $this->db->get_where('tabel_product', ['id' => $items['id']])->row_array();
    } else {
      $product = $this->db->get_where('tabel_bundle', ['id' => $items['id']])->row_array();
    }
    ?>
    <!-- CART ITEMS -->
    <div class="cart-items">
      <div class="row cart-details">
        <?php if ($items['options']['Category'] != 'Bundle') :  ?>
          <div class="col-md-4 text-center">
            <img class="cart-images" src="<?= base_url('public/merchandise/img/product/') . $product['catalog'] ?>">
          </div>
        <?php endif; ?>
        <div class="col-md cart-desc d-flex flex-column jcc">
          <h5 class="mt-2"><?= $items['options']['Category'] . ' ' . $items['name']; ?></h5>
          <span class="form-group d-flex aic">
            <?= form_input(array('name' => $i . '[qty]', 'type' => 'number', 'class' => 'quantity form-control my-0', 'value' => $items['qty'], 'maxlength' => '3', 'min' => '1', 'max' => '20')); ?>
            <span class="mx-3">x IDR <?= number_format($items['price'], 2, ',', '.'); ?></span>
          </span>
          <div class="my-0">
            <button type="submit" class="btn btn-update mb-2">
              <i class="fas fa-fw fa-pen"></i> Ubah Jumlah Barang!
            </button>
            <a href="<?= base_url('merchandise/delete/') . $items['rowid'] ?>" class="btn btn-delete mb-2">
              <i class="fas fa-fw fa-trash"></i> Hapus Barang!
            </a>
          </div>
          <p class="text-muted">Berat : <?= number_format($product['weight'], 0, ',', '.') ?> gr</p>
          <p class="text-muted">Total : IDR <?= number_format($items['subtotal'], 2, ',', '.') ?></p>
          <?php if ($items['options']['Size'] != null) : ?>
            <p class="text-uppercase">Size : <?= $items['options']['Size'] ?></p>
          <?php endif; ?>
          <?php if ($items['options']['Category'] == 'Bundle') : ?>
            <p>
              <?php if ($items['options']['Hoodie']) : ?>
                <?= $items['options']['Hoodie'] ?> |
              <?php endif; ?>
              <?php if ($items['options']['T-Shirt']) : ?>
                <?= $items['options']['T-Shirt'] ?> |
              <?php endif; ?>
              <?php if ($items['options']['Totebag']) : ?>
                <?= $items['options']['Totebag'] ?> |
              <?php endif; ?>
              <?php if ($items['options']['Dad Cap']) : ?>
                <?= $items['options']['Dad Cap'] ?> |
              <?php endif; ?>
              <?php if ($items['options']['Keychain']) : ?>
                <?= $items['options']['Keychain'] ?> |
              <?php endif; ?>
              <?php if ($items['options']['Bracelet']) : ?>
                <?= $items['options']['Bracelet'] ?> |
              <?php endif; ?>
              <?php if ($items['options']['Lanyard']) : ?>
                <?= $items['options']['Lanyard'] ?> |
              <?php endif; ?>
              <?php if ($items['options']['Stickerbook']) : ?>
                <?= $items['options']['Stickerbook'] ?>
              <?php endif; ?>
            </p>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="dropdown-divider my-4"></div>
    <!-- END OF CART ITEMS -->
    <?php $i++; ?>
  <?php endforeach; ?>
  <?= form_close(); ?>
  <div class="cart-total text-right mb-3">
    <h4>Total : Rp. <?= number_format($this->cart->total(), 2, ',', '.') ?></h4>
  </div>
  <div class="text-center mb-5">
    <a href="<?= base_url('merchandise') ?>" class="mx-2 btn btn-yellow">Kembali ke Katalog</a>
    <a href="<?= base_url('merchandise/clear') ?>" class="mx-2 btn btn-red">Hapus Keranjang Belanja</a>
    <a href="<?= base_url('merchandise/checkout') ?>" class="mx-2 btn btn-green">Checkout</a>
  </div>
</div>
<!-- END OF CART LISTS -->
<script>
  window.load(function() {
    $('.navbar').addClass('no-header');
    $('.navbar-brand').addClass('no-header');
  });
</script>