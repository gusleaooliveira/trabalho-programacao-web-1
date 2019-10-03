<?php

if($_POST){
    session_start();

    require 'Usuario.class.php';
    if(isset($_POST['nome'])
    and isset($_POST['idade'])
    and isset($_POST['altura'])
    and isset($_POST['peso'])){
        $usuario = new Usuario($_POST['nome'], $_POST['idade'], $_POST['altura'], $_POST['peso']);
    }

    if(isset($_SESSION['usuarios']) == false or count($_SESSION['usuarios']) < 2){
        if(isset($_SESSION['usuarios']) == false){
            $_SESSION['usuarios'] = array(serialize($usuario));
        }
        else {
            array_push($_SESSION['usuarios'], serialize($usuario));
        }
        echo 'Volte e cadastre o próximo usuário!';
    }
    else if(count($_SESSION['usuarios']) == 2){
        array_push($_SESSION['usuarios'], serialize($usuario));
        for($i = 0; $i < count($_SESSION['usuarios']); $i++){
            $usuario = unserialize($_SESSION['usuarios'][$i]);
            echo $usuario;
            echo '<hr/>';
        }
    }
    else {
        
        
        for($i = 0; $i < count($_SESSION['usuarios']); $i++){
            $usuario = unserialize($_SESSION['usuarios'][$i]);
            echo $usuario;
            echo '<hr/>';
        }
    }


}
?>