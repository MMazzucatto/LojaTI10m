<?php 
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");
include_once("../view/header.php");

extract($_REQUEST, EXTR_OVERWRITE);

if(alterarUsuario($conn,$codigousu,$nomeusu,$emailusu,$foneusu,$cpfusu,$tipousu,$cepusu,$numusu,$compusu)){
echo("Dados alterados com sucesso.");
}else{
echo("Dados não alterados");
}

include_once("../view/footer.php");

?>