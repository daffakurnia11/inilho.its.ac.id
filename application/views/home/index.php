<!-- LANDING HEADER SECTION -->
<div id="header" class="section">
  <img id="landing-header" src="<?= base_url() ?>public/home/landing/assets/images/landing-header.png" />
  <div id="big-text" class="d-flex jcc aic container-fluid" style="z-index: 1; position: relative">
    <div class="row vh-100">
      <div class="col d-flex flex-column jcc p-5">
        <h1 class="font-weight-bold text-white display-3 mb-4 responsive-size-72">
          Kenali Dirimu, Kenali Masa Depanmu.
        </h1>
        <p class="text-white mb-4 responsive-size-16">
          Ini lho ITS! membantu calon mahasiswa baru ITS mengetahui lebih
          dalam mengenai ITS!
        </p>
        <form id="form_search" action="<?php echo site_url('home/search');?>" method="GET">
          <div id="searchBox" class="d-flex overflow-hidden">
            <div class="icon-container">
              <button type="submit" class="btn fa fa-search font-weight-bold m-0 p-0 h-100"></button>
            </div>
            <input type="text" name="departemen" id="departemen" class="w-100" placeholder="Cari Departemen..." />
          </div>
        </form>
      </div>

      <div class="col jcc aic d-none d-lg-flex">
        <img class="w-100" src="<?= base_url() ?>public/home/assets/images/logo.png" />
      </div>
    </div>
  </div>
</div>
<!-- END OF LANDING HEADER -->

<!-- VLOG SERIES --><br /><br />
<div id="vlog-series" class="section">
  <div class="container d-flex">
    <div class="mr-2">
      <img class="img-fluid w-100" src="<?= base_url() ?>public/home/landing/assets/images/Vlog%20Series.png" />
      <img class="img-fluid w-100" style="width: 50% !important; float: right" src="<?= base_url() ?>public/home/landing/assets/images/Rectangle%20101.png" />
    </div>
    <div class="">
      <div style="position: relative">
        <div class="d-flex flex-column w-100" style="position: absolute; z-index: 952; right: 0;">
          <img class="ml-auto" style="width:10%; margin-right: -5%; margin-top: -5%" src="<?= base_url() ?>public/home/landing/assets/images/Asset%2034.png" />
          <img class="ml-auto" style="width:7%; margin-right: -3%; margin-top: 5%" src="<?= base_url() ?>public/home/landing/assets/images/Asset%2034.png" />
        </div>
        <a class="d-flex jcc aic btn-shadow p-1 rounded" href="https://www.youtube.com/watch?v=_Jk6yqgjU1M&list=PLprmAgZ2qyRANPVhWIiCfJOrd_HCDGGEB">
          <i class="fa fa-play-circle h1 text-white" style="position: absolute; z-index: 951"></i>
          <img class="img-fluid w-100 rounded border" src="http://i3.ytimg.com/vi/_Jk6yqgjU1M/maxresdefault.jpg" />
        </a>
        <div class="w-100" style="position: absolute; z-index: 952; left:0">
          <img class="img-fluid" style="object-fit:contain; max-height: 5rem; width: 10%; margin-top: -2rem; margin-left: -5%" src="<?= base_url() ?>public/home/landing/assets/images/Asset%201@4x%202.png" />
        </div>
      </div>

    </div>
    <div class="ml-5 mt-auto">
      <img class="img-fluid w-100 mb-2" src="<?= base_url() ?>public/home/landing/assets/images/See%20more!.png" />
      <img class="img-fluid w-100" src="<?= base_url() ?>public/home/landing/assets/images/Rectangle%20102.png" />
    </div>
  </div>
</div>
<!-- END OF VLOG SERIES -->

