// $(".modal-edit-data-peminjam").prependTo("body");

$('#mulaiKegiatan').datepicker({
    uiLibrary: "bootstrap4",
    format: 'dd mmmm yyyy'
});
$('#akhirKegiatan').datepicker({
    uiLibrary: "bootstrap4",
    format: 'dd mmmm yyyy'
});
$('#tanggalTTD').datepicker({
    uiLibrary: "bootstrap4",
    format: 'dd mmmm yyyy'
});

$('#dataTablePeminjamanBuku').on('click', '.editDataPeminjam', function (e) {
    console.log('hello world');
    $('#dataRequestTime').datepicker({
        uiLibrary: "bootstrap5",
        format: 'yyyy-mm-dd'
    });
});

$('#dataTableSuratTugas').DataTable();
