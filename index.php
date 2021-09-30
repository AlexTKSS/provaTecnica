<!DOCTYPE html>
<html lang="pt-br">
  <style>
    *{
      margin: 0;
      padding: 0;
    }
  </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Prova Técnica</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script src="sweetalert.js"></script>
 <link rel="stylesheet" type="text/css" href="style.css">       
 <body>
  <script>
    $('.btn-del').on('click', function(e){
      e.preventDefault();
      const href = $(this).attr('href')
    })
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
    title: 'Exclusão de Time',
    text: "Deseja realmente excluir o time <?php $del ?>",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Excluir',
    cancelButtonText: 'Cancelar',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      swalWithBootstrapButtons.fire(
        'Deletado!',
        'O time foi excluído com sucesso',
        
      )
    } else if (
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire = false(
        
      )
    }
  })
  </script>


<div class="times de futebol">
    <h1>Times de Futebol</h1>
</div>
<table class="table">
    <thead>
      <?php
        include("action.php");
        $sql=("SELECT tbtime.id,testado.nome,tbtime.time,testado.UF FROM tbtimefutebol as tbtime LEFT JOIN tbestado as testado ON tbtime.idtbestado = testado.id");
        $registros = $conn->prepare($sql);
        $registros->execute(); 
        $result = $registros->fetchAll();
        
         
        ?>
      <tr>
        <th scope="col">Time de Futebol</th>
        <th scope="col">Estado</th>
        <th scope="col">UF</th>
        <th scope="col"></th>
        <th><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
+
</button></th>
        
        </tr>
    </thead>
    <tbody>
      <?php foreach ($result as $key => $dados) { 
      ?>
      <tr>
        <th scope="row"><?php echo $dados['time']?></th>
        <td><?php echo $dados['nome']?></td>
        <td><?php echo $dados['UF']?></td>
        <td><a href="delete.php?id=<?php echo $dados['id']; ?>"class="btn-del">Delete</a></td>
        <td><a href="inserir.php?id=<?php echo $dados['id']; ?>"class="btn-insert">Insert</a></td>
       
        
        </tr>
      <?php }
      ?>
    </tbody>
  </table>
  <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
    <label class="btn btn-outline-primary" for="btnradio1">Previous</label>

    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
    <label class="btn btn-outline-primary" for="btnradio1">1</label>
  
    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
    <label class="btn btn-outline-primary" for="btnradio2">2</label>
  
    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
    <label class="btn btn-outline-primary" for="btnradio3">3</label>

    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
    <label class="btn btn-outline-primary" for="btnradio1">Next</label>
  </div>
  <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')
    myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
})
</script>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Novo Time</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
      <input type="text" class="form-control" id="validationCustom01" value="Nome do Time" required>
      <div>
    <label for="validationCustom04" class="form-label">Estado</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Escolher Estado</option>
      <option><?php  echo $dados['']?></option>
      </select>
    <div class="invalid-feedback">
      Por favor selecione um Estado Válido
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Criar</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>