<!-- ABOUT SECTION -->
<div id="about" class="section">
  <img class="section-bg" src="<?= base_url() ?>public/home/landing/assets/images/about.png" />
  <div class="section-header">
    <h1 class="section-title responsive-size-72">about</h1>
    <p class="section-subtitle responsive-size-16">
      "Kenali Dirimu, Kenali Masa Depanmu, Di INI LHO ITS!" <br />Ini Lho
      ITS membantu calon mahasiswa baru ITS menemukan jurusan yang sesuai
      minat & bakat yang dimiliki nya. Inilho ITS Memiliki serangkaian event
      yang terdiri dari: talkshow inspiratif, open campus, welcome, dan lainnya!
    </p>
  </div>

  <div class="section-body">
    <div class="container container-body">
      <!-- Carousel -->
      <div class="row">
        <div id="about-carousel" data-interval="false" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <!-- slide 1 -->
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-5 mb-4 mb-lg-0 d-flex jcc aic">
                    <img class="carousel-slide-image w-100" style="object-fit: contain;" src="<?= base_url() ?>public/home/landing/assets/images/about/ilust1.png" />
                  </div>
                  <div class="col-12 col-lg-7">
                    <h2 class="font-weight-bold text-right mb-3 responsive-size-32">
                      TALKSHOW INSPIRATIF
                    </h2>
                    <p class="text-justify mb-3 responsive-size-16">
                      INI LHO ITS! 2021 kali ini mengadakan sebuah talkshow virtual interaktif dengan mengundang alumni-alumni inspiratif pada bidangnya masing-masing. Talkshow ini membawakan dua sub-judul yaitu:
                      <br>
                      <strong>“Dinamika Dunia Kerja—Kondisi, Tantangan, dan Cara Efektif Mempersiapkannya Sejak Kuliah”</strong>
                      <br>
                      <strong>“Mempersiapkan dunia kuliah dengan mengenali diri guna bekal sukses di masa muda”</strong>
                      <br>
                      Melalui talkshow ini seluruh peserta akan mendapatkan gambaran mengenai kehidupan perkuliahan dan nilai-nilai yang perlu dibangun untuk menunjang ke dunia keprofesian.
                      <div class="btn-shadow">6 Februari 2021</div>
                    </p>
                    <img href="#about-carousel" role="button" data-slide="next" src="<?= base_url() ?>public/home/assets/images/chevron-group.svg" class="mb-5" style="float: right; height: 25%; width: 25%" />
                  </div>
                </div>
              </div>
              <!-- end of slide 1 -->
            </div>

            <div class="carousel-item">
              <!-- slide 2 -->
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-5 mb-4 mb-lg-0 d-flex jcc aic d-flex jcc aic">
                    <img class="carousel-slide-image w-100" style="object-fit: contain;" src="<?= base_url() ?>public/home/landing/assets/images/about/ilust2.png" />
                  </div>
                  <div class="col-12 col-lg-7">
                    <h2 class="font-weight-bold text-right mb-3 responsive-size-32">
                      OPEN CAMPUS - TALKSHOW RUANG MIMPI
                    </h2>
                    <p class="text-justify mb-3 responsive-size-16">
                      Open Campus INI LHO ITS! tahun ini mengusung tema “Ruang Mimpi” yang akan memberikan informasi mengenai pengenalan departemen-departemen yang ada di ITS dengan konsep online Talkshow Interaktif.
                      Open Campus tahun ini akan memberikan gambaran mengenai pengenalan keilmuan, fasilitas, prospek kerja, dan prestasi-prestasi membanggakan yang dimiliki oleh tiap Departemen.
                      <div class="btn-shadow">7, 13, 14 Februari 2021</div>
                    </p>
                    <img class="mb-5" style="float: right; height: 25%; width: 25%" href="#about-carousel" role="button" data-slide="next" src="<?= base_url() ?>public/home/assets/images/chevron-group.svg" />
                  </div>
                </div>
              </div>
              <!-- end of slide 2 -->
            </div>
            <div class="carousel-item">
              <!-- slide 3 -->
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-5 mb-4 mb-lg-0 d-flex jcc aic">
                    <img class="carousel-slide-image w-100" style="object-fit: contain;" style="object-fit: contain;" src="<?= base_url() ?>public/home/landing/assets/images/about/ilust5.png" />
                  </div>
                  <div class="col-12 col-lg-7">
                    <h2 class="font-weight-bold text-right mb-3 responsive-size-32">
                      WELCOME TRY OUT
                    </h2>
                    <p class="text-justify mb-3 responsive-size-16">
                      Pada tahun ini, Welcome Ini Lho ITS! atau acara eventual Ini Lho ITS! yang diselenggarakan di berbagai daerah di Indonesia, akan segera hadir dengan salah satu kegiatan utamanya yakni Try Out UTBK online Nasional.
                      Dengan semangat menyebarluaskan semangat pendidikan perguruan tinggi ke seluruh wilayah nusantara oleh para rekan Forum Daerah ITS, diharapkan para siswa SMA/sederajat Indonesia dapat mengasah dan mengukur kemampuan dirinya dalam persiapan menghadapi ujian masuk perguruan tinggi serta semakin siap dan paham mengenai gambaran kehidupan perkuliahan yang akan dihadapi<div class="btn-shadow">20-21, 27-28 Februari 2021</div>
                    </p>
                    <img href="#about-carousel" role="button" data-slide="next" src="<?= base_url() ?>public/home/assets/images/chevron-group.svg" class="mb-5" style="float: right; height: 25%; width: 25%" />
                  </div>
                </div>
              </div>
              <!-- end of slide 3 -->
            </div>
            <div class="carousel-item">
              <!-- slide 4 -->
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-5 mb-4 mb-lg-0 d-flex jcc aic">
                    <img class="carousel-slide-image w-100" style="object-fit: contain;" src="<?= base_url() ?>public/home/landing/assets/images/about/ilust4.png" />
                  </div>
                  <div class="col-12 col-lg-7">
                    <h2 class="font-weight-bold text-right mb-3 responsive-size-32">
                      VISIT
                    </h2>
                    <p class="text-justify mb-3 responsive-size-16">
                      Dengan membawa dan menyebarkan semangat perguruan tinggi, Visit Ini Lho ITS! atau roadshow pengenalan ITS ke sekolah-sekolah (SMA/sederajat) di berbagai daerah di Indonesia hadir dengan nuansa virtual yang akan dilaksanakan oleh para forum daerah ITS.
                      <div class="btn-shadow">1-19 Februari 2021</div>
                    </p>
                    <img href="#about-carousel" role="button" data-slide="next" src="<?= base_url() ?>public/home/assets/images/chevron-group.svg" class="mb-5" style="float: right; height: 25%; width: 25%" />
                  </div>
                </div>
              </div>
              <!-- end of slide 4 -->
            </div>
            <div class="carousel-item">
              <!-- slide 5 -->
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-5 mb-4 mb-lg-0 d-flex jcc aic">
                    <img class="carousel-slide-image w-100" style="object-fit: contain;" src="<?= base_url() ?>public/home/landing/assets/images/about/ilust3.png" />
                  </div>
                  <div class="col-12 col-lg-7">
                    <h2 class="font-weight-bold text-right mb-3 responsive-size-32">
                      VIRTUAL EXPO
                    </h2>
                    <p class="text-justify mb-3 responsive-size-16">
                      Semangat membawa perubahan, INI LHO ITS! 2021 memberikan experience baru dengan mengadakan sebuah pameran virtual berisi pengenalan ITS yang mencakup departemen dan lingkungan di dalamnya.
                      <div class="btn-shadow">Coming real soon!</div>
                    </p>
                    <img href="#about-carousel" role="button" data-slide="next" src="<?= base_url() ?>public/home/assets/images/chevron-group.svg" class="mb-5" style="float: right; height: 25%; width: 25%" />
                  </div>
                </div>
              </div>
              <!-- end of slide 5 -->
            </div>
            <div class="carousel-item">
              <!-- slide 6 -->
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-5 mb-4 mb-lg-0 d-flex jcc aic">
                    <img class="carousel-slide-image w-100" style="object-fit: contain;" src="<?= base_url() ?>public/home/landing/assets/images/about/ilust6.png" />
                  </div>
                  <div class="col-12 col-lg-7">
                    <h2 class="font-weight-bold text-right mb-3 responsive-size-32">
                      SAYEMBARA KREASI TIKTOK
                    </h2>
                    <p class="text-justify mb-3 responsive-size-16">
                      Inovasi baru di tahun ini! Ini Lho ITS! 2021 hadir dengan sebuah sayembara kreasi tiktok yang mengusung tema "Wadah Kreativitas dan Kontribusi Generasi Muda di tengah Masa New Normal." Tema ini dipilih dengan harapan agar para generasi muda tetap menjaga kreativitas dan produktivitasnya dengan cara tetap berkarya walaupun dari rumah. Selain itu, dengan adanya sayembara ini, diharapkan dapat menjadi penyemangat bagi seluruh siswa maupun mahasiswa untuk menghasilkan karya-karya terbaiknya serta menjadi seseorang yang dapat berkontribusi aktif dan bermanfaat untuk masyarakat.
                      <div class="btn-shadow">1-19 Februari 2021</div>
                    </p>
                    <img href="#about-carousel" role="button" data-slide="next" src="<?= base_url() ?>public/home/assets/images/chevron-group.svg" class="mb-5" style="float: right; height: 25%; width: 25%" />
                  </div>
                </div>
              </div>
              <!-- end of slide 6 -->
            </div>
          </div>

          <div class="dots carousel-indicators">
            <i data-target="#about-carousel" data-slide-to="0" class="dot-item active"></i>
            <i data-target="#about-carousel" data-slide-to="1" class="dot-item"></i>
            <i data-target="#about-carousel" data-slide-to="2" class="dot-item"></i>
            <i data-target="#about-carousel" data-slide-to="3" class="dot-item"></i>
            <i data-target="#about-carousel" data-slide-to="4" class="dot-item"></i>
            <i data-target="#about-carousel" data-slide-to="5" class="dot-item"></i>
          </div>
        </div>
      </div>

      <!-- END OF Carousel -->
    </div>
  </div>
