<body class="body-bg-ts">
 <div class="limiter">
  <div class="container-login100">
    <div class="wrap-login100">
      <div class="hide-and-seek">
        <form action="<?php echo base_url()."formtalkshow" ?>" name="regoc" id="regoc" method="POST">
          <span class="login100-form-title">
           PENDAFTARAN TALKSHOW INSPIRATIF INI LHO ITS! 2021
         </span>
         <p style="text-align: center;">Talkshow Inspiratif INI LHO ITS! 2021 "Your are the future: Learn Yourself, Conquer the Future" akan dilaksanakan pada hari Sabtu, 6 Februari 2021, Pukul 08:00 dengan sub-judul yaitu:
          "Mempersiapkan Dunia Kuliah dengan Mengenali Diri Guna Bekal Sukses di Masa Muda" dan "Dinamika Dunia Kerja-Kondisi, Tantangan, dan Cara Efektif Mempersiapkannya Sejak Kuliah".<br>
        Pastikan data yang kalian isikan benar dan sesuai ejaan yang benar ya !</p>
        <hr>

        <div class="container-login100-form-btn">
          <div class="wrap-login100-form-btn">
            <div class="login100-form-bgbtn"></div>
            <button class="login100-form-btn" name="submit" type="submit" form="regoc" value="Daftar!">
              Daftar!
            </button>
          </div>
        </div>
      </form>
      <div>
        <p>Sudah daftar tapi lupa Nomer Registrasinya? Tenang, <a href="#" class="form-link">klik disini yuk</a></p>
      </div>
    </div>
    <div class="hide-and-seek" style="display:none;">
      <form action="<?php echo base_url()."caritalkshow"?>" name="search" id="search" method="POST">
        <span class="login100-form-title">
         CEK PENDAFTARAN TALKSHOW INSPIRATIF INI LOH ITS! 2021
       </span>
       <div class="wrap-input100 validate-input" data-validate = "Tulis email Anda">
        <input class="input100" type="email" name="email">
        <span class="focus-input100" data-placeholder="Masukkan Email Anda"></span>
      </div>
      <div class="container-login100-form-btn">
        <div class="wrap-login100-form-btn">
          <div class="login100-form-bgbtn"></div>
          <button class="login100-form-btn" name="submit" type="submit" form="search" value="Cek!">
            Cek!
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<div class="back-icon-wrapper" style="display:none;">
  <img src="<?php echo base_url(); ?>assets/formEvent/img/back-icon.png"/>
</div>
</body>
</html>