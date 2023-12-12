// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTablePeminjamanBuku').DataTable({
    "_fnApplyColumnDefs": [{
      "className": "dt-head-center",
      "targets": '_all'
    },
    {
      "className": "dt-body-center",
      "targets": [1, 2, 3]
    },
    ],
  });
});
