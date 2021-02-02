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
          <div id="merchandise-carousel" data-interval="false" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" style="border: 4px solid #12042d; height:50vh">
              <?php foreach ($slider as $sl => $value) {
                $active = ($sl == 0) ? 'active' : '';
              ?>
                <div class="carousel-item <?= $active ?> h-100" data-interval="2000">
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
    <div class="row bundle-menu">
      <div class="col-md-4">
        <!-- BUTTON GROUP BUNDLE PACKS -->
        <h2>Pilihan Pack</h2>
        <?php $i = 1; ?>
        <?php foreach ($tabel_bundle as $items) : ?>
          <button id="heading<?= $i; ?>" class="bundle-button" type="button" data-toggle="collapse" data-target="#<?= $items['data-target'] ?>">
            <?= $items['product'] ?> (IDR : <?= number_format($items['price'], 2, ',', '.') ?>)
          </button>
          <?php $i++; ?>
        <?php endforeach; ?>
        <!-- END OF BUTTON GROUP BUNDLE PACKS -->
      </div>
      <div class="col-md-8">
        <!-- BUNDLE PACK DETAIL ITEMS -->
        <div class="accordion text-left" id="bundleMenu">
          <?php $j = 1; ?>
          <?php foreach ($tabel_bundle as $items) : ?>
            <?= form_open('merchandise/addBundle') ?>
            <?= form_hidden('redirect_page', str_replace('index.php/', '', current_url())) ?>
            <div id="<?= $items['data-target'] ?>" class="bundle-detail collapse" aria-labelledby="heading1" data-parent="#bundleMenu">
              <input type="hidden" name="productBundle" class="form-control-plaintext" value="<?= $items['product'] ?>">
              <input type="hidden" name="idBundle" value="<?= $items['id'] ?>">
              <input type="hidden" name="priceBundle" value="<?= $items['price'] ?>">
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
                          <input class="form-check-input" id="<?= $name['id'] . $j ?>" type="radio" name="hoodie" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                          <label class="form-check-label" for="<?= $name['id'] . $j ?>">
                            <?= $name['product']; ?>
                          </label>
                        </div>
                      <?php endforeach; ?>
                      <?= form_error('hoodie', '<p style="color: red">', '</p>'); ?>
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
                          <input class="form-check-input" id="<?= $name['id'] . $j ?>" type="radio" name="tshirt" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                          <label class="form-check-label" for="<?= $name['id'] . $j ?>">
                            <?= $name['product']; ?>
                          </label>
                        </div>
                      <?php endforeach; ?>
                      <?php foreach ($tiedye as $name) : ?>
                        <div class="form-check">
                          <input class="form-check-input" id="<?= $name['id'] . $j ?>" type="radio" name="tshirt" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                          <label class="form-check-label" for="<?= $name['id'] . $j ?>">
                            <?= $name['product']; ?>
                          </label>
                        </div>
                      <?php endforeach; ?>
                      <?= form_error('tshirt', '<p style="color: red">', '</p>'); ?>
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
                          <input class="form-check-input" id="<?= $name['id'] . $j ?>" type="radio" name="totebag" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                          <label class="form-check-label" for="<?= $name['id'] . $j ?>">
                            <?= $name['product']; ?>
                          </label>
                        </div>
                      <?php endforeach; ?>
                      <?= form_error('totebag', '<p style="color: red">', '</p>'); ?>
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
                          <input class="form-check-input" id="<?= $name['id'] . $j ?>" type="radio" name="cap" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                          <label class="form-check-label" for="<?= $name['id'] . $j ?>">
                            <?= $name['product']; ?>
                          </label>
                        </div>
                      <?php endforeach; ?>
                      <?= form_error('cap', '<p style="color: red">', '</p>'); ?>
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
                          <input class="form-check-input" id="<?= $name['id'] . $j ?>" type="radio" name="keychain" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                          <label class="form-check-label" for="<?= $name['id'] . $j ?>">
                            <?= $name['product']; ?>
                          </label>
                        </div>
                      <?php endforeach; ?>
                      <?= form_error('keychain', '<p style="color: red">', '</p>'); ?>
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
                          <input class="form-check-input" id="<?= $name['id'] . $j ?>" type="radio" name="bracelet" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                          <label class="form-check-label" for="<?= $name['id'] . $j ?>">
                            <?= $name['product']; ?>
                          </label>
                        </div>
                      <?php endforeach; ?>
                      <?= form_error('bracelet', '<p style="color: red">', '</p>'); ?>
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
                          <input class="form-check-input" id="<?= $name['id'] . $j ?>" type="radio" name="lanyard" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                          <label class="form-check-label" for="<?= $name['id'] . $j ?>">
                            <?= $name['product']; ?>
                          </label>
                        </div>
                      <?php endforeach; ?>
                      <?= form_error('lanyard', '<p style="color: red">', '</p>'); ?>
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
                          <input class="form-check-input" id="<?= $name['id'] . $j ?>" type="radio" name="stickerbook" value="<?= $name['category']; ?> <?= $name['product']; ?>">
                          <label class="form-check-label" for="<?= $name['id'] . $j ?>">
                            <?= $name['product']; ?>
                          </label>
                        </div>
                      <?php endforeach; ?>
                      <?= form_error('stickerbook', '<p style="color: red">', '</p>'); ?>
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
                        <input class="form-check-input" type="radio" name="sizeBundle" id="S<?= $j ?>" value="S">
                        <label class="form-check-label" for="S<?= $j ?>">
                          S
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sizeBundle" id="M<?= $j ?>" value="M">
                        <label class="form-check-label" for="M<?= $j ?>">
                          M
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sizeBundle" id="L<?= $j ?>" value="L">
                        <label class="form-check-label" for="L<?= $j ?>">
                          L
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sizeBundle" id="XL<?= $j ?>" value="XL">
                        <label class="form-check-label" for="XL<?= $j ?>">
                          XL
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sizeBundle" id="XXL<?= $j ?>" value="XXL">
                        <label class="form-check-label" for="XXL<?= $j ?>">
                          XXL
                        </label>
                      </div>
                      <?= form_error('sizeBundle', '<p style="color: red">', '</p>'); ?>
                    </div>
                  </div>
                  <!-- END OF SIZE OPTIONS -->
                <?php endif; ?>

              </fieldset>
              <div class="text-center">
                <button type="submit" name="addBundleCart" class="btn btn-blue">Add to Cart!</button>
              </div>
            </div>
            <?= form_close(); ?>
            <?php $j++; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
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
                  <img class="detailProduct" data-toggle="modal" data-target="#detailModal" data-id="<?= $items['code']; ?>" src="<?= base_url('public/merchandise/img/product/') . $items['catalog'] ?>" alt="">
                </div>
                <h4 class="d-flex jcc aic" style="height: 60px;"><?= $items['category'] . ' ' . $items['product'] ?></h4>
                <h5>IDR <?= number_format($items['price'], 2, ',', '.') ?></h5>
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
                  <img class="detailProduct" data-toggle="modal" data-target="#detailModal" data-id="<?= $items['code']; ?>" src="<?= base_url('public/merchandise/img/product/') . $items['catalog'] ?>" alt="">
                </div>
                <h4 class="d-flex jcc aic" style="height: 60px;"><?= $items['category'] . ' ' . $items['product'] ?></h4>
                <h5>IDR <?= number_format($items['price'], 2, ',', '.') ?></h5>
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
                  <img class="detailProduct" data-toggle="modal" data-target="#detailModal" data-id="<?= $items['code']; ?>" src="<?= base_url('public/merchandise/img/product/') . $items['catalog'] ?>" alt="">
                </div>
                <h4 class="d-flex jcc aic" style="height: 60px;"><?= $items['category'] . ' ' . $items['product'] ?></h4>
                <h5>IDR <?= number_format($items['price'], 2, ',', '.') ?></h5>
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
                  <img class="detailProduct" data-toggle="modal" data-target="#detailModal" data-id="<?= $items['code']; ?>" src="<?= base_url('public/merchandise/img/product/') . $items['catalog'] ?>" alt="">
                </div>
                <h4 class="d-flex jcc aic" style="height: 60px;"><?= $items['category'] . ' ' . $items['product'] ?></h4>
                <h5>IDR <?= number_format($items['price'], 2, ',', '.') ?></h5>
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
                  <img class="detailProduct" data-toggle="modal" data-target="#detailModal" data-id="<?= $items['code']; ?>" src="<?= base_url('public/merchandise/img/product/') . $items['catalog'] ?>" alt="">
                </div>
                <h4 class="d-flex jcc aic" style="height: 60px;"><?= $items['category'] . ' ' . $items['product'] ?></h4>
                <h5>IDR <?= number_format($items['price'], 2, ',', '.') ?></h5>
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
<div class="modal fade" id="detailModal" data-keyboard="false" tabindex="-1">
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
          <div class="col-md-6 text-center">
            <div class="detail-picture">
              <div id="productImages" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner product-images">
                  <!-- ITEMS SLIDER (FROM JS) -->
                </div>
                <a class="carousel-control-prev" href="#productImages" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productImages" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
          <!-- END OF PRODUCT PICTURE -->
          <!-- PRODUCT DETAILS -->
          <div class="col-md-6 d-flex jcc aic flex-column">
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
              <span class="text-sm"><?= $items['qty'] ?> x IDR <?= number_format($items['price'], 2, ',', '.'); ?></span>
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
      <p class="dropdown-item dropdown-footer text-center mb-0">
        Total : <?= number_format($this->cart->total(), 2, ',', '.'); ?>
      </p>
      <div class="dropdown-divider my-0"></div>
      <a href="<?= base_url('merchandise/viewcart') ?>" class="dropdown-item dropdown-footer text-center">
        View Cart
      </a>
    <?php endif; ?>
  </div>
</div>
<!-- END OF CART BUTTON -->