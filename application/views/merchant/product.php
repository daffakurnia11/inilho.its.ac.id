<!-- Begin Page Content -->
<div class="container text-center text-gray-800">
  <h1 class="mb-3 ">Ini Lho ITS! Official Merchandise</h1>

  <?= $this->session->flashdata('message'); ?>
  <?= $this->session->unset_userdata('message'); ?>
  <?= form_open_multipart('merchant/product'); ?>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="product">Nama Produk</label>
        <input type="text" class="form-control" id="product" name="product">
      </div>
      <?= form_error('product'); ?>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="price">Harga</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">Rp. </div>
          </div>
          <input type="text" class="form-control" id="price" name="price">
        </div>
      </div>
      <?= form_error('price'); ?>
    </div>
    <div class="col-sm-6">
      <label>Gambar Produk</label>
      <div class="form-group">
        <div class="custom-file text-left">
          <input type="file" class="custom-file-input" id="img" name="img">
          <label class="custom-file-label" for="img">Choose file</label>
        </div>
      </div>
      <?= form_error('img'); ?>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="category">Kategori</label>
        <select class="form-control" id="category" name="category">
          <option value="">--Pilih Kategori--</option>
          <option value="Kaos dan Hoodie">Kaos dan Hoodie</option>
          <option value="Topi">Topi</option>
          <option value="Totebag">Totebag</option>
          <option value="Small Merch">Small Merch</option>
        </select>
      </div>
    </div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Tambah Barang!</button>
  </form>
  <h3 class="mb-3 mt-5">Daftar Produk</h3>
  <table class="table table-hover bg-white text-dark">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Kategory</th>
        <th scope="col">Harga</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($tabel_product as $product) : ?>
        <tr>
          <th class="align-middle" scope="row" width="7%"><?= $i; ?></th>
          <td class="align-middle"><?= $product['product'] ?></td>
          <td class="align-middle"><?= $product['category'] ?></td>
          <td class="align-middle">Rp. <?= $product['price'] ?>,00</td>
          <td class="align-middle" width="15%">
            <button class="btn btn-success" href="">
              <i class="fas fa-eye"></i>
            </button>
            <a class="btn btn-primary" href="<?= base_url(); ?>merchant/editproduct/<?= $product['id'] ?>">
              <i class="fas fa-edit"></i>
            </a>
            <a class="btn btn-danger" href="<?= base_url(); ?>merchant/deleteproduct/<?= $product['id'] ?>">
              <i class="fas fa-trash"></i>
            </a>
          </td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>

  </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->