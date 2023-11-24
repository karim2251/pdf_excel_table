<?php


include "../config/connect.php";

if(isset($_GET['id'])){

    $id=$_GET['id'];
    
    $qry="DELETE FROM profile WHERE idp=?";
    $sql=$pdo->prepare($qry);
    $sql->execute([$id]);

    header('location:../index.php');
}
