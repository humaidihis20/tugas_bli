@section('script')
<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="{{ asset('../dist/assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('../dist/assets/modules/jquery.mask.min.js') }}"></script>
<script src="{{ asset('../dist/assets/modules/popper.js') }}"></script>
<script src="{{ asset('../dist/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('../dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('../dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('../dist/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('../dist/assets/js/stisla.js') }}"></script>

{{-- SweetAlert --}}
<script src="{{ asset('../dist/assets/js/page/modules-sweetalert.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{-- dataTables --}}
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('../dist/assets/modules/datatables/datatables.min.js') }} "></script>
<script src="{{ asset('../dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }} "></script>
<script src="{{ asset('../dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }} "></script>
<script src="{{ asset('../dist/assets/modules/jquery-ui/jquery-ui.min.js') }} "></script>
<script src="{{ asset('../dist/assets/js/page/modules-datatables.js') }} "></script>

{{-- datepicker --}}
<script src="{{ asset('../dist/assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('../dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
<script src="{{ asset('../dist/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('../dist/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('../dist/assets/modules/cleave-js/dist/cleave.min.js') }}"></script>

{{-- upload file --}}
<script src="{{ asset('../dist/assets/modules/summernote/summernote-bs4.js') }} "></script>

<script src="{{ asset('../dist/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }} "></script>
<script src="{{ asset('../dist/assets/js/page/features-post-create.js') }} "></script>

<script src="{{ asset('../dist/assets/modules/prism/prism.js') }} "></script>
<script src="{{ asset('../dist/assets/js/page/bootstrap-modal.js') }} "></script>

{{-- select 2 --}}
<script src="{{ asset('../dist/assets/modules/select2/dist/js/select2.full.min.js') }} "></script>

<!-- Template JS File -->
<script src="{{ asset('../dist/assets/js/scripts.js') }}"></script>
<script src="{{ asset('../dist/assets/js/custom.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // Format mata uang.
        $( '.mata_uang' ).mask('000.000.000.000.000.000', {reverse: true});
    })
</script>
@endsection