const url = 'http://localhost/inilho.its.ac.id/';
// Please change the URL with Our Base URL!!

// Sweetalert
const flashdata = $('#flash-data').data('flashdata');
const viewcart = url + 'merchandise/viewcart';
const numberFormatter = new Intl.NumberFormat('id-ID','currency');

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
  } else if (flashdata == 'Salah') {
    Swal.fire({
      icon: 'error',
      title: 'Gagal Upload!',
      text: 'Bukti Transfer yang dikirim salah format! Gunakan format jpg/png/JPG'
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
    if (result.isConfirmed) {
      document.location.href = href;
    }
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
    if (result.isConfirmed) {
      document.location.href = href;
    }
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
        $('#priceValue').html('IDR ' + numberFormatter.format(data.price) + ',00');
        $('#descProduct').html(data.description);
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
        $('.product-images').empty();
        $.each(data,function(index, value) {
          const element = `<div class="carousel-item image-detail text-center d-flex" data-interval="2000">
          <img src="`+ url + `public/merchandise/img/product/` + value.image + `" class="max-auto d-block w-100">
        </div>`
          $('.product-images').append(element);
        });
        $('.image-detail').first().addClass('active');
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
        var payment = $('#total-price').attr("value");
        if (data) {
          if (data.discount) {
            var discount = parseInt(payment) * (parseInt(data.discount)/100);
            if (discount >= parseInt(data.max)) {
              discount = parseInt(data.max);
            }

            var total = parseInt(shipping) + (parseInt(payment) - discount);
            
            $('#referral').html('<span>IDR</span>' + '<span> - ' + numberFormatter.format(discount) + ',00</span>');
            
            $('#total-payment').html(numberFormatter.format(total) + ',00');
            
            $('input[name=shipping]').val(shipping);
            $('input[name=bonus]').val(discount);
            $('input[name=total]').val(total);
            $('input[name=referral]').val(code);
          } else if (data.free) {
            var total = parseInt(shipping) + parseInt(payment);
            
            $('#referral').html('<span>FREE</span>' + '<span class="font-weight-normal">' + data.free + '</span>');
            
            $('#total-payment').html(numberFormatter.format(total) + ',00');
            
            $('input[name=shipping]').val(shipping);
            $('input[name=bonus]').val(data.free);
            $('input[name=total]').val(total);
            $('input[name=referral]').val(code);
          } 
        } else {
          $('#referral').html('<div class="text-center">Tidak Ditemukan</div>');
          var totalNoDiscount = parseInt(shipping) + parseInt(payment);
          
          $('input[name=shipping]').val(shipping);
          $('input[name=bonus]').val('');
          $('input[name=total]').val(totalNoDiscount);
          $('input[name=referral]').val('');

          $('#total-payment').html(numberFormatter.format(parseInt(totalNoDiscount)) + ',00');
        }
      }
    });
  })
  $('#check-code').on('click', function() {
    var total = $('#total-payment').html();
    $('input[name=total]').val(total);
  })
});

function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;
}