</div>
<!-- END OF ABOUT -->

<!-- FAKULTAS -->
<div id="fakultas" class="section">
  <div class="section-header">
    <h1 class="section-title responsive-size-72">Fakultas</h1>
    <div class="container d-flex jcc aic mb-4">
      <div class="row pill-container">
        <?php
                    $i = 1;
                    $fakultas = $this->dept_model->all_fakultas();
                    foreach ($fakultas as $fks => $fk) { 
                    $active = ($fks == 0) ? 'active' : '';    
                        ?>
        <!-- Loop aja onclicknya  -->
        <div id="fakultas-btn-<?= $i ?>" class="col pill-item responsive-size-16-pill fakultas-btn <?= $active ?>" onclick="fakultasToggle(<?= $i ?>)">
          <?= $fk['nama_fakultas']?>
        </div>
        <?php $i++; } ?>
      </div>
    </div>
  </div>

  <div class="section-body">
    <div class="container container-body">
      <!-- Carousel -->
      <div class="row">
        <?php
            $i = 1;
            $fakultas = $this->dept_model->all_fakultas();
            foreach ($fakultas as $fks => $fk) { 
            $active = ($fks == 0) ? 'active' : '';    
        ?>
        <div id="fakultas-carousel-<?= $i ?>" data-interval="false" class="fakultas-carousel carousel slide <?= $active ?>" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <!-- slide 1 -->
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-5 mb-4 mb-lg-0 d-flex jcc aic">
                    <img class="carousel-slide-image w-100" style="object-fit: contain" src="<?= base_url() ?>public/assets/fakultas/<?= $fk['photos_fakultas'] ?>" />
                  </div>

                  <div class="col-12 col-lg-7">
                    <h2 class="font-weight-bold text-right mb-3 responsive-size-32">
                      <?= $fk['nama_fakultas'] ?>
                    </h2>
                    <p class="text-justify mb-3 responsive-size-16">
                      <?= $fk['deskripsi_fakultas'] ?>
                    </p>
                    <div class="w-100 d-flex py-3">
                      <button data-target="#fakultas-carousel-<?= $i ?>" data-slide-to="1" class="btn-shadow ml-auto responsive-size-16">
                        Lihat Departemen
                      </button>
                      <?php if($fk['video_fakultas']): ?>
                      <!-- <?php 
                      // <button class="btn-shadow ml-auto responsive-size-16" data-toggle="modal" data-target="#fakultasTIRS<?= $fk['id_fakultas'] ?>">
                      // Lihat Video Fakultas
                      // </button>
                      ?> -->
                      <a role="button" target="_blank" href="<?= $fk['video_fakultas'] ?>" class="btn-shadow ml-auto responsive-size-16">
                        Lihat Video Fakultas
                      </a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end of slide 1 -->
            </div>
            <div class="carousel-item">
              <!-- slide 2 -->
              <div class="container">
                <div class="row">
                  <div class="w-100 d-flex py-3">
                    <button data-target="#fakultas-carousel-<?= $i ?>" data-slide-to="0" class="btn-shadow mr-auto responsive-size-16">
                      <i class="fa fa-arrow-left responsive-size-16"></i>
                      Kembali ke Fakultas
                    </button>
                  </div>
                </div>
                <div class="row departemen-container">
                  <?php
                                            $fkbyid = $this->dept_model->fkbyid($fk['id_fakultas']);
                                            foreach ($fkbyid as $fid => $fd) {
                                        ?>
                  <a class="col departemen-item" href="<?= base_url() ?>home/departemen/<?= $fd['id_departemen'] ?>">
                    <div class="overlay"></div>
                    <span class="h3 responsive-size-28"><?= $fd['nama_departemen'] ?></span>
                    <!-- <img src="<?= base_url() ?>public/assets/departemen/icons/<?= $fd['icons_departemen'] ?>" alt="" /> -->
                  </a>
                  <?php } ?>
                </div>
              </div>
              <!-- end of slide 2 -->
            </div>
          </div>

          <div class="dots carousel-indicators">
            <i data-target="#fakultas-carousel-<?= $i ?>" data-slide-to="0" class="dot-item active"></i>
            <i data-target="#fakultas-carousel-<?= $i ?>" data-slide-to="1" class="dot-item"></i>
          </div>
        </div>
        <?php $i++; } ?>
      </div>
      <!-- END OF Carousel -->
    </div>
  </div>
