$('#waktuPeminjaman').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd HH:MM'
});
$('#waktuPengembalian').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd'
});

$('body').on('shown.bs.modal', '.modal-edit-data-peminjam', function () {
    $(this).find('select').each(function () {
        $(this).select2({
            dropdownParent: $(document.body),
            theme: 'bootstrap4',
            placeholder: 'Pilih Judul Buku',
            ajax: {
                url: "judulBukuDipinjam",
                processResults: function ({ data }) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.judul_buku,
                                text: item.judul_buku
                            }
                        })
                    }
                }
            }
        });
    });
});

// $('body').delegate('#waktuPeminjam', 'focusin', function () {
//     $(this).datepicker({
//         uiLibrary: 'bootstrap4',
//         format: 'yyyy-mm-dd'
//     })
// });

$(document).ready(function () {
    $('#userJudulBukuDipinjam').select2({
        dropdownParent: $(document.body),
        theme: 'bootstrap4',
        placeholder: 'Pilih Judul Buku',
        ajax: {
            url: "judulBukuDipinjam",
            processResults: function ({ data }) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.judul_buku,
                            text: item.judul_buku
                        }
                    })
                }
            }
        }
    });

    $('#dataTable').on('click', '.hapusDataPeminjamBuku', function (e) {
        e.preventDefault();
        // alert('halo');
        let href = $(this).attr('href');
        console.log(href)
        Swal.fire({
            title: "Hapus Data!",
            text: "Apakah kamu yakin ingin menghapus data?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus data",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = href;
            }
        });
    });

    $('#dataTableSuratTugas').on('click', '.hapusDataSuratTugas', function (e) {
        e.preventDefault();
        // alert('halo');
        let href = $(this).attr('href');
        console.log(href)
        Swal.fire({
            title: "Hapus Data!",
            text: "Apakah kamu yakin ingin menghapus data?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus data",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = href;
            }
        });
    });
});