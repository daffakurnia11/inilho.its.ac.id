<!-- Begin Page Content -->
<div class="container text-center text-gray-800">
  <h3 class="mb-3 text-left">Daftar Pesanan</h3>

  <?= $this->session->flashdata('message'); ?>
  <?= $this->session->unset_userdata('message'); ?>
  <table class="table table-hover bg-white text-dark">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Invoice</th>
        <th scope="col">Nama</th>
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
          <td><?= $items['status'] ?></td>
          <td>
            <a href="<?= base_url('merch/detail/') . $items['no_order'] ?>" class="btn btn-primary my-0">
              <i class="fas fa-eye"></i>
            </a>
            <a href="<?= base_url('merch/delete/') . $items['no_order'] ?>" class="btn btn-danger my-0" onclick="return confirm('Are you sure to delete the order?');">
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
<script>
  $(document).ready(function() {
    // Province Data
    $.ajax({
      url: '<?= base_url('shipping/province') ?>',
      type: "POST",
      success: function(result_province) {
        // console.log(result_province);
        $('#province').html(result_province);
      }
    });

    // City Data
    $('#province').on('change', function() {
      var get_province = $("option:selected", this).attr("id_province");

      $.ajax({
        url: '<?= base_url('shipping/city') ?>',
        type: "POST",
        data: 'id_province=' + get_province,
        success: function(result_city) {
          // console.log(result_city);
          $('#city').html(result_city);
        }
      });
    });
  });
</script>