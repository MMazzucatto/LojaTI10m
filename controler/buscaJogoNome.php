<?php
    include_once("../model/conexao.php");
    include_once("../model/jogoModel.php");
    
    
    $nome = $_POST["jogoUsu"];
    
    if(visuJogoNome($conn, $nomejogo)){
        header("Location:../view/visuJogoNome.php");
    }else{
        header("Location:../view/visuJogoNome.php");
    }

?>