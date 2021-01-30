<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <!-- LINK GLOBAL STYLE -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/main.css" />
  <title>Ini Lho ITS! 2021</title>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light position-absolute w-100 p-lg-2 p-0" style="z-index: 1000">
    <div id="mobileNavContainer" class="d-flex justify-content-between order-0 order-lg-1 bp">
      <button id="navbar-button" class="navbar-toggler left" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand bp" href="#">
        <img src="<?= base_url() ?>assets/img/logo.png" alt="Logo ILITS2021" loading="lazy" />
      </a>
    </div>
    <div class="collapse navbar-collapse bp" id="navbarNav">
      <ul id="navbarNavUl" class="navbar-nav d-flex justify-content-between text-center bp">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#fakultas">fakultas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#prestasi">prestasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#fasilitas">fasilitas</a>
        </li>
        <li class="nav-item dropdown-li bp">
          <p href="" class="nav-link nav-dropdown bp">more</p>
          <div class="nav-dropdown-content bp">
            <a href="" class="nav-link">Pendaftaran Tryout</a>
            <a href="" class="nav-link">Pendaftaran Webinar</a>
            <a href="" class="nav-link">Pendaftaran Open Campus</a>
            <a href="" class="nav-link">Pemesanan Merch</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <!-- END OF NAVBAR -->

  <!-- LANDING HEADER SECTION -->
  <div id="merch-catalog-header" class="section d-lg-flex aic">
    <div id="big-text" class="container-fluid d-lg-flex" style="z-index: 1; position: relative">
      <div class="merch-head row aic">
        <div class="col-xl-6 pb-3">
          <h1 class="merch-title">
            Ini Lho ITS! 2021
          </h1>
          <img class="merch-official" src="<?= base_url('public/merchandise/img/') ?>merch-official.png">
          <div class="text-center">
            <a href="#catalog" class="btn btn-yellow mx-2 mb-2">Beli Sekarang !</a>
            <a href="<?= base_url('merchandise/tracking') ?>" class="btn btn-yellow mx-2 mb-2">Liat Pesananmu!</a>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="container-fluid w-100">
              <!-- Carousel -->
              <div
                id="merchandise-carousel"
                data-interval="false"
                class="carousel slide"
                data-ride="carousel"
              >
                <div class="carousel-inner" style="border: 4px solid #12042d; height:50vh">
                  <?php foreach ($slider as $sl => $value) { 
                      $active = ($sl == 0) ? 'active' : ''; 
                      ?>    
                  <div class="carousel-item <?= $active ?> h-100">
                      <img style="object-fit: cover;" class="w-100 h-100" src="<?= base_url() ?>public/merchandise/img/slider/<?php echo $value['nama_foto'] ?>" alt="">
                  </div> 
                  <?php } ?>
                </div>
                <div class="dots carousel-indicators w-100 mb-5" style="margin-top:-2rem;">
                    <?php foreach ($slider as $sl => $value) { 
                    $active = ($sl == 0) ? 'active' : ''; 
                    ?>  
                    <i data-target="#merchandise-carousel" data-slide-to="<?= $sl ?>" class="dot-item <?= $active ?>"></i>
                    <?php } ?>
                </div>
              </div>
              <!-- END OF Carousel -->          
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

    <!-- CATALOG BUNDLE ITEMS -->
    <div id="catalog" class="pt-4 catalog-header">
      <h1 class="catalog-title">BUNDLE PACK</h1>
    </div>
    <div class="container catalog-menu text-center mb-3">
      <?= form_open('merchandise/addBundle') ?>
      <?= form_hidden('redirect_page', str_replace('index.php/', '', current_url())) ?>
      <div class="row bundle-menu">
        <div class="col-md-4">
          <!-- BUTTON GROUP BUNDLE PACKS -->
          <h2>Pilihan Pack</h2>
          <?php $i = 1; ?>
          <?php foreach ($tabel_bundle as $items) : ?>
            <button id="heading<?= $i; ?>" class="bundle-button" type="button" data-toggle="collapse" data-target="#<?= $items['data-target'] ?>">
              <label class="form-check-label" for="<?= $items['product'] ?>">
                <input class="form-check-input bundle-button-pack" name="productBundle" type="radio" value="<?= $items['product'] ?>" id="<?= $items['product'] ?>">
                <input type="hidden" name="idBundle" value="<?= $items['id'] ?>">
                <input type="hidden" name="priceBundle" value="<?= $items['price'] ?>">
                <?= $items['product'] ?> (IDR : <?= $items['price'] ?>)
              </label>
            </button>
            <?php $i++; ?>
          <?php endforeach; ?>
          <?= form_error('productBundle'); ?>
          <!-- END OF BUTTON GROUP BUNDLE PACKS -->
        </div>
        <div class="col-md-8">
          <!-- BUNDLE PACK DETAIL ITEMS -->
          <div class="accordion text-left" id="bundleMenu">
            <?php foreach ($tabel_bundle as $items) : ?>
              <div id="<?= $items['data-target'] ?>" class="bundle-detail collapse" aria-labelledby="heading1" data-parent="#bundleMenu">
                <h2 class="text-center"><?= $items['product']; ?> Bundle</h2>
                <fieldset class="form-group">

                  <!-- HOODIE ITEMS -->
                  <?php if ($items['hoodie'] == 1) : ?>
                    <div class="row bundle-items">
                      <?php
                      $hoodie = $this->db->get_where('tabel_product', ['category' => 'Hoodie'])->result_array();
                      ?>
                      <legend class="col-form-label col-sm-3 pt-0">Hoodie</legend>
                      <div class="col-sm-9">
                        <?php foreach ($hoodie as $name) : ?>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="hoodie" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                            <label class="form-check-label">
                              <?= $name['product']; ?>
                            </label>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <!-- END OF HOODIE ITEMS -->

                  <!-- T-SHIRT ITEMS -->
                  <?php if ($items['shirt'] == 1) : ?>
                    <div class="row bundle-items">
                      <?php
                      $tshirt = $this->db->get_where('tabel_product', ['category' => 'T-Shirt'])->result_array();
                      $tiedye = $this->db->get_where('tabel_product', ['category' => 'Tie Dye T-Shirt'])->result_array();
                      ?>
                      <legend class="col-form-label col-sm-3 pt-0">
                        <div class="form-group" style="width: 80px;">T-Shirt</div>
                      </legend>
                      <div class="col-sm-9">
                        <?php foreach ($tshirt as $name) : ?>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="tshirt" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                            <label class="form-check-label">
                              <?= $name['product']; ?>
                            </label>
                          </div>
                        <?php endforeach; ?>
                        <?php foreach ($tiedye as $name) : ?>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="tshirt" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                            <label class="form-check-label">
                              <?= $name['product']; ?>
                            </label>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <!-- END OF T-SHIRT ITEMS -->

                  <!-- TOTEBAG ITEMS -->
                  <?php if ($items['totebag'] == 1) : ?>
                    <div class="row bundle-items">
                      <?php
                      $totebag = $this->db->get_where('tabel_product', ['category' => 'Totebag'])->result_array();
                      ?>
                      <legend class="col-form-label col-sm-3 pt-0">Totebag</legend>
                      <div class="col-sm-9">
                        <?php foreach ($totebag as $name) : ?>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="totebag" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                            <label class="form-check-label">
                              <?= $name['product']; ?>
                            </label>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <!-- END OF TOTEBAG ITEMS -->

                  <!-- DAD CAP ITEMS -->
                  <?php if ($items['cap'] == 1) : ?>
                    <div class="row bundle-items">
                      <?php
                      $cap = $this->db->get_where('tabel_product', ['category' => 'Dad Cap'])->result_array();
                      ?>
                      <legend class="col-form-label col-sm-3 pt-0">Dad Cap</legend>
                      <div class="col-sm-9">
                        <?php foreach ($cap as $name) : ?>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="cap" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                            <label class="form-check-label">
                              <?= $name['product']; ?>
                            </label>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <!-- END OF DAD CAP ITEMS -->

                  <!-- KEYCHAIN ITEMS -->
                  <?php if ($items['keychain'] == 1) : ?>
                    <div class="row bundle-items">
                      <?php
                      $keychain = $this->db->get_where('tabel_product', ['category' => 'Keychain'])->result_array();
                      ?>
                      <legend class="col-form-label col-sm-3 pt-0">Keychain</legend>
                      <div class="col-sm-9">
                        <?php foreach ($keychain as $name) : ?>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="keychain" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                            <label class="form-check-label">
                              <?= $name['product']; ?>
                            </label>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <!-- END OF KEYCHAIN ITEMS -->

                  <!-- BRACELET ITEMS -->
                  <?php if ($items['bracelet'] == 1) : ?>
                    <div class="row bundle-items">
                      <?php
                      $gelang = $this->db->get_where('tabel_product', ['category' => 'Gelang'])->result_array();
                      ?>
                      <legend class="col-form-label col-sm-3 pt-0">Gelang</legend>
                      <div class="col-sm-9">
                        <?php foreach ($gelang as $name) : ?>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="bracelet" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                            <label class="form-check-label">
                              <?= $name['product']; ?>
                            </label>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <!-- END OF BRACELET ITEMS -->

                  <!-- LANYARD ITEMS -->
                  <?php if ($items['lanyard'] == 1) : ?>
                    <div class="row bundle-items">
                      <?php
                      $lanyard = $this->db->get_where('tabel_product', ['category' => 'Lanyard'])->result_array();
                      ?>
                      <legend class="col-form-label col-sm-3 pt-0">Lanyard</legend>
                      <div class="col-sm-9">
                        <?php foreach ($lanyard as $name) : ?>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="lanyard" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                            <label class="form-check-label">
                              <?= $name['product']; ?>
                            </label>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <!-- END OF LANYARD ITEMS -->

                  <!-- STICKERBOOK -->
                  <?php if ($items['stickerbook'] == 1) : ?>
                    <div class="row bundle-items">
                      <?php
                      $sticker = $this->db->get_where('tabel_product', ['category' => 'Stiker'])->result_array();
                      ?>
                      <legend class="col-form-label col-sm-3 pt-0">Stickerbook</legend>
                      <div class="col-sm-9">
                        <?php foreach ($sticker as $name) : ?>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="stickerbook" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                            <label class="form-check-label">
                              <?= $name['product']; ?>
                            </label>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <!-- END OF STICKER BOOK -->

                  <?php if ($items['product'] != 'Peach Pack' && $items['product'] != 'Yellow Pack') : ?>
                    <!-- SIZE OPTIONS -->
                    <div class="row bundle-items">
                      <legend class="col-form-label col-sm-3 pt-0">
                        Size<br>
                        <a href="<?= base_url('public/merchandise/img/size-chart.jpg') ?>" style="text-decoration: none;" target="_blank">Lihat Size Chart</a>
                      </legend>
                      <div class="col-sm-9">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="sizeBundle" id="S" value="S">
                          <label class="form-check-label" for="S">
                            S
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="sizeBundle" id="M" value="M">
                          <label class="form-check-label" for="M">
                            M
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="sizeBundle" id="L" value="L">
                          <label class="form-check-label" for="L">
                            L
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="sizeBundle" id="XL" value="XL">
                          <label class="form-check-label" for="XL">
                            XL
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="sizeBundle" id="XXL" value="XXL">
                          <label class="form-check-label" for="XXL">
                            XXL
                          </label>
                        </div>
                      </div>
                    </div>
                    <!-- END OF SIZE OPTIONS -->
                  <?php endif; ?>

                </fieldset>
                <div class="text-center">
                  <button type="submit" class="btn btn-blue">Add to Cart!</button>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?= form_close(); ?>
    </div>

    <!-- CATALOG SINGLE ITEMS -->
    <div class="catalog-header">
      <h1 class="catalog-title">CATALOG</h1>
    </div>

    <!-- CATALOG ITEMS -->
    <div class="container catalog-menu text-center">
      <button id="headingOne" class="catalog-button collapsed" type="button" data-toggle="collapse" data-target="#catalog-hoodie">
        HOODIE & KAOS
      </button>
      <button id="headingTwo" class="catalog-button collapsed" type="button" data-toggle="collapse" data-target="#catalog-tiedye">
        KAOS TIEDYE
      </button>
      <button id="headingThree" class="catalog-button collapsed" type="button" data-toggle="collapse" data-target="#catalog-totebag">
        TOTEBAG
      </button>
      <button id="headingFour" class="catalog-button collapsed" type="button" data-toggle="collapse" data-target="#catalog-keychain">
        KEYCHAIN
      </button>
      <button id="headingFive" class="catalog-button collapsed" type="button" data-toggle="collapse" data-target="#catalog-etc">
        SMALL MERCH
      </button>
      <br>
      <a class="size-chart btn button-red my-3" href="<?= base_url('public/merchandise/img/size-chart.jpg') ?>" target="_blank">Lihat Size Chart</a>
      <div class="accordion mt-3" id="catalogMenu">

        <!-- HOODIE & T-SHIRT -->
        <div id="catalog-hoodie" class="collapse show" aria-labelledby="headingOne" data-parent="#catalogMenu">
          <div class="row">
            <?php foreach ($tabel_product as $items) : ?>
              <?php if ($items['category'] == 'Hoodie' || $items['category'] == 'T-Shirt') : ?>
                <div class="col-md-4 catalog-items text-center">
                  <h5 class="pre-order text-left">Pre Order<br><span style="font-size: 14px; color:#0c0c6d ;"><?= $items['code'] ?></span></h5>
                  <div class="d-flex jcc aic">
                    <img src="<?= base_url('public/merchandise/img/product/') . $items['catalog'] ?>" alt="">
                  </div>
                  <h4 class="d-flex jcc aic" style="height: 60px;"><?= $items['category'] . ' ' . $items['product'] ?></h4>
                  <h5>IDR <?= $items['price'] ?></h5>
                  <button class="btn btn-blue detailProduct" data-toggle="modal" data-target="#detailModal" data-id="<?= $items['code']; ?>">Detail !</button>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- END OF HOODIE & T-SHIRT -->

        <!-- TIEDYE -->
        <div id="catalog-tiedye" class="collapse" aria-labelledby="headingTwo" data-parent="#catalogMenu">
          <div class="row">
            <?php foreach ($tabel_product as $items) : ?>
              <?php if ($items['category'] == 'Tie Dye T-Shirt') : ?>
                <div class="col-md-4 catalog-items text-center">
                  <h5 class="pre-order text-left">Pre Order<br><span style="font-size: 14px; color:#0c0c6d ;"><?= $items['code'] ?></span></h5>
                  <div class="d-flex jcc aic">
                    <img src="<?= base_url('public/merchandise/img/product/') . $items['catalog'] ?>" alt="">
                  </div>
                  <h4 class="d-flex jcc aic" style="height: 60px;"><?= $items['category'] . ' ' . $items['product'] ?></h4>
                  <h5>IDR <?= $items['price'] ?></h5>
                  <button class="btn btn-blue detailProduct" data-toggle="modal" data-target="#detailModal" data-id="<?= $items['code']; ?>">Detail !</button>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- END OF TIEDYE -->

        <!-- TOTEBAG -->
        <div id="catalog-totebag" class="collapse" aria-labelledby="headingThree" data-parent="#catalogMenu">
          <div class="row">
            <?php foreach ($tabel_product as $items) : ?>
              <?php if ($items['category'] == 'Totebag') : ?>
                <div class="col-md-4 catalog-items text-center">
                  <h5 class="pre-order text-left">Pre Order<br><span style="font-size: 14px; color:#0c0c6d ;"><?= $items['code'] ?></span></h5>
                  <div class="d-flex jcc aic">
                    <img src="<?= base_url('public/merchandise/img/product/') . $items['catalog'] ?>" alt="">
                  </div>
                  <h4 class="d-flex jcc aic" style="height: 60px;"><?= $items['category'] . ' ' . $items['product'] ?></h4>
                  <h5>IDR <?= $items['price'] ?></h5>
                  <button class="btn btn-blue detailProduct" data-toggle="modal" data-target="#detailModal" data-id="<?= $items['code']; ?>">Detail !</button>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- END OF TOTEBAG -->

        <!-- KEYCHAIN -->
        <div id="catalog-keychain" class="collapse" aria-labelledby="headingFour" data-parent="#catalogMenu">
          <div class="row">
            <?php foreach ($tabel_product as $items) : ?>
              <?php if ($items['category'] == 'Keychain') : ?>
                <div class="col-md-4 catalog-items text-center">
                  <h5 class="pre-order text-left">Pre Order<br><span style="font-size: 14px; color:#0c0c6d ;"><?= $items['code'] ?></span></h5>
                  <div class="d-flex jcc aic">
                    <img src="<?= base_url('public/merchandise/img/product/') . $items['catalog'] ?>" alt="">
                  </div>
                  <h4 class="d-flex jcc aic" style="height: 60px;"><?= $items['category'] . ' ' . $items['product'] ?></h4>
                  <h5>IDR <?= $items['price'] ?></h5>
                  <button class="btn btn-blue detailProduct" data-toggle="modal" data-target="#detailModal" data-id="<?= $items['code']; ?>">Detail !</button>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- END OF KEYCHAIN -->

        <!-- ETC -->
        <div id="catalog-etc" class="collapse" aria-labelledby="headingFive" data-parent="#catalogMenu">
          <div class="row">
            <?php foreach ($tabel_product as $items) : ?>
              <?php if ($items['category'] == 'Dad Cap' || $items['category'] == 'Stiker' || $items['category'] == 'Lanyard' || $items['category'] == 'Gelang') : ?>
                <div class="col-md-4 catalog-items text-center">
                  <h5 class="pre-order text-left">Pre Order<br><span style="font-size: 14px; color:#0c0c6d ;"><?= $items['code'] ?></span></h5>
                  <div class="d-flex jcc aic">
                    <img src="<?= base_url('public/merchandise/img/product/') . $items['catalog'] ?>" alt="">
                  </div>
                  <h4 class="d-flex jcc aic" style="height: 60px;"><?= $items['category'] . ' ' . $items['product'] ?></h4>
                  <h5>IDR <?= $items['price'] ?></h5>
                  <button class="btn btn-blue detailProduct" data-toggle="modal" data-target="#detailModal" data-id="<?= $items['code']; ?>">Detail !</button>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- END OF ETC -->

      </div>
    </div>
    <!-- END OF CATALOG ITEMS -->

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


  <!-- PRODUCT DETAILS (MODAL) -->
  <div class="modal fade" id="detailModal" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content scrollable">
        <!-- MODAL HEADER -->
        <div class="modal-header p-1" style="background-color: #7FDAEF">
          <span class="red-circle ml-3 p-3" style="background-color: #F6014F; border-radius: 50%"></span>
          <span class="red-circle ml-3 p-3" style="background-color: #F99121; border-radius: 50%"></span>
          <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- END OF MODAL HEADER -->
        <div class="container-fluid p-3">
          <div class="row">
            <!-- PRODUCT PICTURE -->
            <div class="col-md-7 text-center">
              <div class="detail-picture">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                  <div class="carousel-inner">
                    <!-- ITEMS SLIDER (FROM JS) -->
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
            <!-- END OF PRODUCT PICTURE -->
            <!-- PRODUCT DETAILS -->
            <div class="col-md-5 d-flex jcc aic flex-column">
              <?= form_open('merchandise/add') ?>
              <input type="hidden" id="idForm" name="id" value="">
              <input type="hidden" id="priceForm" name="price" value="">
              <input type="hidden" id="nameForm" name="name" value="">
              <input type="hidden" id="categoryForm" name="category" value="">
              <?= form_hidden('redirect_page', str_replace('index.php/', '', current_url())) ?>
              <h3 class="text-left" id="code">xx</h3>
              <h1 id="product">Hoodie Arek Cak!</h1>
              <h2 id="priceValue">IDR 140.000</h2>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="number" class="form-control" id="qty" name="qty" value="1" min="1">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group" id="sizeOption">
                    <label for="size">Size</label>
                    <select class="form-control" id="size" name="size">
                      <option value="S">S</option>
                      <option value="M">M</option>
                      <option value="L">L</option>
                      <option value="XL">XL</option>
                      <option value="XXL">XXL</option>
                    </select>
                  </div>
                </div>
              </div>
              <p id="descProduct"></p>
              <button type="submit" class="btn btn-yellow btn-block">Add to Cart !</button>
              <?= form_close(); ?>
            </div>
            <!-- END OF PRODUCT DETAILS -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END OF PRODUCT DETAILS -->

  <!-- CART BUTTON -->
  <div id="add-to-cart" class="dropup">
    <a class="btn-cart bounce-container bounce d-flex jcc aic" data-toggle="dropdown" href="#">
      <div class="btn">
        <i class="fas fa-shopping-cart text-white"></i>
      </div>
    </a>
    <div class="dropdown-menu ">
      <!-- Message Start -->
      <?php if (!$this->cart->total()) : ?>
        <p class="p-3">Keranjang Belanja masih Kosong.</p>
      <?php else : ?>
        <?php foreach ($this->cart->contents() as $items) : ?>
          <a class="dropdown-item">
            <div class="media">
              <div class="media-body">
                <h5 class="dropdown-item-title mt-2">
                  <?= $items['options']['Category'] . ' ' . $items['name']; ?>
                </h5>
                <span class="text-sm"><?= $items['qty'] ?> x IDR <?= $this->cart->format_number($items['price']); ?></span>
                <br>
                <?php if ($items['options']['Size'] != 'null') : ?>
                  <span class="text-sm text-muted">Size : <?= $items['options']['Size'] ?></span>
                <?php endif; ?>
              </div>
            </div>
          </a>
          <!-- Message End -->
          <div class="dropdown-divider my-0"></div>
        <?php endforeach; ?>
        <a href="#" class="dropdown-item dropdown-footer text-center">
          Total : <?= $this->cart->format_number($this->cart->total()); ?>
        </a>
        <div class="dropdown-divider my-0"></div>
        <a href="<?= base_url('merchandise/viewcart') ?>" class="dropdown-item dropdown-footer text-center">
          View Cart
        </a>
      <?php endif; ?>
    </div>
  </div>
  <!-- END OF CART BUTTON -->

  <!-- SCROLL TO TOP -->
  <div class="scroll-to-top bounce-container bounce d-flex jcc aic" onclick="(function(){
			document.body.scrollTop = 0; // For Safari
			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		})()">
    <div class="btn">
      <i class="fa fa-chevron-up text-white"></i>
    </div>
  </div>
  <!-- END OF SCROLL TO TOP -->

  <!-- FOOTER -->
  <div id="footer">
    <div id="footer-logo">
      <img src="<?= base_url('assets/img/') ?>logo.png" alt="Logo ILITS2021" />
    </div>
    <div class="medspons-container">
      <div class="medspons">
        <h3>Media Partner</h3>
        <div class="medspons-content">
          <img src="<?= base_url('assets/img/') ?>google.png" />
          <img src="<?= base_url('assets/img/') ?>google.png" />
          <img src="<?= base_url('assets/img/') ?>google.png" />
          <img src="<?= base_url('assets/img/') ?>google.png" />
          <img src="<?= base_url('assets/img/') ?>google.png" />
        </div>
      </div>

      <div class="medspons">
        <h3>Sponsor</h3>
        <div class="medspons-content">
          <img src="<?= base_url('assets/img/') ?>google.png" />
          <img src="<?= base_url('assets/img/') ?>google.png" />
        </div>
      </div>
    </div>
    <p id="footer-copy">&copy; Copyright Ini LHO ITS 2021. All Rights Reserved</p>
  </div>


  <!-- END OF FOOTER -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
  <script src="<?= base_url('public/merchandise/js/') ?>sweetalert2.all.min.js"></script>
  <script src="<?= base_url('public/merchandise/js/') ?>merch-modal.js"></script>
</body>

</html>
