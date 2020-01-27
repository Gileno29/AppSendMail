<?php
    session_start();
    echo'aqui estoy';
    if(session_destroy()){
        header('location:login.php');
    }else{
        echo 'erro ao fazer logoff ';
    }
?>