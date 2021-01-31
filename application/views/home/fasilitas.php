<link rel="stylesheet" href="<?= base_url() ?>public/home/fasilitas/assets/css/main.css" />
<!-- HEADER FASILITAS-->
<div id="header">
    <img id="fasilitas-header" src="<?= base_url() ?>public/home/fasilitas/assets/images/fasilitas-header.png" alt="">
    <div class="header-container">
        <div class="flex-container bp justify-content-center">
            <div class="fasilitas-header-desc">
                <p class="font-weight-bold display-4 text-white">
                    Perpustakaan ITS
                </p>
                <p class="text-white">
                    Perpustakaan ITS merupakan salah satu tempat yang paling banyak dikunjungi oleh mahasiswa, dosen, maupun pihak eksternal yang sedang mengadakan kunjungan ke ITS.
                </p>
            </div>
            <div class="fasilitas-header-img">
                <img src="<?= base_url() ?>public/home/fasilitas/assets/images/perpustakaan.png" alt="">
                <img src="<?= base_url() ?>public/home/assets/images/arrows.svg" alt="">
            </div>
        </div>
    </div>
</div>
<!-- END OF HEADER FASILITAS -->

<!-- MAPS -->
<div id="maps">
    <div class="flex-container">
        <div class="maps-left">
            <div class="container-window">
                <div class="shadow"></div>
                <div class="container-window-topbar">
                    <i class="topbar-dot"></i>
                    <i class="topbar-dot"></i>
                    <img id="panah-window" src="<?= base_url() ?>public/home/fasilitas/assets/images/panah-window.svg" alt="">
                </div>
                <img id="maps-img" src="<?= base_url() ?>public/home/fasilitas/assets/images/maps.png" alt="">
            </div>
        </div>
        <div class="maps-right">
            <div class="maps-card">
                <span class="color-square"></span>
                <span class="text-square">
                    <p>Open Maps!</p>
                </span>
            </div>
            <p class="maps-desc">
                Dengan bantuan google maps memudahkan kamu untuk melihat its secara dalam
            </p>
        </div>
    </div>
</div>
<!-- END OF MAPS -->

<!-- FASILITAS LIST -->
<div id="fasilitas">
    <div class="container-fluid">
        <div class="row" id="head-fasilitas-list">
            <div class="col bg-title">
                <img src="<?= base_url() ?>public/home/fasilitas/assets/images/gradasi-fasilitas.png" alt="">
                <div>
                    <p>
                        Ada Apa aja di ITS?
                    </p>
                </div>
            </div>
        </div>
        <!-- LIST FASILITAS -->
        <?php $i = 1;
        foreach ($fasilitas as $u) {
            if ($i % 2 == 1) {
                echo '<div class="row">';
            }
        ?>
            <div class="col-5 p-0">
                <div class="fasilitas-card container-window p-0" data-target="#modal<?php echo $u->id_fasilitas ?>" data-toggle="modal">
                    <div class="container-window-topbar">
                        <i class="topbar-dot"></i>
                        <i class="topbar-dot"></i>
                    </div>
                    <img class="w-100" src="<?= base_url() ?>public/assets/fasilitas/<?php echo $u->foto_fasilitas ?>" alt="" />
                    <div class="p-c-bot">
                        <div class="w-100">
                            <h3 class="font-weight-bold text-center"><?php echo $u->nama_fasilitas ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        <?php
            if ($i % 2 == 0) {
                echo '</div>';
            }
            $i++;
        }
        ?>
        <!-- END LIST FASILITAS -->
    </div>
</div>
</div>
<!-- END OF FASILITAS LIST -->
<?php foreach ($fasilitas as $u) { ?>
    <!-- MODAL -->
    <div class="modal fade" id="modal<?php echo $u->id_fasilitas ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modalll">
                    <!-- <img src="<?= base_url() ?>public/home/fasilitas/assets/images/modal-rectangle.png" class="modal-bg" /> -->
                    <div class="modal-content-container">
                        <div class="left">
                            <img src="<?= base_url() ?>public/assets/fasilitas/<?php echo $u->foto_fasilitas ?>" alt="" />
                        </div>
                        <div class="right">
                            <h3><?php echo $u->nama_fasilitas ?></h3>
                            <p>
                                <?php echo $u->deks_fasilitas ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF MODAL -->
<?php } ?>
<script>
    var base_url = '<?php echo base_url() ?>';
</script>
<script src="<?= base_url() ?>public/home/assets/js/main.js"></script>
<script src="<?= base_url() ?>public/home/fasilitas/assets/js/fasilitas.js"></script>