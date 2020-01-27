<?php
    session_start();
    $usuario_autenticado=false;
    
    $usuarios= array(array('user'=>'gileno', 'password'=>'12345'),
                    array('user'=>'paulina','password'=>'123456'));


    foreach($usuarios as $user){
        echo "<pre>";
            print_r($user);
            
        echo "</pre>";
        
        if(($user['user']==$_POST['user']) && ($user['password']==$_POST['password'])){
            $usuario_autenticado=true;
        }else{
            echo'Usuario não existe!!';

        }
        

    }

    if($usuario_autenticado){
        $_SESSION['autenticado']='SIM';
        header('location:index.php');

    }else{
        $_SESSION['autenticado']='NAO';
        header('location:login.php?login=erro');
    }



?>