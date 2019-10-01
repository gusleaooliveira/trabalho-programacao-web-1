<?php

if($_POST){
    require 'Usuario.class.php';
    if(isset($_POST['nome'])
    and isset($_POST['idade'])
    and isset($_POST['altura'])
    and isset($_POST['peso'])){
        $usuario = new Usuario($_POST['nome'], $_POST['idade'], $_POST['altura'], $_POST['peso']);
        echo $usuario   ;
    }
}

?>