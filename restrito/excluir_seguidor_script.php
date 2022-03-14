<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Remover seguidor</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <?php
                include "conexao.php";

                $id_disc_select = $_GET['id_disc_select'];
                $id_aluno = $_GET['id_aluno'];
                $nome_aluno = $_GET['nome_aluno'];
         
                $sql = "DELETE from matriculas WHERE id_aluno = '$id_aluno' AND id_disciplina = '$id_disc_select' ";

                if (mysqli_query($conn, $sql)) {
                    mensagem1("$nome_aluno removido com sucesso!",'success');
                }
                else{
                    mensagem1("Erro ao remover $nome_aluno!",'danger');
                }
                
            ?>
            <a href="learnnowProfessor.php" class="btn btn-primary">Voltar</a>
        </div>
    </div> 
    

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