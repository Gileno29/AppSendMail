<?php
    session_start();
    if(!($_SESSION['autenticado']=='SIM')){
        header('location:login.php?erro2');
    }

?>