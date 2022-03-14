<?php 
  include("./bd/config.php"); 

  if(isset($_POST['botao'])){
      
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $data = $_POST['data_nascimento'];
    $foto = $_FILES['foto'];
    $permissao = 'professor';
    $permissao2 = 'aluno';

    
    if(isset($_FILES['foto'])){
      $extensao = strtolower(substr($_FILES['foto']['name'],-20));
      $novo_nome = md5(time()) .$extensao;
      $diretorio = "user/";
    
      move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);
    
      /*$arq="INSERT INTO usuario (foto) VALUE ('".$extensao."')";
      $conecta->exec($arq);*/
      if($_POST['radiobtn'] == "professor"){
        $texto="INSERT INTO usuario (nome, senha, email, data_nascimento, foto, permissao) VALUE ('".$nome."','".$senha."','".$email."','".$data."','".$extensao."','".$permissao."')";
        $conecta->exec($texto);
      }

      if($_POST['radiobtn'] == "aluno"){
        $texto="INSERT INTO usuario (nome, senha, email, data_nascimento, foto, permissao) VALUE ('".$nome."','".$senha."','".$email."','".$data."','".$extensao."','".$permissao2."')";
        $conecta->exec($texto);

      }

    
    }

    /*$texto="INSERT INTO usuario (nome, senha, email, data_nascimento, foto) VALUE ('".$nome."','".$senha."','".$email."','".$data."','".$foto."')";
    $conecta->exec($texto);*/
 
  }
    
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="css/estilobod.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
   
    <link rel ="shortcut icon" href="IMAGENS/logoteste.png" >
    <title>Document</title>
</head>
<body>

    <header>
        <!--<img src="IMAGENS/logoteste.png" class="logo">-->
        <h3><strong>Learn Now</strong></h3>
        
        
        <ul>
        
            <li> <!--LOGIN-->


            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1" style=" margin-left:10px; color:white; font-family:Raleway;">
            Entrar
            </button>



            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal"  style=" margin-left:10px; ">
            Cadastrar
            </button>
                
            </li>
        </ul>
    </header>

  

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="width:900px;">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
           <div class="carousel-item active">
              <img src="IMAGENS/3.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="IMAGENS/1.jpeg" class="d-block w-100" alt="..." style="height: 395px;">
            <div class="carousel-caption d-none d-md-block">
              <h5>eai</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="IMAGENS/2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>TEste </h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
      
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>


  <!--MODAL DO LOGIN-->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="font-size:30px; margin-left: 75px; color:rgb(68, 156, 68);">Bem Vindo de Volta!<i class="bi bi-emoji-laughing"></i></i> </h5>
              
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form class="modal-body" action="" method="POST" >

              <div class="input-group-sm mb-2">
               
                <div class="mb-3">

                  Email
                  <input class="form-control" type="text" name="user" placeholder="learnnow@example.com" ><br>
                  Senha
                  <input class="form-control" type="password" name="senha">

                </div>
               
              </div>

            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Vo</button>
              
              <button type="button" name="login" class="btn btn-outline-success" data-bs-dismiss="modal">Entrar</button>
            </div>
          </div>
       </div>
    </div>

    <!--MODAL DO CADASTRO-->

    <div class="modal" id="exampleModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cadastre-se no LearnNow</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form class="modal-body" action="" method="POST" enctype="multipart/form-data">

                        <input type="file" name="foto" id="foto"><br><br>
                                                      
                          <label>Nome de Usuario  </label style ="margin-top: 5px">
                          <input class="form-control" type="text" name="nome" placeholder="Usuario" style="margin-bottom:5px;">
                          Email
                          <input class="form-control" type="text" name="email" placeholder="learnnow@example.com" require style="margin-bottom:5px" >
                          Senha
                          <input class="form-control" type="password" name="senha" require style="margin-bottom:5px" require>
                          Data de nascimento
                          <input class="form-control" type="date" name="data_nascimento" require>
                          <h5 >Como deseja se cadastrar?</h5>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="radiobtn" value="professor">Professor
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="radiobtn" value="aluno" checked>Aluno  
                          </div>
    
                        
                    
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fecha</button>
                                <input type="submit" value="Entrar" name="botao" class="btn btn-outline-success">
                            </div>
                            </div>
                        </form> 
                      
                    </div>
                </div>
            
        </div>



     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    
    
</body>
</html>

 <!--<i class="bi bi-person-circle" style="font-size: 3rem; color:rgb(157, 157, 158)"> </i><br>-->
<!-- <div class="input-group-sm mb-2">

<input type="file" name="foto" id="foto" style="margin-bottom:5px"><br>


</div><br>
<h5 >Como deseja se cadastrar?</h5>
<div class="form-check">
  <input class="form-check-input" type="radio" name="radiobtn" value="professor">Professor
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="radiobtn" value="aluno" checked>Aluno  
</div>
<div class="modal-footer">
<button type="button" >Voltar</button>
<button type="button" name="finalizarcadastro" class="btn btn-outline-primary" data-bs-dismiss="modal">Cadastrar</button>
</div>    