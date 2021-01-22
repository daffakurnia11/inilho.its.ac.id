<div class="container">

  <!-- Outer Row -->
  <div class="row d-flex align-items-center justify-content-center">

    <div class="col-lg-6">

      <div class="card o-hidden border-0 shadow-lg my-5 text-center">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="pt-5">
            <div class="text-center mb-4">
              <h1 style="color: #f6014f; font-size: 28px; font-weight: 600">Welcome To Dashboard</h1>
              <img src="<?= base_url() ?>assets/img/logo.png" alt="logo.png" width="80%">
            </div>
            <?php if ($this->session->flashdata('message')) : ?>
              <?= $this->session->flashdata('message'); ?>
              <?= $this->session->unset_userdata('message'); ?>
            <?php endif; ?>
            <form class="user m-4" action="<?= base_url('auth'); ?>" method="post">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="username" placeholder="Enter Username" name="username" value="<?= set_value('username') ?>">
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <button href="" type="submit" class="btn btn-primary btn-user btn-block mb-5">
                Login
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>