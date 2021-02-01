<!-- Begin Page Content -->
<div class="container text-center" style="color: black;">
  <h1 class="mb-3 ">Ini Lho ITS! Official Merchandise</h1>
  <h3 class="mb-3 text-left">Pengaturan Kode Referral</h3>

  <?= $this->session->flashdata('message'); ?>
  <?= $this->session->unset_userdata('message'); ?>
  <form action="" method="post">
    <input type="hidden" name="id" value="<?= $tabel_referral['id'] ?>">
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="code">Kode Referral</label>
          <input type="text" class="form-control" id="code" name="code" value="<?= $tabel_referral['code'] ?>">
          <?= form_error('code', '<p style="color: red">', '</p>'); ?>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="forda">Asal Forda</label>
          <input type="text" class="form-control" id="forda" name="forda" value="<?= $tabel_referral['forda'] ?>">
          <?= form_error('forda', '<p style="color: red">', '</p>'); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="discount">Diskon</label>
          <div class="input-group">
            <input type="text" class="form-control" id="discount" name="discount" value="<?= $tabel_referral['discount'] ?>">
            <div class="input-group-append">
              <span class="input-group-text">&#37;</span>
            </div>
          </div>
          <?= form_error('discount', '<p style="color: red">', '</p>'); ?>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="max">Potongan Maksimal</label>
          <div class="input-group">
            <div class="input-group-append">
              <span class="input-group-text">IDR</span>
            </div>
            <input type="text" class="form-control" id="max" name="max" value="<?= $tabel_referral['max'] ?>">
          </div>
          <?= form_error('discount', '<p style="color: red">', '</p>'); ?>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="free">Bonus Barang</label>
          <div class="input-group">
            <div class="input-group-append">
              <span class="input-group-text">Free</span>
            </div>
            <input type="text" class="form-control" id="free" name="free" value="<?= $tabel_referral['free'] ?>">
          </div>
          <?= form_error('discount', '<p style="color: red">', '</p>'); ?>
        </div>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Ubah Kode!</button>
  </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->