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
    <div id="mobileNavContainer" class="d-flex justify-content-between order-0 order-lg-1">
      <button class="navbar-toggler left" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand bp" href="#">
        <img src="<?= base_url('assets/img/') ?>logo.png" alt="Logo ILITS2021" loading="lazy" />
      </a>
    </div>
    <div class="collapse navbar-collapse bp" id="navbarNav">
      <ul id="navbarNavUl" class="navbar-nav d-flex justify-content-between text-center">
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
        <li class="nav-item">
          <a class="nav-link" href="#">tryout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- END OF NAVBAR -->

  <!-- LANDING HEADER SECTION -->
  <div id="merchant-header" class="section">
    <img class="merchant-bg" src="<?= base_url('assets/img/') ?>product/departemen-top.png" />
    <div id="big-text" class="container-fluid d-lg-flex " style="z-index: 1; position: relative">
      <div class="merchant-head row vh-100 aic">
        <div class="col-md-6 d-flex flex-column pb-3">
          <h1 class="merchant-title">
            Ini Lho ITS! 2021
          </h1>
          <img class="merchant-official" src="<?= base_url('assets/img/') ?>product/merchant-official.png">
          <div class="text-center">
            <button class="btn btn-yellow">Beli Sekarang !</button>
          </div>
        </div>
        <div class="col-md-6 clothes">
          <img src="<?= base_url('assets/img/') ?>product/kaos-tiedye.png" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- END OF LANDING HEADER -->

  <!-- CATALOG -->
  <div id="merchant-catalog">
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
        ETC
      </button>
      <div class="accordion" id="catalogMenu">
        <!-- HOODIE & T-SHIRT -->
        <div id="catalog-hoodie" class="collapse show" aria-labelledby="headingOne" data-parent="#catalogMenu">
          <div class="row">
            <?php foreach ($tabel_product as $items) : ?>
              <?php if ($items['category'] == 'Hoodie' || $items['category'] == 'T-Shirt') : ?>
                <div class="col-md-4 catalog-items text-center">
                  <h5 class="pre-order text-left">Pre Order<br><span style="font-size: 14px; color:#0c0c6d ;"><?= $items['code'] ?></span></h5>
                  <div class="d-flex jcc aic" style="height: 300px;">
                    <img src="<?= base_url('assets/img/product/') . $items['catalog'] ?>" alt="">
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
                  <div class="d-flex jcc aic" style="height: 200px;">
                    <img src="<?= base_url('assets/img/product/') . $items['catalog'] ?>" alt="">
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
                  <div class="d-flex jcc aic" style="height: 300px;">
                    <img src="<?= base_url('assets/img/product/') . $items['catalog'] ?>" alt="" height="300px">
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
                  <div class="d-flex jcc aic" style="height: 350px;">
                    <img class="p-5" src="<?= base_url('assets/img/product/') . $items['catalog'] ?>" alt="">
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
              <?php if ($items['category'] == 'Stiker' || $items['category'] == 'Lanyard' || $items['category'] == 'Gelang') : ?>
                <div class="col-md-4 catalog-items text-center">
                  <h5 class="pre-order text-left">Pre Order<br><span style="font-size: 14px; color:#0c0c6d ;"><?= $items['code'] ?></span></h5>
                  <div class="d-flex jcc aic" style="height: 280px;">
                    <img src="<?= base_url('assets/img/product/') . $items['catalog'] ?>" alt="">
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
  </div>
  <!-- END OF CATALOG -->

  <!-- PRODUCT DETAILS (MODAL) -->
  <div class="modal fade" id="detailModal" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content" style="border: 3px solid black; border-radius: 20px">
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
              <form action="">
                <h5 class="text-left" id="code" style="color: #0c0c6d;">xx</h5>
                <h1 id="product">Hoodie Arek Cak!</h1>
                <h4 id="price" style="color: #F60D4F;">IDR 140.000</h4>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="qty">Quantity</label>
                      <input type="number" class="form-control" id="qty" value="1" min="1">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group" id="sizeOption">
                      <label for="size">Size</label>
                      <select class="form-control" id="size" name="size">
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="l">L</option>
                        <option value="xl">XL</option>
                        <option value="xxl">XXL</option>
                      </select>
                    </div>
                  </div>
                </div>
                <a class="btn btn-warning btn-block" data-toggle="tooltip" title="Still on Development, Coming Soon!">Add to Cart !</a>

                <script>
                  $(document).ready(function() {
                    $('[data-toggle="tooltip"]').tooltip();
                  });
                </script>
              </form>
            </div>
            <!-- END OF PRODUCT DETAILS -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END OF PRODUCT DETAILS -->

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



  <!-- END OF FOOTER -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
  <script src="<?= base_url('assets/') ?>js/merchant-modal.js"></script>
</body>

</html>