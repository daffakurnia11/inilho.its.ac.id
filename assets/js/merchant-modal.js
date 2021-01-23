$(function() {
  $('.detailProduct').on('click', function() {
    const code = $(this).data('id');
    $.ajax({
      url: 'http://localhost/inilho.its.ac.id/merchandise/details',
      data: {code :code},
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $('#product').html(data.category + ' ' + data.product);
        $('#price').html('IDR ' + data.price);
        $('#code').html(data.code);
        if(data.category === 'Tie Dye T-Shirt' || data.category === 'Hoodie' || data.category === 'T-Shirt') {
          document.getElementById("sizeOption").style.display = "block";
        } else {
          document.getElementById("sizeOption").style.display = "none";
        }
      }
    });
    // const code = data.code;
    // console.log(code);
    $.ajax({
      url: 'http://localhost/inilho.its.ac.id/merchandise/images',
      data: {code :code},
      method: 'post',
      dataType: 'json',
      success: function(data) {
        // console.log(data);
        $('.carousel-inner').empty();
        $.each(data,function(index, value) {
          const element = `<div class="carousel-item d-flex jcc aic" data-interval="1000">
          <img src="`+`http://localhost/inilho.its.ac.id/assets/img/product/` + value.image + `" class="h-100 d-inline-block">
        </div>`
          $('.carousel-inner').append(element);
        });
        $('.carousel-item').first().addClass('active');
      }
    });
  })
});