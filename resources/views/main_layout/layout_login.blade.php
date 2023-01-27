<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/BGR.png') }}">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/fontawesome/css/all.min.css') }}">

  {{-- Toast CSS --}}
  <link rel="stylesheet" href="{{ asset('node_modules/izitoast/dist/css/iziToast.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/izitoast/css/iziToast.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  {{-- Datepicker --}}
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/select2/dist/css/select2.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">

  {{-- dataTables CSS --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/chocolat/dist/css/chocolat.css') }}">
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/prism/prism.css') }}">
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('../dist/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('../dist/assets/css/components.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('../dist/assets/css/rtl.css') }}"> --}}

  <script src="{{ asset('../dist/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('../dist/assets/modules/sweetalert/sweetalert.min.js') }}"></script>
  <script src="{{ asset('../dist/assets/js/page/modules-toastr.js') }}"></script>
  <script src="{{ asset('../dist/assets/modules/izitoast/js/iziToast.js') }}"></script>
  <script>
    function tampilkan_uom() {
      let id = $("#uom_id option:selected").attr("id");
        $.get("{{ url('uom') }}"+"/"+id, function (data) {
        console.log(data.nama_uom);
        console.log(data.id);
        $('#nama_uom').val(data.nama_uom);
        });
    }

    function tampilkan_items() {
      let id = $("#nama_item_id option:selected").attr("id");
        $.get("{{ url('priceitem') }}"+"/"+id, function (data) {
        $('#nama_item_id').val(data.nama_item);
        $('#harga_sebelum_pajak').val(data.harga_item);
        $('#harga_sesudah_pajak').val(data.harga_item + (data.harga_item * (11/100)));
        });
    }

    function tampilkan_purchase() {
      let id = $("#nama_item_id option:selected").attr("id");
        $.get("{{ url('purchaseitem') }}"+"/"+id, function (data) {
        // $('#nama_item_id').val(data.nama_item);
        $('#id_quantity').val(data.quantity);
        $('#harga_item').val(data.harga_item);
        });
    }
  </script>
</head>

  <body>
    @yield('sidebar')
    @yield('content')
    @yield('script')
  </body>
</html>
