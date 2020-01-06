<?php
    session_start();

    if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
        echo "Sessao privada";
    } else {
        header("Location: login.php");
    }
?>
