const url = 'http://localhost/inilho.its.ac.id/';
// Please change the URL with Our Base URL!!

// Sweetalert
const flashdata = $('#flash-data').data('flashdata');
const viewcart = url + 'merchandise/viewcart';
if (flashdata) {
  if (flashdata == 'Dihapus') {
    Swal.fire({
      icon: 'success',
      title: 'Keranjang ' + flashdata,
      text: 'Barang berhasil ' + flashdata + ' dari keranjang!'
    })
  } else if (flashdata == 'Dikosongkan') {
    Swal.fire({
      icon: 'success',
      title: 'Keranjang ' + flashdata,
      text: 'Keranjang belanja ' + flashdata + '! Silakan kembali berbelanja'
    })
  } else if (flashdata == 'Bundle') {
    Swal.fire({
      icon: 'warning',
      title: 'Keranjang Gagal Ditambah',
      text: 'Silakan pilih Bundle serta produk yang disediakan!'
    })
  } else {
    Swal.fire({
      icon: 'success',
      title: 'Keranjang ' + flashdata,
      text: 'Barang berhasil ' + flashdata + ' dalam keranjang!',
      footer: '<a href=' + viewcart + '>Cek keranjang belanja</a>'
    })
  }
}

$('.btn-delete').on('click', function(e) {
  e.preventDefault();
  const href = $(this).attr('href');
  Swal.fire({
    title: 'Apakah barang ingin dihapus?',
    text: "Barang akan segera dihapus.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#OCOC6D',
    cancelButtonColor: '#f6014f',
    confirmButtonText: 'Hapus Barang',
    cancelButtonText: 'Batalkan'
  }).then((result) => {
    document.location.href = href;
  })
})

$('.btn-red').on('click', function(e) {
  e.preventDefault();
  const href = $(this).attr('href');
  Swal.fire({
    title: 'Apakah keranjang ingin dikosongkan?',
    text: "Barang akan dihapus semua dari keranjang belanja",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#OCOC6D',
    cancelButtonColor: '#f6014f',
    confirmButtonText: 'Hapus Barang',
    cancelButtonText: 'Batalkan'
  }).then((result) => {
    document.location.href = href;
  })
})

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

  $('.bundle-detail').first().addClass('show');

  $('#check-code').on('click', function() {
    var code = $('#code_referral').val();
    $.ajax({
      url: url + 'merchandise/referral',
      data: {
        code: code
      },
      method: "POST",
      dataType: 'json',
      success: function(data) {
        var shipping = $("option:selected",'#package').attr("cost");
        var payment = $('#total-price').html();
        if (data) {
          $('#referral').html('Diskon ' + data.discount + '%');
          
          var total = parseInt(shipping) + (parseInt(payment) * ((100 - parseInt(data.discount)) / 100));

          $('#total-payment').html('Rp. ' + total + ',00');
          $('input[name=shipping]').val(shipping);

          $('input[name=total]').val(total);
        } else {
          $('#referral').html('Tidak Ditemukan');
          var total = parseInt(shipping) + parseInt(payment);

          $('#total-payment').html('Rp. ' + parseInt(total) + ',00');
        }
      }
    });
  })
  $('#check-code').on('click', function() {
    var total = $('#total-payment').html();
    $('input[name=total]').val(total);
  })
});