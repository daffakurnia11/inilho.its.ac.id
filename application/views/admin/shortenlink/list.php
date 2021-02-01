<!-- Begin Page Content -->
<div class="container text-center" style="color: black;">
  <h3 class="mb-3 mt-3">Shorten List</h3>
  <div class="d-flex justify-content-between text-center">
    <form action="" method="post">
      <div class="input-group mb-3" style="width: 400px;">
        <input type="text" class="form-control" placeholder="Masukkan Nama Link" name="keyword">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">Cari Link</button>
        </div>
      </div>
    </form>
    <?= $this->pagination->create_links(); ?>
  </div>
  <?php if (isset($total)) : ?>
    <h3 class="text-left">Total Pencarian : <?= $total; ?></h3>
  <?php endif; ?>
  <table class="table table-hover bg-white" style="font-size: 15px; color: black;">
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
                <?= ++$start; ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="option-menu">
                <a class="dropdown-item" href="<?= base_url(); ?>shortenlink/delete/<?= $link['id'] ?>" onclick="return confirm('Are you sure to delete the link?');">Delete</a>
                <a class="dropdown-item" href="<?= base_url(); ?>shortenlink/editlink/<?= $link['id'] ?>">Edit</a>
              </div>
            </div>
          </th>
          <td class="text-wrap"><?= $link["namalink"]; ?></td>
          <td class="text-break">
            <a href="<?= $link['urllink']; ?>"><?= $link['urllink']; ?></a>
          </td>
          <td class="text-nowrap">
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