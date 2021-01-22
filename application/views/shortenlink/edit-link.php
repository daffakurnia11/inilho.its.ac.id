<!-- Begin Page Content -->
<div class="container text-center text-gray-800">
  <h1 class="mb-3 ">Ini Lho ITS! Shorten Link</h1>
  <h3>Edit Link</h3>
  <form action="" method="post">
    <input type="hidden" name="id" value="<?= $shorten_link['id'] ?>">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="namalink">Nama URL</label>
          <input type="text" class="form-control" id="namalink" placeholder="Example URL" name="namalink" value="<?= $shorten_link['namalink'] ?>">
          <?= form_error('namalink'); ?>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="shortenurl">Shorten Link</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">inilhoits.ac.id/</div>
            </div>
            <input type="text" class="form-control" id="shortenurl" placeholder="example" name="shortenurl" value="<?= $shorten_link['shortenurl'] ?>">
          </div>
          <?= form_error('shortenurl'); ?>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="urllink">URL Asli</label>
      <input type="url" class="form-control" id="urllink" placeholder="http://example.com" name="urllink" value="<?= $shorten_link['urllink'] ?>">
      <?= form_error('urllink'); ?>
    </div>
    <a href="<?= base_url('shortenlink'); ?>" class="btn btn-warning">Kembali ke List Shorten Link</a>
    <button type="submit" name="submit" class="btn btn-primary">Update LINK!</button>
  </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->