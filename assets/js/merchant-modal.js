$(function() {
  $('.detailProduct').on('click', function() {
    const id = $(this).data('id');
    $.ajax({
      url: 'http://localhost/inilho.its.ac.id/merchandise/details',
      data: {id : id},
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $('#product').html(data.category + ' ' + data.product);
        $('#price').html('IDR ' + data.price);
        $('#code').html(data.code);
        $('#image1').attr('src','http://localhost/inilho.its.ac.id/assets/img/product/' + data.image1);
        if(data.category === 'Tie Dye T-Shirt' || data.category === 'Hoodie' || data.category === 'T-Shirt') {
          document.getElementById("sizeOption").style.display = "block";
        } else {
          document.getElementById("sizeOption").style.display = "none";
        }
        if (data.image2 == null) {
          $('#image2').attr('src','http://localhost/inilho.its.ac.id/assets/img/product/' + data.image1);
        } else {
          $('#image2').attr('src','http://localhost/inilho.its.ac.id/assets/img/product/' + data.image2);
        }
      }
    });
  })
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})