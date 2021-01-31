<link rel="stylesheet" href="<?= base_url() ?>public/home/prestasi/assets/css/main.css" />
<!-- PRESTASI HEADER SECTION -->
<div id="header" class="prestasi-header">
    <img id="prestasi-header-img" src="<?= base_url() ?>public/home/prestasi/assets/images/prestasi-header.png" />
    <div id="big-text" class="d-flex jcc aic container-fluid">
        <!-- HEADER CAROUSEL  -->
        <div class="row aic jcc">
            <div id="prestasi-carousel" data-interval="false" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <!-- CAROUSEL ITEM  -->
                    <div class="carousel-item active">
                        <div class="prestasi-c bp">
                            <div class="left">
                                <p class="font-weight-bold text-white display-4 mb-3">
                                    Tim Bayucaraka ITS
                                </p>
                                <p class="text-white">
                                    "Juara Pertama Kompetisi Unmanned Aerial Vehicle (UAV)
                                    2019, Turki"
                                </p>
                            </div>
                            <div class="right">
                                <img src="<?= base_url() ?>public/home/prestasi/assets/images/prestasi.png" alt="" />
                                <img src="<?= base_url() ?>public/home/assets/images/arrows.svg" alt="" />
                            </div>
                        </div>
                    </div>
                    <!-- ENDING CAROUSEL ITEM  -->

                    <!-- CAROUSEL ITEM  -->
                    <div class="carousel-item">
                        <div class="prestasi-c bp">
                            <div class="left">
                                <p class="font-weight-bold text-white display-4 mb-3">
                                    Tim Bayucaraka ITS
                                </p>
                                <p class="text-white">
                                    "Juara Pertama Kompetisi Unmanned Aerial Vehicle (UAV)
                                    2019, Turki"
                                </p>
                            </div>
                            <div class="right">
                                <img src="<?= base_url() ?>public/home/prestasi/assets/images/prestasi.png" alt="" />
                                <img src="<?= base_url() ?>public/home/assets/images/arrows.svg" alt="" />
                            </div>
                        </div>
                    </div>
                    <!-- ENDING CAROUSEL ITEM  -->
                </div>

                <div class="dots carousel-indicators">
                    <i data-target="#prestasi-carousel" data-slide-to="0" class="dot-item active"></i>
                    <i data-target="#prestasi-carousel" data-slide-to="1" class="dot-item"></i>
                </div>
            </div>
        </div>
        <!-- ENDING OF HEADER CAROUSEL  -->
    </div>
</div>
<!-- END OF LANDING HEADER -->

<!-- MEET SECTION  -->
<div id="meet">
    <img id="meet-bg" src="<?= base_url() ?>public/home/prestasi/assets/images/meet.png" alt="" />
    <div class="meet-content">
        <div class="left">
            <!-- PLACEHOLDER BUAT YT  -->
            <img src="<?= base_url() ?>public/home/prestasi/assets/images/meet-yt.png" alt="" />
        </div>
        <div class="right">
            <div class="meet-card">
                <span>&nbsp</span>
                <p class="font-weight-bold">Meet the Team!</p>
            </div>
            <p>
                Sed ut perspiciatis, unde omnis iste natus error sit voluptatem
                accusantium doloremque laudantium, totam rem aperiam eaque ipsa,
                quae ab illo inventore veritatis et quasi Husni
            </p>
        </div>
    </div>
</div>
<!-- END OF MEET SECTION  -->

