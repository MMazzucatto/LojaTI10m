<?php

include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");

?>


<div class="centroform">

  <form action="#" method="Post" class="row row-cols-lg-auto g-3 align-items-center">
    <div class="col-12">
      <label class="visually-hidden" for="inlineFormInputGroupUsername">Nome do usuario</label>
      <div class="input-group">
        <div class="input-group-text">Email</div>
        <input type="text" name="emailUsu" class="form-control" id="inlineFormInputGroupUsername" placeholder="E-mail do usuario">
      </div>
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-primary">Pesquisar</button>
    </div>
  </form>



  <table class="table">
    <thead>
      <tr>
        <th scope="col">codigo</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Fone</th>
        <th scope="col">Alterar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $emailusu = isset($_POST["emailUsu"]) ? $_POST["emailUsu"] : "";

      if ($emailusu) {


        $dado = visuUsuarioEmail($conn, $emailusu);

        foreach ($dado as $emailUsuarios) :
      ?>
          <tr>
            <th scope="row"><?= $emailUsuarios["idusu"] ?></th>
            <td><?= $emailUsuarios["nomeusu"] ?></td>
            <td><?= $emailUsuarios["emailusu"] ?></td>
            <td><?= $emailUsuarios["foneusu"] ?></td>
            <td>
              <form action="../view/alterarForm.php" method="post">

                <input type="hidden" value="<?= $emailUsuarios["idusu"] ?>" name="codigousu">
                <button type="submit" class="bnt btn-primary">Alterar</button>

              </form>

            </td>

            <td>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Delete
              </button>
            </td>
          </tr>
      <?php
        endforeach;
      }
      ?>
      <!-- Modal -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModal">Exclusão de Usuario</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Tem certeza que deseja excluir o usuario?
            </div>
            <div class="modal-footer">
              <form action="../controler/DeletarUsuario.php" method="post">
                <input type="hidden" class="codigo form-control" name="codigousu">
                <button type="submit" class="bnt btn-primary">Sim</button>
              </form>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
            </div>
          </div>
        </div>
      </div>

      <script>
        var deletarUsuarioModal = document.getElementById('deleteModal');
        deletarUsuarioModal.addEventListener('show.bs.modal', function(event) {
              var button = event.relatedTarget;
              var codigo = button.getAttribute('codigo');
              var email = button.getAttribute('email');
              var modalBody = deletarUsuarioModal.querySelector('.modal-body');
              modalBody.textContent = 'Gostaria de excluir e email' + email + '?'

              var Codigo = dleteUsuarioModal.querySelector('.modal-footer .codigo');
              codigo.value = codigo;
            }
      </script>

      <?php

      include_once("../view/footer.php")

      ?>