<?php
  include_once "../bd/config.php";
  include_once "../validar.php";
  include_once "conexao.php";
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="imagex/png" href="../IMAGENS/logoln2.png">

    <title>Editar Cadastro</title>
  </head>
  
  <style>
      body{
    background: #e9dfdf62;

        }
  </style>
  <body>
  
    <?php

        $sql = "SELECT * FROM usuarios WHERE id = {$_SESSION['id_session']}";
        $dados = mysqli_query($conn,$sql);
        $linha = mysqli_fetch_assoc($dados);

    ?>
    <!-- Container cadastro -->
    <div class="container" style="margin-top: 120px;">
        <div class="row">
            <div class="col">
                <h1>Atualizar dados</h1>
                <!-- Forms de cadastro -->
                <form action="edit_perfil_script.php" method="POST" enctype="multipart/form-data">
                    <br>
                    <div class="form-group">
                        <label for="nome" class="form-label">Nome completo</label>                        
                        <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome'];?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required value="<?php echo $linha['email'];?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="data" class="form-label">Data de nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" required value="<?php echo $linha['data_nascimento'];?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="text" class="form-control" name="senha" required value="<?php echo $linha['senha'];?>">
                    </div>
                    <br>
                    
                    <!--teste permissao-->
                    <div class="form-group">
                        <label for="permissao" class="form-label">Permissão</label>
                        <input type="radio" class="form-check-input" name="permissao" required value="<?php echo $linha['permissao'];?>" checked>Aluno
                    </div>
                    <!--teste permissao-->

                    <!-- Botão de Cadastro -->
                    <div class="form-group">
                        <?php
                        if($linha['permissao']=="professor"){
                            echo'<a type="button" class="btn btn-danger" href="learnnowProfessor.php">Voltar</a>';
                        } 
                        elseif($linha['permissao']=="aluno"){
                            echo'<a type="button" class="btn btn-danger" href="learnnowAluno.php">Voltar</a>';
                        } 
                        ?>    
                        <input type="submit" class="btn btn-success" value="Salvar Alterações">
                        <input type="hidden" name="id" value="<?php echo $linha['id'];?>">
                    </div>
                    <!-- Fim botão de Cadastro -->
                </form>
                <!-- Fim forms de Cadastro -->
            </div>
        </div>
    </div> 
    <!-- Fim container cadastro -->

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>