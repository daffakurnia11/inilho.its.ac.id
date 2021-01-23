const url = 'http://localhost/inilho.its.ac.id/';
// Please change the URL with Our Base URL!!

$(function() {
  $('.detailProduct').on('click', function() {
    const code = $(this).data('id');
    $.ajax({
      url: url + 'merchandise/details',
      data: {code :code},
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $('#idForm').val(data.id);
        $('#priceForm').val(data.price);
        $('#nameForm').val(data.product);
        $('#categoryForm').val(data.category);
        $('#product').html(data.category + ' ' + data.product);
        $('#priceValue').html('IDR ' + data.price);
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
      url: url + 'merchandise/images',
      data: {code :code},
      method: 'post',
      dataType: 'json',
      success: function(data) {
        // console.log(data);
        $('.carousel-inner').empty();
        $.each(data,function(index, value) {
          const element = `<div class="carousel-item d-flex jcc aic" data-interval="1000">
          <img src="`+ url + `assets/img/product/` + value.image + `" class="h-100 d-inline-block">
        </div>`
          $('.carousel-inner').append(element);
        });
        $('.carousel-item').first().addClass('active');
      }
    });
  })
});

$(function() {
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  $('.swalDefaultSuccess').click(function() {
    Toast.fire({
      icon: 'success',
      title: 'Barang berhasil ditambahkan ke Keranjang !'
    })
  });
});