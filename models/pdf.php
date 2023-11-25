<?php
require '../vendor/autoload.php';
include "../config/connect.php";
include "./users.php";

$data = data();

use Dompdf\Dompdf;

if (isset($data)) {
    $html = '
        <style>
            /* Include Bootstrap CSS */
            ' . file_get_contents('../styles/css/bootstrap.min.css') . '
            /* Additional styles for the PDF */
            body {
                font-family: "Helvetica", sans-serif;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
                
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
        <h1 class="text-center">Liste Of Customers</h1>
        <table class="table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>F_NAME</th>
                    <th>L_NAME</th>
                    <th>JOB</th>
                </tr>
            </thead>
            <tbody>
    ';

    foreach ($data as $d) {
        $html .= "
            <tr>
                <td>{$d->idp}</td>
                <td>{$d->nom}</td>
                <td>{$d->prenom}</td>
                <td>{$d->about}</td>
            </tr>
        ";
    }

    $html .= '
            </tbody>
        </table>';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("costomers.pdf");
    header('Location: ../index.php');
}
?>
