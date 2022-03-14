<?php
@ob_start();
session_start();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="./css/estilobod.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="shortcut icon" type="imagex/png" href="./IMAGENS/logoln2.png">
    <!-- Bootstrap CSS -->

<title>Login</title>
</head>
<body>
<header>
    <img src="./IMAGENS/logoln2.png" alt="">
    <!--
        <img src="IMAGENS/logoteste.png" class="logo">
    -->
    <h3><strong>Learn Now</strong></h3>
       
    <ul>
        <li><!--LOGIN-->
            <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#exampleModal1" style=" margin-left:10px; color:white;font-family: 'Poppins', sans-serif; background: #47AB36;">Entrar</button>
            <a type="button" class="btn btn-light" href="cadastro.php"  style=" margin-left:10px; color:black; font-family: 'Poppins', sans-serif;">Cadastrar</a>          
        </li>
    </ul>
</header>
<!--<div>
    <img src="./IMAGENS/Learnnow.png" alt="" style="margin-top: 40px; width:100%">
</div>-->


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="top:70px; ">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner" style="position:static" ><!-- "position" estava sem parâmetro, ai coloquei "static" pra tirar o erro-->
    <div class="carousel-item active" style="height:500px; top: -100px">
      <img src="IMAGENS/fundo principal 1.png" class="d-block w-100" alt="..." style="background-size:cover; margin-top:-50px;">
      <div class="carousel-caption d-none d-md-block" style="top:55%;">
        <h4 style="margin-bottom:30px;">Nunca foi tão facil se conectar com o mundo educacional</h4>
        <p style="font-size: 18px;">
            Com nosso sistema você vai encontrar uma maneira facil e rápida de se conectar com o mundo educacional. Já imaginou tirar aquela dúvida com o professor na hora da atividade ou então se comunicar com um colega de classe para resolver algum 
            trabalho? se você já pensou em alguma dessas coisas, você está no lugar certo. 
        </p>
      </div>
    </div>
    <div class="carousel-item"  style="height:500px; top: -100px">
      <img src="IMAGENS/fundo principal 2.png" class="d-block w-100" alt="..." style="background-size:cover; margin-top:-50px">
      <div class="carousel-caption d-none d-md-block" style="top:55%;">
        <h4 style="margin-bottom:30px;">Já imaginou postar conteudos em apenas 3 cliques?</h4>
        <p style="font-size: 18px;">
            Com o Learnnwow isso é possivel, com apenas 3 cliques você consegue postar conteudos, avisos e muito mais!
        </p>
      </div>
    </div>
    <div class="carousel-item" style="height:500px; top: -100px">
      <img src="IMAGENS/fundo principal 3.png" class="d-block w-100" alt="..."  style="background-size:cover; margin-top:-50px">
      <div class="carousel-caption d-none d-md-block" style="top:55%;">
        <h4 style="margin-bottom:30px;">Já ficou perdido em um sistema com muitas dúvidas do que fazer? Sem problemas, resolvemos isso para você.</h4>
        <p style="font-size: 18px;">Nosso sistema foi projetado para ser mais facil e prático de usar, sem que você tenha aquela dúvida ao buscar o que deseja fazer. </p>
      </div>
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


<section >

<div class="container">
    <div class="titulo"> 
        <h5>O que nós oferecemos</h5>
    </div>
    <div class="card_descricao" style="text-align:justify">
        <!--Card do Feed-->
        <div class="card" style="width: 18rem;">
            <img src="IMAGENS/feed.png" class="card-img-top" alt="..." style=" background-size:cover; margin-top:0.1px">
            <div class="card-body">
                <p class="card-text">📰️Feed: Realize e receba postagens em seu feed de forma simples e intuitiva!</p>
            </div>
        </div>

        <!--Cadr do Chat-->
        <div class="card" style="width: 18rem;">
            <img src="IMAGENS/chat.png" class="card-img-top" alt="..." style=" background-size:cover; margin-top:0.1px">
            <div class="card-body">
                <p class="card-text">🗨️ Chat: Interaja com outros usuários atravéns de um chat de conversas</p>
            </div>
        </div>

         <!--Cadr do Chat-->
         <div class="card" style="width: 18rem;">
            <img src="IMAGENS/seguir.png" class="card-img-top" alt="..." style=" background-size:cover; margin-top:0.1px">
            <div class="card-body">
                <p class="card-text">🎓Seguir: Siga disciplinas de professores para receber seu conteúdo compartilhado.</p>
            </div>
        </div>

         <!--Cadr do Chat-->
         <div class="card" style="width: 18rem;">
            <img src="IMAGENS/busca.png" class="card-img-top" alt="..." style=" background-size:cover; margin-top:25px">
            <div class="card-body">
                <p class="card-text">🔎Pesquisar: Pesquise por outros usuários que também utilizam a plataforma</p>
            </div>
        </div>

    </div>