</div>
<!-- END OF FAKULTAS -->

<!-- PRESTASI -->
<style> #prestasi{display:none;} </style>

<div id="prestasi" class="section">
  <div class="section-header">
    <div class="section-title responsive-size-72">Prestasi</div>
  </div>

  <img class="section-bg" src="<?= base_url() ?>public/home/landing/assets/images/fasilitas(1).png" />
  <div class="section-body">
    <div class="container container-window">
      <div class="container-window-topbar">
        <i class="topbar-dot"></i>
        <i class="topbar-dot"></i>
      </div>

      <div id="prestasi-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
          <?php
                        $prestasi = $this->dept_model->prestasi();
                        foreach ($prestasi as $key => $value) {
                            $active = ($key == 0) ? 'active' : ''; ?>
          <div class="carousel-item <?= $active ?>">
            <!-- slide 1 -->
            <img class="w-100" src="<?php echo base_url(); ?>public/assets/prestasi/<?= $value['foto_land_prestasi']; ?>" alt="" />
            <div class="container">
              <div class="row">
                <div class="col-12 col-lg-7 mb-4 mb-lg-0 col">
                  <br />
                  <h2 class="font-weight-bold responsive-size-32">
                    <?= $value['nama_land_prestasi']; ?>
                  </h2>
                  <p class="responsive-size-16">
                    "<?= $value['deks_land_prestasi']; ?>"
                  </p>
                </div>
                <div class="col-4 offset-4 offset-lg-2 col-lg-3">
                  <br />
                  <div class="row" style="
													margin-bottom: 15px;
													margin-right: 15px;
													margin-left: 15px;
												">
                    <img src="<?= base_url() ?>public/home/assets/images/chevron-group.svg" style="float: right; height: 100%; width: 100%" /><br /><br /><br />
                    <a class="btn-shadow d-block" href="<?php echo base_url(); ?>home/prestasi">
                      <span class="responsive-size-16 mb-3">Lihat Selengkapnya</span></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of slide 1 -->
          </div>
          <?php } ?>
        </div>
        <div class="dots carousel-indicators mb-5">
          <?php foreach ($prestasi as $key => $value) { 
                            $active = ($key == 0) ? 'active' : ''; ?>
          <i data-target="#prestasi-carousel" data-slide-to="<?= $key ?>" class="dot-item <?= $active ?>"></i>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END OF PRESTASI -->

<!-- FASILITAS -->
<div id="fasilitas" class="section">
  <div class="section-header">
    <div class="section-title responsive-size-72">fasilitas</div>
  </div>

  <div class="section-body">
    <div class="container container-window">
      <div class="container-window-topbar">
        <i class="topbar-dot"></i>
        <i class="topbar-dot"></i>
      </div>

      <div id="fasilitas-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
          <?php
                        $fasilitas = $this->dept_model->fasilitas();
                        foreach ($fasilitas as $key => $value) {
                            $active = ($key == 0) ? 'active' : ''; ?>
          <div class="carousel-item <?= $active ?>">
            <!-- slide 1 -->
            <img class="w-100" src="<?php echo base_url(); ?>public/assets/fasilitas/<?= $value['foto_land_fasilitas']; ?>" alt="" />
            <div class="container">
              <div class="row">
                <div class="col-12 col-lg-7 mb-4 mb-lg-0 col">
                  <br />
                  <h2 class="font-weight-bold responsive-size-32">
                    <?= $value['nama_land_fasilitas']; ?>
                  </h2>
                  <p class="responsive-size-16">
                    "<?= $value['deks_land_fasilitas']; ?>"
                  </p>
                </div>
                <div class="col-4 offset-4 offset-lg-2 col-lg-3">
                  <br />
                  <div class="row" style="
													margin-bottom: 15px;
													margin-right: 15px;
													margin-left: 15px;
												">
                    <img src="<?= base_url() ?>public/home/assets/images/chevron-group.svg" style="float: right; height: 100%; width: 100%" /><br /><br /><br />
                    <a class="btn-shadow d-block" href="<?php echo base_url(); ?>home/fasilitas">
                      <span class="responsive-size-16 mb-3">Lihat Selengkapnya</span></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of slide 1 -->
          </div>
          <?php } ?>
        </div>

        <div class="dots carousel-indicators mb-5">
          <?php foreach ($fasilitas as $key => $value) { 
                            $active = ($key == 0) ? 'active' : ''; ?>
          <i data-target="#fasilitas-carousel" data-slide-to="<?= $key ?>" class="dot-item <?= $active ?>"></i>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END OF FASILITAS -->

<!-- TESTIMONi -->
<div id="testimoni" class="section">
  <div class="section-header">
    <div class="section-title responsive-size-72">testimoni</div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-5 mb-4 mb-lg-0 col">
        <img class="w-100" src="<?= base_url() ?>public/home/landing/assets/images/Rectangle%2047.png" />
      </div>
      <div class="col-12 col-lg-7">
        <h2 class="font-weight-bold text-right mb-3 responsive-size-32">
          <strong>AFIF</strong> - MAWAPRES S1 ITS
        </h2>
        <p class="text-justify mb-3 responsive-size-16">
          Sejauh ini belum pernah menyesal buat milih ITS sebagai institut
          terbaik untuk mengenyam pendidikan tinggi. Tapi, bukan lagi
          saatnya bangga dengan nama almamater, karena ini saatnya kita
          membuat bangga almamater. Jadilah mahasiswa yang intelektual,
          berintegritas, dan bermanfaat bagi orang banyak!.
        </p>
        <img src="<?= base_url() ?>public/home/assets/images/chevron-group.svg" class="mb-5" style="float: right; height: 25%; width: 25%" />
      </div>
    </div>
  </div>
</div>
<!-- END OF TESTIMONi -->
<?php foreach ($fakultas as $fks => $fk) { ?>
<!-- Modal -->
<!-- <div class="modal fade" id="fakultasTIRS<?= $fk['id_fakultas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title responsive-size-20" id="exampleModalLongTitle">
          <?= $fk['nama_fakultas'] ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="<?= $fk['video_fakultas'] ?>" allowfullscreen></iframe>
        </div>
        <p>Video Bermasalah?
          <a href="<?= $fk['video_fakultas']?>" target="_blank" rel="noopener noreferrer">klik disini!</a>
        </p>
      </div>
    </div>
  </div>
</div> -->
<?php } ?>
<!-- END OF MODAL -->
<script src="<?= base_url() ?>public/home/assets/js/main.js"></script>
<script src="<?= base_url() ?>public/home/landing/assets/js/landing.js"></script>