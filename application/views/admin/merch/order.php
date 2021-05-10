<!-- Begin Page Content -->
<div class="container text-center" style="color: black;">
  <h1 class="mb-3 ">Ini Lho ITS! Official Merchandise</h1>
  <h3 class="mb-3 text-left">Daftar Pesanan</h3>
  <div class="d-flex justify-content-between">
    <form action="" method="post">
      <div class="input-group mb-3" style="width: 400px;">
        <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="keyword">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">Cari!</button>
        </div>
      </div>
    </form>
    <?= $this->pagination->create_links(); ?>
  </div>
  <?= $this->session->flashdata('message'); ?>
  <?= $this->session->unset_userdata('message'); ?>
  <table class="table table-hover bg-white" style="color: black;font-size: 15px;">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Invoice</th>
        <th scope="col">Nama</th>
        <th scope="col">Kode</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($data_order as $items) : ?>
        <tr>
          <th scope="row"><?= $i; ?></th>
          <td><?= $items['no_order'] ?></td>
          <td><?= $items['receiver'] ?></td>
          <td>
            <?php if ($items['referral']) : ?>
              <?= $items['referral'] ?>
            <?php else : ?>
              Tidak ada
            <?php endif; ?>
          </td>
          <td><?= $items['status'] ?></td>
          <td>
            <a href="<?= base_url('merch/detail/') . $items['no_order'] ?>">
              <i class="mx-2 fas fa-lg fa-eye"></i>
            </a>
            <a href="<?= base_url('merch/delete/') . $items['no_order'] ?>" onclick="return confirm('Are you sure to delete the order?');">
              <i class="mx-2 fas fa-lg fa-trash"></i>
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