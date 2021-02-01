<!-- Begin Page Content -->
<div class="container text-center" style="color: black;">
  <h1 class="mb-3 ">Ini Lho ITS! Shorten Link</h1>

  <?= $this->session->flashdata('message'); ?>
  <?= $this->session->unset_userdata('message'); ?>
  <form action="" method="post">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="namalink">Nama URL</label>
          <input type="text" class="form-control" id="namalink" placeholder="Example URL" name="namalink">
          <?= form_error('namalink', '<p style="color: red">', '</p>'); ?>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="shortenurl">Shorten Link</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">inilhoits.ac.id/</div>
            </div>
            <input type="text" class="form-control" id="shortenurl" placeholder="example" name="shortenurl">
          </div>
          <?= form_error('shortenurl', '<p style="color: red">', '</p>'); ?>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="urllink">URL Asli</label>
      <input type="url" class="form-control" id="urllink" placeholder="http://example.com" name="urllink">
      <?= form_error('urllink', '<p style="color: red">', '</p>'); ?>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Buat LINK!</button>
  </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->