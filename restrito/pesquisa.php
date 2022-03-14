<?php
  include "../validar.php";
?>

<?php 
    include "conexao.php";
    
    $sql = "SELECT * FROM `usuarios` WHERE id = {$_SESSION['id_session']}";
    $result = mysqli_query($conn, $sql); 
    $num_registros = mysqli_num_rows($result);
    if($num_registros == 1){
      $linha = mysqli_fetch_assoc($result);
    }        
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/learnnow.css">

  <title>Pesquisar</title>
</head>
<body>

<!-- Verifica se foi feito alguma busca -->
<?php

  $pesquisa = $_POST['busca'] ?? '';
  
  $sql = "SELECT * FROM usuarios WHERE nome LIKE '%$pesquisa%'";

  $dados = mysqli_query($conn,$sql);

?>
<!-- Fim verifica se foi feito alguma busca -->

<!--CABEÇALHO-->
<nav class="navbar navbar-expand-md navbar-light "  style="padding: 12px; background-color: #3D9ACE;">
        <div class="container-fluid">
          <label style="margin-left: 85px; padding-right: 670px; color: white; font-weight: bold; font-size: 27px;">LearnNow</label>
          <div style="margin-left: -582px; margin-right: 190px;">
          <form class="d-flex" action="pesquisa.php" method="POST">
            <input class="form-control me-2" type="search" placeholder="Digite um nome..." aria-label="Search" name="busca" autofocus>
            <button class="btn btn-success" type="submit">Buscar</button>
          </form>
        </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="margin-top: -40px;">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" style="padding-right: 30px; color: white; margin-top:5px;">Pagina inicial</a>
              </li>
              <!--<li class="nav-item">
                <a class="nav-link" href="#" style="padding-right: 30px; color: white;" >Features</a>
              </li>-->
              <!--<li class="nav-item">
                <a class="nav-link" href="#" style="padding-right: 30px; color: white;">Criar disciplina</a>
              </li>-->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                
                <img src="./img/<?php echo $linha['foto']; ?>" style="border-radius:70px; width: 30px;height: 30px; left: 92px;" alt="">  
                </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="padding-top: 2px; font-size: 15px; height: 150px; margin-top: 12px;">
                  <li><a class="dropdown-item" href="#" style="margin-top: 10px;">
                    <!--<i class="bi bi-gear-fill"
                    style="transform: translate(-13%,30%);"></i>-->Editar perfil</a>
                  </li>

                  <li><a class="dropdown-item" href="../logout.php" style="margin-top: 10px;">Sair</a></li>

                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>



      
<!-- Container pesquisa -->

<div class="container">
    <div class="row">
        <div class="col">

            <!-- Tabela de busca -->
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Foto</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Email</th>
                  <th scope="col">Data de Nascimento</th>
                  <th scope="col">Perfil</th>
                </tr>
              </thead>
              <tbody>

              <!-- Busca no Banco de dados -->
              <?php

                while ($linha = mysqli_fetch_assoc($dados)) 
                {

                  $nome = $linha['nome'];
                  $email = $linha['email'];      
                  $data_nascimento = $linha['data_nascimento'];
                  $permissao = $linha['permissao'];
                  $data_nascimento = mostra_data($data_nascimento);
                  $foto = $linha['foto'];
                  if(!$foto == null){
                    $mostra_foto = "<img src='img/$foto' class='lista_foto'>";
                  }
                  else{
                    $mostra_foto = "<img src='img/user.png' class='lista_foto'>";
                  }
                
                echo "<tr>
                        <th>$mostra_foto</th>
                        <th scope='row'>$nome</th>
                        <td>$email</td>
                        <td>$data_nascimento</td>
                        <td>$permissao</td>
                      </tr>";
                }
              ?>
                <!--onclick="pegar_dados($cod_pessoa, '$nome')" -->
              <!-- Fim busca no Banco de dados -->
              
              </tbody>
            </table>
            <!-- Fim tabela de busca -->

        <br>
        <!-- Botão voltar -->
        <a type="button" class="btn btn-danger" href="learnnowProfessor.php">Voltar</a>
        </div>
        <!-- Fim botão voltar -->
    </div>
</div> 
             
<!-- Fim container pesquisa -->
  
<!-- Modal -->
<div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="excluir_script.php" method="POST">
          <p>Deseja realmente excluir o <b id="nome_pessoa">Nome da pessoa</b> ?</p>
          
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <input type="hidden" name="nome" id="nome_pessoa2" value="">
          <input type="hidden" name="id" id="cod_pessoa" value="">
          <input type="submit" class="btn btn-danger" value="Sim"></input>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function pegar_dados(id,nome){
    document.getElementById('nome_pessoa').innerHTML = nome;
    document.getElementById('nome_pessoa2').value = nome;
    document.getElementById('cod_pessoa').value = id;
  }
</script>

  <!-- Modal -->               

<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  -->

<script>
  $(function(){
    $(".button-collapse").sideNav();
  });
</script>
</body>
</html>