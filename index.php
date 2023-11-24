<?php
include "./config/connect.php";
include "./models/users.php";

$data = data();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Simple Data Table</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


    <style>
    .blurred td:not(.actions) {
        filter: blur(3px);
        opacity: 0.7;
        transition: filter 0.3s ease, opacity 0.3s ease;
    }
    body {
        color: #566787;
        background: black;
        font-family: 'Roboto', sans-serif;
    }
    #myTable{
        background-color:#161515;
        color: white;
    }
    #myTable tr{
        background-color:#161515;
        color: white;


    }
    .table-responsive {
        margin: 30px 0;
    }
    .table-wrapper {
        min-width: 1000px;
        background: #161515;
        color: white;
        padding: 20px;
        border: 1px solid #161515;
        border-radius: 50px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
        min-width: 100%;
    }
    .table-title h2 {
        margin: 8px 0 0;
        font-size: 22px;
    }
    .search-box {
        position: relative;        
        float: right;
    }
    .search-box input {
        height: 34px;
        border-radius: 20px;
        padding-left: 35px;
        border-color: #ddd;
        box-shadow: none;
    }
    .search-box input:focus {
        border-color: #3FBAE4;
    }
    .search-box i {
        color: #a0a5b1;
        position: absolute;
        font-size: 19px;
        top: 8px;
        left: 10px;
    }
    table.table tr th, table.table tr td {
        border-color: #3c3b3b;
    }   
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child {
        width: 130px;
    }
    table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
    }
    table.table td a.view {
        color: #03A9F4;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }    
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 95%;
        width: 30px;
        height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 30px !important; 
        text-align: center;
        padding: 0;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
    .pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 6px;
        font-size: 95%;
    }    
    .dataTables_length{
        color: wheat !important;
    }
    .dataTables_filter{
        color: wheat !important;
    }
    .dataTables_info{
        color: wheat !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled{
        color: wheat !important;
      
    } 
    
    .dataTables_length select{
        color: wheat !important;
        border: 1px solid wheat !important;
        border-radius: 10px !important;
    }
    .dataTables_length select option{
        color: wheat !important;
        background-color: #161515;
    }
    .dataTables_filter input{
        color: wheat !important;
    }
    .dataTables_filter input{
        color: wheat !important;
        border: 1px solid wheat !important;
        border-radius: 20px !important;
        outline: none !important;
        height: 30px !important;
    }
    .PDF{
        margin-left: 80px;
    }
    .col-sm-4 a{
        border-radius: 10px;
    }
    .col-sm-4 button{
        border-radius: 10px;
    }

    .swal2-popup{
        background-color: #353333 !important;
        color: wheat !important;
    }
    .swal2-popup .swal2-header .swal2-title{
        color: wheat !important;
    }
    .swal2-popup .swal2-content .swal2-html-container{
        color: wheat !important;
    }

    </style>

</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Customer <b>Details</b></h2>
                        </div>
                        <div class="col-sm-4">
                            <!-- <div class="search-box d-flex"> -->
                                <!-- <i class="material-icons">&#xE8B6;</i>
                                <input type="text" class="form-control" placeholder="Search&hellip;"> -->
                                <a href="./models/pdf.php" class="btn btn-secondary PDF">PDF <i class="bi bi-file-earmark-pdf-fill"></i></a> &nbsp;

                                <button id="downloadButton" class="btn btn-success">Excel <i class="bi bi-file-earmark-spreadsheet-fill"></i></button> &nbsp;
                                <a href="./models/addusers.php" class="btn btn-primary">add <i class="bi bi-node-plus-fill"></i> </a>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
                <table id="myTable" class="table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>F_NAME</th>
                            <th>L_NAME</th>
                            <th>JOB</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $d): ?>
                            <tr>
                                <td>
                                    <?= $d->idp ?>
                                </td>
                                <td>
                                    <?= $d->nom ?>
                                </td>
                                <td>
                                    <?= $d->prenom ?>
                                </td>
                                <td>
                                    <?= $d->about ?>
                                </td>
                                <td class="actions">
                                    <a href="#" class="view" title="View" onclick="blurRow(this)" data-toggle="tooltip">
                                        <i class="bi bi-eye-slash-fill"></i>
                                    </a>
                                    <a href="./models/modifyusers.php?id=<?= $d->idp ?>" class="edit" title="Edit" data-toggle="tooltip">
                                        <i class="material-icons">&#xE254;</i>
                                    </a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="confirmDelete(<?= $d->idp ?>)">
                                        <i class="material-icons">&#xE872;</i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>

    
    
    
    <script>
        $('#myTable').DataTable();
        function confirmDelete(userId) {

            Swal.fire({
                title: 'Are you sure?',
                text: 'do you want to delete this customer!',
                // icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = `./models/deleteusers.php?id=${userId}`;
                }
            });
        }

        // blur row
        function blurRow(icon) {
            var row = icon.closest('tr');
            var eyeIcon = icon.querySelector('i');

            row.classList.toggle('blurred');

            eyeIcon.classList.toggle('bi-eye-slash-fill');
            eyeIcon.classList.toggle('bi-eye-fill');

        }

        // export excel

        var downloadButton = document.getElementById('downloadButton');

        downloadButton.addEventListener('click', function () {
            // Call a function to generate the Excel file and trigger the download
            exportToExcel();
        });

        function exportToExcel() {
            // Get the table data
            var table = document.querySelector('.table');

            // Create a new Blob
            var blob = new Blob([tableToExcel(table)], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });

            // Trigger the download
            saveAs(blob, 'exported_data.xlsx');
        }

        // Function to convert the table to Excel format
        function tableToExcel(table) {
            var html = '<table>';
            var rows = table.querySelectorAll('tr');

            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].querySelectorAll('td, th');
                html += '<tr>';

                for (var j = 0; j < cells.length; j++) {
                    html += '<td>' + cells[j].innerText + '</td>';
                }

                html += '</tr>';
            }

            html += '</table>';
            return html;
        }

        // Function to trigger the download
        function saveAs(blob, filename) {
            var link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = filename;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }


        // generate pdf



    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-autotable@3.5.14/dist/jspdf.plugin.autotable.min.js"></script>



</body>

</html>