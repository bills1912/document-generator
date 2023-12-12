/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
// 
// Scripts
// 


$('#waktuPeminjaman').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd'
});
$('#waktuPengembalian').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd'
});


window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

$(document).ready(function () {
    $('#judulBukuDipinjam').select2({
        dropdownParent: $('#tambahPeminjamBukuForm'),
        theme: 'bootstrap-5',
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
})

$('.modal').on('shown.bs.modal', function () {
    // $(this).find('[autofocus]').focus();
    $("input[name!='phone']").on('click', function () {
        if ($(this).val() == 0) {
            $(this).addClass('is-invalid');
        }
    });
    $("select[name='status']").on('click', function () {
        if ($(this).val() == 0) {
            $(this).addClass('is-invalid');
        }
    });
    $("textarea[name='typeDataRequest']").on('click', function () {
        if ($(this).val() == 0) {
            $(this).addClass('is-invalid');
        }
    });
    $("input[name!='phone']").on('change', function () {
        $(this).addClass('is-invalid');
        if ($(this).val() == 0) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });
    $("select[name='status']").on('change', function () {
        $(this).addClass('is-invalid');
        if ($(this).val() == 0) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });
    $("textarea[name='typeDataRequest']").on('input', function () {
        $(this).addClass('is-invalid');
        if ($(this).val() == 0) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });
    $('#tambahRespondenForm').validate({
        errorClass: "invalid",
        errorPlacement: function (error, element) {
            if (element.attr('id') == 'name-error') {
                return false;
            }
        },
        rules: {
            name: {
                required: true
            },
            affiliation: {
                required: true
            },
            status: {
                required: true
            },
            dataRequestTime: {
                required: true
            },
            typeDataRequest: {
                required: true
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
    $('#editRespondenForm').validate({
        errorClass: "invalid",
        errorPlacement: function (error, element) {
            if (element.attr('id') == 'name-error') {
                return false;
            }
        },
        rules: {
            name: {
                required: true
            },
            affiliation: {
                required: true
            },
            status: {
                required: true
            },
            dataRequestTime: {
                required: true
            },
            typeDataRequest: {
                required: true
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});

