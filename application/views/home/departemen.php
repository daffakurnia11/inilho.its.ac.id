<link rel="stylesheet" href="<?= base_url() ?>public/home/departemen/assets/css/main.css" />
<?php foreach ($header as $u) { ?>
<!-- HEADER -->
<div id="departemen-header" class="d-flex aic" style="overflow-y:hidden">
  <img src="<?= base_url() ?>public/home/departemen/images/fasilitas-header.png" class="departemen-header-bg" alt="">
  <div class="container-fluid position-relative">
    <div class="row d-flex jcc aic">
      <div class="col-lg-5 col-md-12 text-white px-5">
        <p class="display-4 font-weight-bold responsive-size-72">
          DEPARTEMEN <?php echo $u->nama_departemen ?>
        </p>
        <p class="h3 text-justify responsive-size-20 font-weight-normal">
          <?php echo $u->deks_departemen ?>
        </p>
        <?php if($u->akreditasi):?>
        <p class="h3 responsive-size-20">Akreditasi</p>
        <p class="h3 font-weight-normal responsive-size-20" style="text-transform: uppercase"><?= $u->akreditasi?></p>
        <?php endif; ?>
      </div>
      <div class="col-lg-7 col-md-12 px-5">
        <img style="border: 4px solid black;" class="mw-100" src="<?= base_url() ?>public/assets/departemen/landing/<?php echo $u->foto_departemen ?>" alt="">
        <img class="panah" src="<?= base_url() ?>public/home/departemen/images/arrows.svg" alt="">
      </div>
    </div>
  </div>
</div>
<!-- END OF HEADER -->
<?php } ?>
<!-- PROFIL DEPARTEMEN -->
<div id="profil-departemen">
  <img class="departemen-profil-bg" src="<?= base_url() ?>public/home/departemen/images/departemen-profil.png" alt="">
  <div class="section-header">
    <div class="section-title responsive-size-72">
      PROFIL DEPARTEMEN
    </div>
  </div>
  <?php foreach ($profil as $pf) { ?>
  <div class="container d-flex aic">
    <div class="row my-3 w-100 d-flex jcc aic">
      <div class="col-lg-6 col-md-12">
        <div class="funfact-card w-100">
          <span class="color-square"></span>
          <span class="text-square flex-grow-1">
            <p>#FUNFACT</p>
          </span>
        </div>
        <div class="funfact-desc mt-4">
          <div class="row">
            <div class="col-12 px-0"><?= $pf->funfact; ?></div>
          </div>
        </div>
      </div>
    <?php if($pf->video || $pf->profil_lengkap): ?>
      <div class="col-lg-6 col-md-12 d-flex jcc flex-column aic mb-5">
        <?php if($pf->video): ?>
        <a class="btn-shadow p-3 my-3" target="_blank" href="<?= $pf->video; ?>">
          Lihat video profil departemen!
        </a>
        <?php endif;?>
        <?php if($pf->profil_lengkap): ?>
        <a role="button" href="<?= $pf->profil_lengkap ?>" target="_blank" class="btn-shadow mx-auto responsive-size-16 my-3" >
          Unduh Profil Lengkap!
        </a>
        <?php endif;?>
      </div>
    <?php endif;?>
    </div>
  </div>
  <?php } ?>
</div>
<!-- END OF PROFIL DEPARTEMEN -->

