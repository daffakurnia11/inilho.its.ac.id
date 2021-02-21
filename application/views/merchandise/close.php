<!-- LANDING HEADER SECTION -->
<div id="close-header" class="section d-lg-flex aic">
  <div id="big-text" class="container d-lg-flex" style="z-index: 1; position: relative">
    <div class="merch-head row aic">
      <div class="col-lg-8">
        <h1 class="merch-title">
          Ini Lho ITS! 2021
        </h1>
        <img class="merch-official" src="<?= base_url('public/merchandise/img/') ?>merch-official.png">
        <h2 class="merch-subtitle">
          PRE ORDER TELAH DITUTUP!<br>Terimakasih telah menjadi bagian dari kami.<br>Tunggu kami di Ini Lho ITS! selanjutnya!
        </h2>
        <div class="text-center mt-3">
          <a href="<?= base_url('merchandise/tracking') ?>" class="btn btn-yellow mx-2 mb-2">Liat Pesananmu!</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END OF LANDING HEADER -->

<!-- CATALOG -->
<div id="merch-catalog">
  <div id="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
    <?= $this->session->unset_userdata('flash'); ?>
  </div>

  <!-- CONTACT PERSON -->
  <div class="contact-person text-center mb-5">
    <h1 class="cp-title">Ada Kendala?</h1>
    <p>Silakan hubungi kami untuk pertanyaan dan informasi selengkapnya. Kami tunggu ya!</p>
    <div class="container cp-content text-center">
      <div class="row ">
        <div class="col-sm-6">
          <a class="cp-link" href="https://line.me/R/ti/p/@679jhhqc" target="_blank">
            <i class="fab fa-3x fa-line"></i><br>
            <p>Admin Merchandise Ini Lho ITS! 2021</p>
          </a>
        </div>
        <div class="col-sm-6">
          <a class="cp-link" href="https://wa.me/6289531413410?text=Saya%20tertarik%20dengan%20Merchandise%20Ini%20Lho%20ITS!%202021" target="_blank">
            <i class="fab fa-3x fa-whatsapp-square"></i>
            <p>Admin Merchandise Ini Lho ITS! 2021</p>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- END OF CONTACT PERSON -->

</div>
<!-- END OF CATALOG -->