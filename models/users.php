<?php
function data(){
    global $pdo;
    $qry= "SELECT * FROM profile";
    $sql=$pdo->prepare($qry);
    $sql->execute();
    
    $all= $sql->fetchAll(PDO::FETCH_OBJ);
    
    
   return $all;
}