<!-- PROSPEK KERJA -->
<div id="prospek-kerja">
  <img class="section-bg" src="<?= base_url() ?>public/home/departemen/images/departemen-prospek.png" alt="">
  <div class="section-header">
    <div class="section-title responsive-size-72">
      PROSPEK KERJA
    </div>
  </div>
  <div class="section-body pb-5">
    <div class="container-fluid d-flex jcc aic flex-column position-relative">
      <div class="container-window w-75">
        <div class="container-window-topbar">
          <i class="topbar-dot"></i>
          <i class="topbar-dot"></i>
        </div>
        <div class="container-fluid d-flex jcc aic my-5 position-relative content-window">
          <!-- Carousel -->
          <div id="prospek-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php $i = 1;
              foreach ($prospek as $pk => $pkval) {
                  $active = ($pk == 0) ? 'active' : '';
                  if ($i % 3 == 1) {
                      echo '<div class="carousel-item ' . $active . '">';
                      echo '<div class="collector">';
                      echo '<div class="container">';
                      echo '<div class="row">';
                  }
              ?>

              <div class="col">
                <div class="mx-3 p-4">
                  <h3 class="btn-shadow responsive-size-16" style="text-transform: capitalize">
                    <?= $pkval['nama_prospek'] ?>
                  </h3>
                </div>
              </div>

              <?php
                                if ($i % 3 == 0 || $i == count($prospek)) {
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                $i++;
                            } ?>
            </div>
            <div class="mt-4 dots carousel-indicators w-100">
              <?php $i = 0;
                            foreach ($prospek as $pk => $pkval) {
                                $active = ($pk == 0) ? 'active' : '';
                            ?>
              <i data-target="#prospek-carousel" data-slide-to="<?= $pk ?>" class="dot-item <?= $active ?>"></i>
              <?php $i++;
                                if ($i == round(count($prospek) / 3)) break;
                            } ?>
            </div>
          </div>
          <!-- END OF Carousel -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END OF PROSPEK KERJA -->

<!-- ALUMNI -->
<div id="alumni">
  <img src="<?= base_url() ?>public/home/departemen/images/departemen-alumni.png" alt="" class="departemen-alumni-bg">
  <div class="section-header">
    <div class="section-title responsive-size-72">ALUMNI</div>
  </div>
  <div class="container position-relative">
    <?php if($alumni): ?>
    <ul class="m-3 p-4">
      <?php foreach ($alumni as $al=>$alvalue) {  ?>
      <li class="h3 responsive-size-30"><?= $alvalue->nama_alumni?></li>
      <?php } ?>
    </ul>
    <? else: ?>
    <div class="rounded bg-white w-100 h-100 text-center p-5 m-5" style="border: 3px solid black">
      <h3>
        Ingin tahu lebih lanjut? Silahkan hubungi departemen <?= $header[0]->nama_departemen ?>!
      </h3>
    </div>
    <? endif;?>
  </div>
</div>
<!-- END OF ALUMNI -->

<!-- PRESTASI -->
<div id="departemen-prestasi">
  <img class="section-bg" src="<?= base_url() ?>public/home/departemen/images/departemen-prestasi.png" alt="">
  <div class="section-header">
    <div class="section-title responsive-size-72">PRESTASI</div>
  </div>
  <div class="section-body category-body">
    <div id="prestasi-list">
      <?php foreach ($lomba as $lb) {  ?>
      <!-- CARD   -->
      <div class="prestasi-card container-window" data-toggle="modal" data-target="#modal<?= $lb->id_prestasidept; ?>">
        <div class="container-window-topbar">
          <i class="topbar-dot"></i>
          <i class="topbar-dot"></i>
        </div>
        <img class="w-100" src="<?= base_url() ?>public/assets/departemen/prestasi/<?= $lb->foto_lomba; ?>" alt="" />
        <div class="p-c-bot">
          <div class="w-100">
            <h4 class="font-weight-bold"><?= $lb->juara_lomba; ?></h4>
            <p><?= $lb->nama_lomba; ?></p>
            <p><?= $lb->tanggal_lomba ?></p>
          </div>
        </div>
      </div>
      <!-- END OF CARD    -->
      <?php } ?>
    </div>
  </div>
</div>
<!-- END OF PRESTASI -->

<?php foreach ($lomba as $lb) {  ?>
<!-- MODAL PRESTASI-->
<div class="modal fade" id="modal<?= $lb->id_prestasidept; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modalll">
        <div class="modal-content-container">
          <div class="left">
            <!-- <img src="<?= base_url() ?>public/home/departemen/images/modal-rectangle.png" class="modal-bg" /> -->
            <!-- CONTENT IMAGE  -->
            <img class="img-fluid w-100" src="<?= base_url() ?>public/assets/departemen/prestasi/<?= $lb->foto_lomba; ?>" alt="" />
          </div>
          <div class="right m-4">
            <h3><?= $lb->juara_lomba; ?> [<?= $lb->nama_lomba; ?>]</h3>
            <p>
              <?= $lb->deskripsi_lomba; ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END OF MODAL PRESTASI -->
<?php } ?>

<div id="laboratorium" class="section">
  <div class="section-header">
    <div class="section-title responsive-size-72">LABORATORIUM</div>
  </div>

  <img class="section-bg" src="<?= base_url() ?>public/home/departemen/images/departemen-laboratorium.png">
  <div class="section-body">
    <div class="container container-window mb-3">
      <div class="container-window-topbar">
        <i class="topbar-dot"></i>
        <i class="topbar-dot"></i>
      </div>

      <div id="laboratorium-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
          <?php
                    foreach ($lab as $key => $val) {
                        $active = ($key == 0) ? 'active' : ''; ?>
          <div class="carousel-item <?= $active ?>">
            <!-- slide 1 -->
            <img class="w-100" src="<?= base_url() ?>public/assets/departemen/lab/<?= $val['foto_lab']; ?>" alt="">
            <div class="mx-3">
              <div class="mt-3 mb-4 mb-lg-0">
                <br>
                <h2 class="font-weight-bold responsive-size-32">
                  <?= $val['nama_lab']; ?>
                </h2>
                <p class="responsive-size-16">
                  <?= $val['deskripsi_lab']; ?>
                </p>
                <div class="col-12 col-lg-7 mb-4 mb-lg-0 col">
                </div>
              </div>
              <div href="#laboratorium-carousel" role="button" data-slide="next" class="row panah-laboratorium">
                <img src="<?= base_url() ?>public/home/departemen/images/arrows.svg" alt="">
              </div>
            </div>
            <!-- end of slide 1 -->
          </div>
          <?php } ?>
        </div>
        <div class="dots carousel-indicators mb-5">
          <?php foreach ($lab as $key => $val) {
                        $active = ($key == 0) ? 'active' : ''; ?>
          <i data-target="#laboratorium-carousel" data-slide-to="<?= $key ?>" class="dot-item <?= $active ?>"></i>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var base_url = '<?php echo base_url() ?>';
</script>
<script src="<?= base_url() ?>public/home/assets/js/main.js"></script>
<script src="<?= base_url() ?>public/home/departemen/assets/js/departemen.js"></script>