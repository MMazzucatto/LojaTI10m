<?php 
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");
include_once("../view/header.php");

extract($_REQUEST, EXTR_OVERWRITE);

if(deletarUsuario($conn,$codigousu)){
echo("Usuario excluido com sucesso.");
}else{
echo("Usuario não Excluido");
}

include_once("../view/footer.php");

?>