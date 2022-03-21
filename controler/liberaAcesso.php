<?php
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");

$email = $POST['email'];
$senha = $POST['senha'];
$acesso = verificaAcesso($comm, $email, $senha);

if($acesso === $email){

    header("Location:../view/indexAdm.php");

}else{
    header("Location:../view/index.php");
   

}
?>