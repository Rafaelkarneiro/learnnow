<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="restrito/css/bootstrap.min.css" rel="stylesheet">
    <link href="restrito/css/estilo.css" type="text/css" rel="stylesheet">

    <title>Cadastro</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <?php
                include_once "restrito/conexao.php";

                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $data_nascimento = $_POST['data_nascimento'];
                $senha = $_POST['senha'];
                $foto = $_FILES['foto'];
                $nome_foto = mover_foto2($foto);
                $permissao = $_POST['permissao'];
                if($nome_foto == 0) {
                  $nome_foto = "user.png";
                }

                $sql = "INSERT INTO usuarios(`nome`, `email`, `data_nascimento`, `senha`, `permissao`,`foto`) VALUES ('$nome','$email','$data_nascimento','$senha','$permissao','$nome_foto')";
                

                if (mysqli_query($conn, $sql)) {
                    //CADASTRO AUTOMÁTICO DO USUÁRIOS NA TABELA PROFESSOR OU ALUNO
                    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql); 
                    $num_registros = mysqli_num_rows($result);
                    $linha = mysqli_fetch_assoc($result);
                    $userid = $linha['id'];
                    if($linha['permissao'] == "professor"){
                        $sql = "INSERT INTO professores(`id`,`id_usuario`,`descricao`) VALUES (default,'$userid','')";
                        if (mysqli_query($conn, $sql)) {
                            mensagem1("$nome foi cadastrado com sucesso!",'success');
                        }
                        else{
                            mensagem1("Não foi possível te cadastrar $nome. Volte mais tarde!",'danger');
                        }
                    } 
                    else if($linha['permissao'] == "aluno"){
                        $sql = "INSERT INTO alunos(`id`,`id_usuario`,`descricao`) VALUES (default,'$userid','')";
                        if (mysqli_query($conn, $sql)) {
                            mensagem1("$nome foi cadastrado com sucesso!",'success');
                        }
                        else{
                            mensagem1("Não foi possível te cadastrar $nome. Volte mais tarde!",'danger');
                        }
                    }  
                    //CADASTRO AUTOMÁTICO DO USUÁRIOS NA TABELA PROFESSOR OU ALUNO END      
                }
                else{
                  mensagem1("Não foi possível te cadastrar $nome. Volte mais tarde!",'danger');
                }
            ?>
            <a href="index.php" class="btn btn-primary">Voltar</a>
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