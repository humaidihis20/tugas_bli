"use strict";

$("[data-checkboxes]").each(function () {
    var me = $(this),
        group = me.data("checkboxes"),
        role = me.data("checkbox-role");

    me.change(function () {
        var all = $(
                '[data-checkboxes="' +
                    group +
                    '"]:not([data-checkbox-role="dad"])'
            ),
            checked = $(
                '[data-checkboxes="' +
                    group +
                    '"]:not([data-checkbox-role="dad"]):checked'
            ),
            dad = $(
                '[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'
            ),
            total = all.length,
            checked_length = checked.length;

        if (role == "dad") {
            if (me.is(":checked")) {
                all.prop("checked", true);
            } else {
                all.prop("checked", false);
            }
        } else {
            if (checked_length >= total) {
                dad.prop("checked", true);
            } else {
                dad.prop("checked", false);
            }
        }
    });
});

$("#table-1").dataTable({
    columnDefs: [{ sortable: false, targets: [2, 3] }],
    drawCallback: function () {
        // delete transaksi
        $(".deleteitems").on("click", function () {
            let urlReport = $(this).data("id");
            swal({
                title: "Data Akan Dihapus?",
                text: "Anda tidak bisa memulihkannya lagi setelah data dihapus",
                icon: "warning",
                buttons: ["Batal", "Hapus Data"],
                dangerMode: true,
            }).then(function (value) {
                if (value) {
                    window.location.href = urlReport;
                    swal({
                        title: "Berhasil Dihapus!",
                        text: "Data Penjualan Berhasil Dihapus",
                        icon: "success",
                    });
                } else {
                    swal("Gagal Dihapus", "Data masih tersimpan", "error");
                }
            });
        });
    },
});
$("#table-2").dataTable({
    columnDefs: [{ sortable: true, targets: [2] }],
});
// $("#table-2").dataTable({
//   "columnDefs": [
//     { "sortable": false, "targets": [0,2,3] }
//   ]
// });
