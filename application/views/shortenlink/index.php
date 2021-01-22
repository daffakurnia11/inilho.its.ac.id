<!-- Begin Page Content -->
<div class="container text-center text-gray-800">
  <h1 class="mb-3 ">Ini Lho ITS! Shorten Link</h1>

  <?= $this->session->flashdata('message'); ?>
  <?= $this->session->unset_userdata('message'); ?>
  <form action="" method="post">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="namalink">Nama URL</label>
          <input type="text" class="form-control" id="namalink" placeholder="Example URL" name="namalink">
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
            <input type="text" class="form-control" id="shortenurl" placeholder="example" name="shortenurl">
          </div>
          <?= form_error('shortenurl'); ?>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="urllink">URL Asli</label>
      <input type="url" class="form-control" id="urllink" placeholder="http://example.com" name="urllink">
      <?= form_error('urllink'); ?>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Buat LINK!</button>
  </form>
  <h3 class="mb-3 mt-5">Shorten List</h3>
  <table class="table table-hover bg-white text-dark">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama Link</th>
        <th scope="col">URL Asli</th>
        <th scope="col">Shorten Link</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($shorten_link as $link) : ?>
        <tr>
          <th scope="row">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" id="option-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= $i; ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="option-menu">
                <a class="dropdown-item" href="<?= base_url(); ?>shortenlink/delete/<?= $link['id'] ?>" onclick="return confirm('Are you sure to delete the link?');">Delete</a>
                <a class="dropdown-item" href="<?= base_url(); ?>shortenlink/editlink/<?= $link['id'] ?>">Edit</a>
              </div>
            </div>
          </th>
          <td class="text-nowrap"><?= $link["namalink"]; ?></td>
          <td class="text-break">
            <a href="<?= $link['urllink']; ?>"><?= $link['urllink']; ?></a>
          </td>
          <td>
            <a href="<?= base_url($link["shortenurl"]); ?>" target="_blank">inilho.its.ac.id/<?= $link["shortenurl"]; ?></a>
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