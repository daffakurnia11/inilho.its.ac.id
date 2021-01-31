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
    <img src="<?= base_url() ?>public/home/assets/images/logo.png" alt="Logo ILITS2021" />
  </div>
  <div class="medspons-container">
    <div class="medspons">
      <h3>Media Partner</h3>
      <div class="medspons-content">
        <img src="<?= base_url() ?>public/home/assets/images/google.png" />
        <img src="<?= base_url() ?>public/home/assets/images/google.png" />
        <img src="<?= base_url() ?>public/home/assets/images/google.png" />
        <img src="<?= base_url() ?>public/home/assets/images/google.png" />
        <img src="<?= base_url() ?>public/home/assets/images/google.png" />
      </div>
    </div>

    <div class="medspons">
      <h3>Sponsor</h3>
      <div class="medspons-content">
        <img src="<?= base_url() ?>public/home/assets/images/google.png" />
        <img src="<?= base_url() ?>public/home/assets/images/google.png" />
      </div>
    </div>
  </div>
  <p id="footer-copy">&copy; Copyright Ini LHO ITS 2021. All Rights Reserved</p>
</div>


<!-- END OF FOOTER -->

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="<?php echo base_url().'public/home/assets/js/jquery-3.5.1.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'public/home/assets/js/jquery-ui.js'?>" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#departemen').autocomplete({
      source: "<?php echo site_url('home/complete');?>",

      select: function(event, ui) {
        $(this).val(ui.item.label);
        $("#form_search").submit();
      }
    });
  });
</script>

</body>

</html>