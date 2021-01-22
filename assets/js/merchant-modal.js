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
        $('#catalog').attr('src','http://localhost/inilho.its.ac.id/assets/img/product/' + data.catalog);
        if (data.detail1 == null) {
          $('#detail1').attr('src','http://localhost/inilho.its.ac.id/assets/img/product/' + data.catalog);
        } else {
          $('#detail1').attr('src','http://localhost/inilho.its.ac.id/assets/img/product/' + data.detail1);
        }
      }
    });
  })
});