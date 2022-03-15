<?php
include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/jogoModel.php");


extract($_REQUEST,EXTR_OVERWRITE);


if(inserirJogos($conn,$nomejogo,$valorjogo,$generojogo,$qtdjogo,$datalancamentojogo,$studiojogo)){
echo("O perfil foram cadastro com sucesso !!!");
}else{
echo("O perfil esta incompleto, tente novamente !!!");

}

include_once("../view/footer.php");
?>