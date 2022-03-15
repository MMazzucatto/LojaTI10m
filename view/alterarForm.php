<?php
include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");

extract($_REQUEST, EXTR_OVERWRITE);

$informa = visuUsuarioCodigo($conn, $codigousu);


?>

<div class="container">

  <form class="row g-3" action="../controler/alterarUsuario.php" method="post">
    <input type="hidden" name="codigousu" value="<?= $informa["idusu"] ?>">
    <div class="col-md-6">
      
      <label for="inputNome4" class="form-label">Nome</label>
      <input type="text" name="nomeusu" value="<?= $informa["nomeusu"] ?>" class="form-control" id="inputNome4" required>
    </div>
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Email</label>
      <input type="email" name="emailusu" value="<?= $informa["emailusu"] ?>" class="form-control" id="inputEmail4" required>
    </div>
    <div class="col-6">
      <label for="inputFone" class="form-label">Fone</label>
      <input type="text" name="foneusu" value="<?= $informa["foneusu"] ?>" class="form-control" id="inputfone" placeholder="(11)969480059" required>
    </div>
    <div class="col-6">
      <label for="inputCPF" class="form-label">CPF</label>
      <input type="text" name="cpfusu" value="<?= $informa["cpfusu"] ?>" class="form-control" id="inputCPF" placeholder="777.777.777-77" required>
    </div>
    <div class="col-md-4">
      <label for="inputCEP" class="form-label">CEP</label>
      <input type="text" name="cepusu" value="<?= $informa["cepusu"] ?>" class="form-control" id="inputCEP" placeholder="00000-000" required>
    </div>
    <div class="col-4">
      <label for="inputNumero" class="form-label">Número</label>
      <input type="number" name="numusu" value="<?= $informa["numusu"] ?>" class="form-control" id="inputNumero" placeholder="00" required>
    </div>
    <div class="col-4">
      <label for="inputComple" class="form-label">Complemento</label>
      <input type="text" name="compusu" value="<?= $informa["compleusu"] ?>" class="form-control" id="inputComple" placeholder="Casa 2/Bloco -A">
    </div>

<div class="col-md-12">
  <label for="inputTipo" class="form-label">Tipo de usuário</label>
  <select id="inputTipo" name="tipousu" class="form-select">
</div>
    <option selected value="<?= $informa["tipousu"] ?>">
      <?php
      if ($informa["tipousu"] == "1")
        echo ("funcionario");
      else ("cliente");
      ?>
    </option>

    <option value="1">Funcionario</option>
    <option value="2"> Cliente</option>
  </select>
</div>

<div class="col-12">
  <button type="submit" class="btn btn-primary">Alterar</button>
</div>
</form>

</div>

<?php
include_once("footer.php");
?>