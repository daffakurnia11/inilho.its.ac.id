<!-- Begin Page Content -->
<div class="container text-center" style="color: black;">
  <h1 class="mb-3 ">Ini Lho ITS! Official Merchandise</h1>
  <h3 class="mb-3 text-left">Pengaturan Kode Referral</h3>

  <?= $this->session->flashdata('message'); ?>
  <?= $this->session->unset_userdata('message'); ?>
  <form action="" method="post">
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="code">Kode Referral</label>
          <input type="text" class="form-control" id="code" name="code">
          <?= form_error('code', '<p style="color: red">', '</p>'); ?>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="forda">Asal Forda</label>
          <input type="text" class="form-control" id="forda" name="forda">
          <?= form_error('forda', '<p style="color: red">', '</p>'); ?>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="discount">Diskon</label>
          <div class="input-group">
            <input type="text" class="form-control" id="discount" name="discount">
            <div class="input-group-append">
              <span class="input-group-text">&#37;</span>
            </div>
          </div>
          <?= form_error('discount', '<p style="color: red">', '</p>'); ?>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-between">
      <?= $this->pagination->create_links(); ?>
      <button type="submit" name="submit" class="btn btn-primary">Tambah Kode!</button>
    </div>
  </form>
  <table class="mt-3 table table-hover bg-white" style="color: black;font-size: 15px;">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Forda</th>
        <th scope="col">Kode Referral</th>
        <th scope="col">Diskon</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($tabel_referral as $referral) : ?>
        <tr>
          <th scope="row"><?= $i; ?></th>
          <td><?= $referral["forda"]; ?></td>
          <td><?= $referral['code']; ?></td>
          <td><?= $referral['discount']; ?>&#37;</td>
          <td>
            <a href="<?= base_url('merch/deletereferral/' . $referral['id']) ?>" onclick="return confirm('Are you sure to delete the order?');"><i class="mx-2 fas fa-lg fa-trash-alt"></i></a>
            <a href="<?= base_url('merch/editreferral/' . $referral['id']) ?>"><i class="mx-2 fas fa-lg fa-edit"></i></a>
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