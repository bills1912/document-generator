/*!
* Start Bootstrap - Personal v1.0.1 (https://startbootstrap.com/template-overviews/personal)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-personal/blob/master/LICENSE)
*/

// This file is intentionally blank
// Use this file to add JavaScript to your project

const observer = new IntersectionObserver(entries => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');
        }
    });
});

const hiddentElements = document.querySelectorAll('.hidden');
hiddentElements.forEach((el) => observer.observe(el));

function ignoreRefresh(e) {
    alert('hello');
    e.preventDefault();
};

$('#guest-permintaan-data').DataTable({
    orderCellsTop: true,
    responsive: true,
    columnDefs: [{
        className: "dt-head-center",
        targets: '_all'
    },
    {
        width: 150,
        targets: 0
    },
    {
        width: 200,
        targets: 4
    },
    {
        width: 150,
        targets: 3
    },
    {
        className: "dt-body-center",
        targets: [1, 2, 3, 5]
    }],
    initComplete: function () {
        this.api()
            .columns(1)
            .every(function () {
                let column = this;

                // Create select element
                let select = document.createElement('select');
                select.add(new Option('-- Pilih Status --', ''));
                column.footer().replaceChildren(select);

                // Apply listener for user change in value
                select.addEventListener('change', function () {
                    var val = DataTable.util.escapeRegex(select.value);

                    column
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                });

                // Get the search data for the first column and add to the select list
                this
                    .cache('search')
                    .sort()
                    .unique()
                    .each(function (d) {
                        select.append(new Option(d));
                    });
            });
    }
});
$('#dataRequestTime').datepicker({
    uiLibrary: "bootstrap5",
    format: 'yyyy-mm-dd'
});

$(".guest-modal-edit").prependTo("body");

$('#guest-permintaan-data').on('click', '.hapusResponden', function (e) {
    e.preventDefault();
    // alert('halo');
    let href = $(this).attr('href');
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