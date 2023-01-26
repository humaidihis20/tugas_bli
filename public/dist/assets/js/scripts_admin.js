// mata uang
$(document).ready(function(){
  // Format mata uang.
  $( '.currency' ).mask('000,000,000,000,000,000', {reverse: true});
});

$('#customFile').change(function() {
    // Change format file upload
    var i = $(this).prev('label').clone();
    var file = $('#customFile')[0].files[0].name;
    $(this).prev('label').text(file);
});

$(document).ready(function () {
  $('body').on('click', '#show-transaction', function (e) {
    e.preventDefault();
    let getUrl = $(this).data('url');
    let name = $(this).attr('data-name');
    let order_number = $(this).attr('data-order_number');
    let table_number = $(this).attr('data-table_number');
    let payment_method = $(this).attr('data-payment_method');
    let payment_status = $(this).attr('data-payment_status');
    $.get(getUrl, function (data) {
        document.getElementById('name_menu').innerHTML = data.map(function(i) {
          // return i.menu_transaction.name_menu + '<br>' + i.quantity + ' x Rp. ' + i.menu_transaction.price_menu.toLocaleString("id-ID") + '<br>';
          return `${i.menu_transaction.name_menu}` + '<br>' + `${i.quantity}` + ' x Rp. ' + `${i.menu_transaction.price_menu.toLocaleString("id-ID")}` + '<br>';
        }).join('');
        document.getElementById('total').innerHTML = 'Rp. ' +  data.reduce(( a ,b ) => a + (b.menu_transaction.price_menu * b.quantity), 0).toLocaleString("id-ID");
        $('#modal_detail').modal('show');
        $('#exampleModalCenterTitle').html("");
        $('#name').text(name);
        $('#order_number').text(order_number);
        $('#table_number').text(table_number);
        $('#payment_method').text(payment_method);
        $('#payment_status').text(payment_status);
    });
  });
});

// view image
function previewImage(){
  const image = document.querySelector('.inputImage');
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }

}

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix){
  var number_string = angka.replace(/[^,\d]/g, '').toString(),
  split   		= number_string.split(','),
  sisa     		= split[0].length % 3,
  rupiah     		= split[0].substr(0, sisa),
  ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if(ribuan){
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}