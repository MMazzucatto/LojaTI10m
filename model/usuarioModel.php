<?php 

function inserirUsuario($conn,$nomeusu,$emailusu,$foneusu,$cpfusu,$tipousu,$cepusu,$numusu,$compusu,$senhausu,$pinusu) {
    
    $salto =['cost' => 8];

    $senhaCrip = password_hash($senhausu,PASSWORD_BCRYPT,$salto);



$query = "INSERT INTO `tbusuario` (`idusu`, `nomeusu`, `emailusu`, `foneusu`, `tipousu`, `cpfusu`, `cepusu`, `numusu`, `compleusu`,`senhausu`,`pinusu`) VALUES (NULL,'{$nomeusu}','{$emailusu}','{$foneusu}','{$tipousu}','{$cpfusu}','{$cepusu}','{$numusu}','{$compusu}','{$senhaCrip}','{$pinusu}')";


$dados = mysqli_query($conn,$query);
return $dados; 

};

function visuUsuarioNome($conn,$nomeusu){
    $query = "select * from tbusuario where nomeusu like '%{$nomeusu}%'";
    $resultado = mysqli_query($conn, $query);
    return $resultado;
     
};

function visuUsuarioEmail($conn, $emailusu){
    $query = "select * from tbusuario where emailusu like '%{$emailusu}%'";
    $resultado = mysqli_query($conn, $query);
    return $resultado;
};

function visuUsuarioCodigo($conn, $codigousu){
    $query = "select * from tbusuario where idusu = '{$codigousu}'";
    $resultado = mysqli_query($conn, $query);
    $resultado = mysqli_fetch_array($resultado);
    return $resultado;
};

function alterarUsuario($conn,$codigousu,$nomeusu,$emailusu,$foneusu,$cpfusu,$tipousu,$cepusu,$numusu,$compusu){
    $query = "update tbusuario set nomeusu='{$nomeusu}', emailusu='{$emailusu}', foneusu='{$foneusu}', tipousu='{$tipousu}', cpfusu='{$cpfusu}', cepusu='{$cepusu}', numusu='{$numusu}', compleusu='{$compusu}' where idusu = '{$codigousu}'";

    $resultado = mysqli_query($conn, $query);
    return $resultado;
};

function deletarUsuario($conn,$codigousu){
    $query = "delete from tbusuario where idusu='{$codigousu}'";
    $resultado = mysqli_query($conn,$query);
    return $resultado;
};

function verificaAcesso($conn, $email, $senha){
    $query = "select * from tbusuario where emailusu={'$email'}";
    $resultado = mysqli_query($conn,$query);
    if(mysqli_num_rows($resultado) > 0 ){
        $row = mysqli_fetch_assoc($resultado);
        if(password_verify($senha,$row["senhausu"])){
            $_SESSION["email"] = $row["emailusu"];
            return $row["emailusu"];
        }else{
            return "Acesso Negado1";
        }
    }else{
        return "Acesso Negado2";
    }
    return "Acesso Negado3";
}  
function usarAcesso(){
    $email = isset ($_SESSION ["email"]);
    if (!$email){
        $_SESSION["msg"] = "<div class = 'alert alert-danger' role = 'alert'> Faça login para ter acesso ao sistema.</div>";
        header("Location: ../View/index.php");
        die();
    }
}  

function logout(){
    return session_destroy();
}
?>