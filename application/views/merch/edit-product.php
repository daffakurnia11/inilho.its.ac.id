<!-- Begin Page Content -->
<div class="container text-center text-gray-800">
  <h1 class="mb-3 ">Ini Lho ITS! Shorten Link</h1>

  <?= $this->session->flashdata('message'); ?>
  <?= $this->session->unset_userdata('message'); ?>
  <?= form_open_multipart(''); ?>
  <input type="hidden" name="id" value="<?= $tabel_product['id'] ?>">
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="product">Nama Produk</label>
        <input type="text" class="form-control" id="product" name="product" value="<?= $tabel_product['product'] ?>">
      </div>
      <?= form_error('product'); ?>
      <div class="form-group">
        <label for="price">Harga</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">Rp. </div>
          </div>
          <input type="text" class="form-control" id="price" name="price" value="<?= $tabel_product['price'] ?>">
        </div>
      </div>
      <?= form_error('price'); ?>
      <div class="form-group">
        <label for="category">Kategori</label>
        <select class="form-control" id="category" name="category">
          <option value="<?= $tabel_product['category'] ?>"><?= $tabel_product['category'] ?></option>
          <option value="Kaos dan Hoodie">Kaos dan Hoodie</option>
          <option value="Topi">Topi</option>
          <option value="Totebag">Totebag</option>
          <option value="Small Merch">Small Merch</option>
        </select>
      </div>
    </div>
    <div class="col-sm-6">
      <label>Gambar Produk</label>
      <div class="mb-1">
        <img src="<?= base_url('assets/img/products/') . $tabel_product['img'] ?>" alt="" style="max-width: 300px; border-radius: 10px;">
      </div>
      <div class="form-group">
        <div class="custom-file text-left">
          <input type="file" class="custom-file-input" id="img" name="img">
          <label class="custom-file-label" for="img">Upload Gambar!</label>
        </div>
      </div>
      <?= form_error('img'); ?>
    </div>
    <div class="mx-auto">
      <a href="<?= base_url('merchant/product'); ?>" class="btn btn-warning">Kembali ke Daftar Produk</a>
      <button type="submit" name="submit" class="btn btn-primary">Ubah Barang!</button>
    </div>
    </form>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->