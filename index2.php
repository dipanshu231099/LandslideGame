<?php

    session_start();
    $unqid = uniqid('',true);
    $_SESSION["uid"] = "$unqid";
    $cryptid = md5($unqid);
    $_SESSION["cid"] = "$cryptid";
    //var_dump($cryptid);
    header('Location: consent.php?id='.$cryptid);
    
    die();
?>