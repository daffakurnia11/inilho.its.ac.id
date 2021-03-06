<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light position-absolute w-100 <?php if (isset($merchandise)) {
                                                                                    echo 'no-header';
                                                                                } else {
                                                                                    echo 'p-lg-2 p-0';
                                                                                } ?>" style="z-index: 1000">
        <div id="mobileNavContainer" class="d-flex justify-content-between order-0 order-lg-1 bp">
            <button id="navbar-button" class="navbar-toggler left" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand bp <?php if (isset($merchandise)) {
                                            echo 'no-header';
                                        } else {
                                            echo 'p-lg-2 p-0';
                                        } ?>" href="#">
                <img src="<?= base_url() ?>public/home/assets/images/logo.png" alt="Logo ILITS2021" loading="lazy" />
            </a>
        </div>
        <div class="collapse navbar-collapse bp" id="navbarNav">
            <ul id="navbarNavUl" class="navbar-nav d-flex justify-content-between text-center bp">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url() ?>home">
                        Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php if ($nav == 0) {
                                                    echo "#about";
                                                } else {
                                                    echo base_url() . "home#about";
                                                } ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php if ($nav == 0) {
                                                    echo "#fakultas";
                                                } else {
                                                    echo base_url() . "home#fakultas";
                                                } ?>">fakultas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php if ($nav == 0) {
                                                    echo "#prestasi";
                                                } else {
                                                    echo base_url() . "home#prestasi";
                                                } ?>">prestasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php if ($nav == 0) {
                                                    echo "#fasilitas";
                                                } else {
                                                    echo base_url() . "home#fasilitas";
                                                } ?>">fasilitas</a>
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