<!-- PRESTASI SECTION  -->
<div id="prestasi" class="section">
    <div class="section-header">
        <div class="section-title">prestasi</div>
        <div class="container d-flex jcc aic mb-4">
            <div class="row pill-container">
                <div class="col pill-item category active" onclick="categoryToggle(1)">
                    Laut
                </div>
                <div class="col pill-item category" onclick="categoryToggle(2)">
                    Darat
                </div>
                <div class="col pill-item category" onclick="categoryToggle(3)">
                    ETC
                </div>
            </div>
        </div>
    </div>

    <!-- Loop pake category-n buat id-nya  -->
    <div class="section-body category-body active" id="category-1">
        <div id="prestasi-list">
            <?php
            $laut = $this->dept_model->select_prestasi(1);
            foreach ($laut as $lb => $ll) { ?>
                <!-- CARD   -->
                <div class="prestasi-card container-window" data-target="#modal<?= $ll['id_prestasi'] ?>" data-toggle="modal">
                    <div class="container-window-topbar">
                        <i class="topbar-dot"></i>
                        <i class="topbar-dot"></i>
                    </div>
                    <img class="w-100" src="<?= base_url() ?>public/assets/prestasi/<?= $ll['foto_prestasi'] ?>" alt="" />
                    <div class="p-c-bot">
                        <div class="w-100">
                            <h4 class="font-weight-bold"><?= $ll['nama_prestasi'] ?></h4>
                            <p>Laut</p>
                        </div>
                    </div>
                </div>
                <!-- END OF CARD    -->
            <?php } ?>
        </div>
    </div>

    <div class="section-body category-body" id="category-2">
        <div id="prestasi-list">
        <?php
            $darat = $this->dept_model->select_prestasi(2);
            foreach ($darat as $lb => $ll) { ?>
            <!-- CARD   -->
            <div class="prestasi-card container-window" data-target="#modal<?= $ll['id_prestasi'] ?>" data-toggle="modal">
                    <div class="container-window-topbar">
                        <i class="topbar-dot"></i>
                        <i class="topbar-dot"></i>
                    </div>
                    <img class="w-100" src="<?= base_url() ?>public/assets/prestasi/<?= $ll['foto_prestasi'] ?>" alt="" />
                    <div class="p-c-bot">
                        <div class="w-100">
                            <h4 class="font-weight-bold"><?= $ll['nama_prestasi'] ?></h4>
                            <p>Darat</p>
                        </div>
                    </div>
                </div>
            <!-- END OF CARD    -->
            <?php } ?>
        </div>
    </div>

    <div class="section-body category-body" id="category-3">
        <div id="prestasi-list">
        <?php
            $etc = $this->dept_model->select_prestasi(3);
            foreach ($etc as $lb => $ll) { ?>
            <!-- CARD   -->
            <div class="prestasi-card container-window" data-target="#modal<?= $ll['id_prestasi'] ?>" data-toggle="modal">
                    <div class="container-window-topbar">
                        <i class="topbar-dot"></i>
                        <i class="topbar-dot"></i>
                    </div>
                    <img class="w-100" src="<?= base_url() ?>public/assets/prestasi/<?= $ll['foto_prestasi'] ?>" alt="" />
                    <div class="p-c-bot">
                        <div class="w-100">
                            <h4 class="font-weight-bold"><?= $ll['nama_prestasi'] ?></h4>
                            <p>Lainnya</p>
                        </div>
                    </div>
                </div>
            <!-- END OF CARD    -->
            <?php } ?>
        </div>
    </div>
</div>
<!-- END OF PRESTASI SECTION  -->
<!-- MODAL PLACEHOLDER  -->
<?php
$allprestasi = $this->dept_model->all_prestasi();
foreach ($allprestasi as $alp => $all) { ?>
    <div class="modal fade" id="modal<?= $all['id_prestasi'] ?>"" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <img src="<?= base_url() ?>public/home/prestasi/assets/images/modal-rectangle.png" class="modal-bg" />

                            <!-- CONTENT IMAGE  -->
                            <img src="<?= base_url() ?>public/assets/prestasi/<?= $ll['foto_prestasi'] ?>" alt="" />
                        </div>
                        <div class="right">
                            <h3><?= $all['nama_prestasi'] ?></h3>
                            <p>
                                <?= $all['deks_prestasi'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF MODAL PLACEHOLDER  -->
<?php } ?>
<script>
    var base_url = '<?php echo base_url() ?>';
</script>
<script src="<?= base_url() ?>public/home/assets/js/main.js"></script>
<script src="<?= base_url() ?>public/home/prestasi/assets/js/prestasi.js"></script>