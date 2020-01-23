<?php

    session_start();
    $conn = new mysqli('localhost','user','password','u978805288_acs_draft');
    $q1 = "DROP TABLE IF EXISTS dd;";
    $q2 = "CREATE TABLE dd (
        day int(11) primary key auto_increment,
        invest int(11) not null
        );";

    $res1 = mysqli_query($conn,$q1);
    $res2 = mysqli_query($conn,$q2);
    $unqid = uniqid('',true);
    $_SESSION["uid"] = "$unqid";
    $cryptid = md5($unqid);
    $_SESSION["cid"] = "$cryptid";
    //var_dump($cryptid);
    header('Location: consent.php?id='.$cryptid);
    
    die();
?>