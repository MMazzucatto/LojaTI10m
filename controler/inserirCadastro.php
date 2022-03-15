<?php
include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");


extract($_REQUEST,EXTR_OVERWRITE);


if(inserirUsuario($conn,$nomeusu,$emailusu,$foneusu,$cpfusu,$tipousu,$cepusu,$numusu,$compusu)){
echo("O perfil foram cadastro com sucesso !!!");
}else{
echo("O perfil esta incompleto, tente novamente !!!");

}

include_once("../view/footer.php");
?>