</div>

    <!--///////////////////////////////////////////////////////LAYOUT ANTIGO/////////////////////////////////////////////////-->

    <!--<div id="titulo">
        <h2>O que nós oferecemos</h2>
    </div>

    <div id="chatImg">
        <img src="./IMAGENS/chatImg.svg" alt="">
        
        <p>Chat integrado [ em construção ]</p>

        <p1 style="margin-left:440px;">Oferecemos um chat integrado para interação entre os usuários  <br><p1 style="margin-left: 440px;">postagem é enviada para seus alunos</p1> </p1>
    </div>

    <div id="feedPost">
        <img src="./IMAGENS/feed.svg" alt="">
        <p>Feed de postagens (para o professor)</p>
        <p1 style="margin-left:200px;">Oferecemos a função de postagens em um feed aos professores, em poucos cliques sua primeria <br><p1 style="margin-left: 200px;">postagem é enviada para seus alunos</p1> </p1>
    </div>

    <div id="payment">
        <img src="./IMAGENS/payment.svg" alt="">
        <p>Plataforma gratuita</p>
        <p1 style="margin-left:420px;">Aproveite todas as funcionalidades do Learn Now gratuitamente!</p1>
    </div>

    <div id="mobile">
        <img src="./IMAGENS/mobileDev.svg" alt="">
        <p>Resposividade para Dispositivos Móveis [ em construção ]</p>
        <p1 style="margin-left:500px;">Interface responsiva para celulares e tablets  </p1>
    </div>-->
</section>

<footer class="rodape">
    <div class="conteudo">
        
    <div class="contato">
        <label class=titulo> Contatos:</label><br>
        <label>Tel: (12) 3144-6078 / (12) 3445-8964</label><br>
        <label>E-mail:learnnowestudareaqui@gmail.com</label><br>
        <br>
        <label> Learn Now 2021  </label><br>
        </div>  
    </div>


</footer>


<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-size:30px; margin-left: 75px; color:rgb(68, 156, 68);">Bem Vindo de Volta!<i class="bi bi-emoji-laughing"></i></i></h5>  
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="input-group-sm mb-2">
                <div class="mb-3">
                    <form class="modal-body" action="index.php" method="POST">           
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="email"  aria-describedby="emailHelp">
                            <small class="form-text">Entre com seu Email</small>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Senha</label>
                            <input type="password" class="form-control" name="senha">
                        </div>
                           
                        <?php
                            if(isset($_POST['email'])) {
                                $email = $_POST['email'];
                                $senha = $_POST['senha'];

                                include_once "restrito/conexao.php";
                                include_once "bd/config.php";
                                

                                $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

                                $result = mysqli_query($conn, $sql); 
                                $num_registros = mysqli_num_rows($result);
                                
                                if($num_registros == 1){
                                    $linha = mysqli_fetch_assoc($result);
                                    $y = $linha['id'];

                                    if(($email == $linha['email']) and ($senha == $linha['senha'])) {
                                        if($linha['permissao'] == "professor"){

                                            $sql1 = "SELECT * FROM professores 
                                            WHERE id_usuario = '$y' ";

                                            $result1 = mysqli_query($conn, $sql1); 
                                            $num_registros1 = mysqli_num_rows($result1);
                                
                                            if($num_registros1 == 1){
                                                $linha1 = mysqli_fetch_assoc($result1);

                                                session_start();
                                                $_SESSION['id_session'] = $linha['id'];
                                                $_SESSION['id_prof_session'] = $linha1['id'];
                                                header("location: restrito/learnnowProfessor.php");
                                            }    
                                        } 
                                        else if($linha['permissao'] == "aluno"){

                                            $sql1 = "SELECT * FROM alunos 
                                            WHERE id_usuario = '$y' ";

                                            $result1 = mysqli_query($conn, $sql1); 
                                            $num_registros1 = mysqli_num_rows($result1);
                                
                                            if($num_registros1 == 1){
                                                $linha1 = mysqli_fetch_assoc($result1);

                                                session_start();
                                                $_SESSION['id_session'] = $linha['id'];
                                                $_SESSION['id_aluno_session'] = $linha1['id'];
                                                header("location: restrito/learnnowAluno.php");
                                            }
                                        }  
                                    }
                                    else{
                                        echo "Email invalido";
                                    }
                                }
                                else{
                                    echo "Email ou senha não encontrados ou inválidos.";
                                }
                            }                                     
                        ?>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Entrar</button>
                            <a type="button" class="btn btn-primary" href="cadastro.php">Criar Conta</a>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>


<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>-->
</body>
</html>