<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Cadastro de Usuários
    </title>


    <link rel="stylesheet" href="../node_modules/w3-css/3/w3.css">
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>

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
        echo '<h3 class="w3-green">Volte e cadastre o próximo usuário!<a href="../index.html">voltar</a></h3>';
    }
    else if(count($_SESSION['usuarios']) == 2){
        array_push($_SESSION['usuarios'], serialize($usuario));
        for($i = 0; $i < count($_SESSION['usuarios']); $i++){
            $usuario = unserialize($_SESSION['usuarios'][$i]);
            echo $usuario;
        }
    }
    else {
        
        $media = 0;
        $media_imc = 0;
        for($i = 0; $i < count($_SESSION['usuarios']); $i++){
            $usuario = unserialize($_SESSION['usuarios'][$i]);
            echo $usuario;
            $media += $usuario->idade;
            $media_imc += $usuario->calcular_imc(); 
        }
        $media /= count($_SESSION['usuarios']);
        $media_imc /= count($_SESSION['usuarios']);

        $user_temp = new Usuario();
        $categoria = $user_temp->gera_categoria($media_imc);

        echo '<div class="w3-margin w3-card">';
        echo '<h3 class="w3-green w3-center"> Calculo de médias </h3>';
        echo '<div class="w3-padding">';
        echo "<p>A média de idade dos usuários é: <strong>$media</strong></p>";
        echo "<p>A média de imc dos usuários é <strong>$media_imc</strong></p>";
        echo "<p>A mesma(<strong>$media_imc</strong>) é equivalente à categoria: <strong>$categoria</strong>";
        echo '</div>';
        echo '</div>';

    }


}
?>


</body>

</html>