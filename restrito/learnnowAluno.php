<?php
  include_once "../bd/config.php";
  include_once "../validar.php";
  include_once "conexao.php";
    
  $sql = "SELECT * FROM usuarios WHERE id = {$_SESSION['id_session']}";
  $result = mysqli_query($conn, $sql); 
  $num_registros = mysqli_num_rows($result);
  if($num_registros == 1){
    $linha = mysqli_fetch_assoc($result);
  }    

    include 'app/db.conn.php';
  	include 'app/helpers/user.php';
  	include 'app/helpers/conversations.php';
    include 'app/helpers/timeAgo.php';
    include 'app/helpers/last_chat.php';

  	# Getting User data data
  	$user = getUser($_SESSION['id_session'], $conn);

  	# Getting User conversations
  	$conversations = getConversation($user['id'], $conn);
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/fonts/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/learnnow.css">
    <link rel="stylesheet" href="../css/styleChat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="imagex/png" href="../IMAGENS/logoln2.png">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script> 

    <title>Learn Aluno</title>
</head>
<body>

<!--CABEÇALHO-->
<nav class="navbar navbar-expand-md navbar-light "  style="padding: 12px; background-color: #3D9ACE;position:fixed; z-index: 9; width: 100%;">
    <div class="container-fluid">
        <!--<img src="../IMAGENS/logoln2.png" alt="" style="width:13px;margin-left: 50px">-->
        <label style="margin-left: 85px; padding-right: 670px; color: white; font-weight: bold; font-size: 27px;">LearnNow</label>
        
        <div style="margin-left: -582px; margin-right: 190px;">
            <form class="d-flex">
                <input class="form-control me-2" type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar perfil" aria-label="Search">
                <!--<button class="btn btn-outline-success" type="submit">Buscar</button>-->
                </form>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="margin-top: -40px;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="learnnowAluno.php" style="padding-right: 30px; color: white; margin-top:5px;">Pagina inicial</a>
                </li>
                <!--<li class="nav-item">
                  <a class="nav-link" href="#" style="padding-right: 30px; color: white;" >Features</a>
                </li>-->
                <!--<li class="nav-item">
                  <a class="nav-link" href="#" style="padding-right: 30px; color: white;">Criar disciplina</a>
                </li>-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;"> <img src="./img/<?php echo $linha['foto']; ?>" style="border-radius:70px; width: 30px;height: 30px; left: 92px;" alt=""> </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="padding-top: 2px; font-size: 15px; height: 150px; margin-top: 12px;">
                        <li>
                            <a class="dropdown-item" href="cadastro_edit.php" style="margin-top: 10px;">Editar perfil</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="../logout.php"style="margin-top: 10px;">Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>

<div class="chatgeral">
    <label> 
        <!--<span class="material-icons" style="transform: translate(-14%,20%);">feed</span>--><img src="../bootstrap-icons-1.7.1/layout-text-window-reverse.svg" alt="" width="24"> Ultimas postagens</img>
    </label>
</div>

<!--PERFIL DO USUARIO-->
<div class="perfil">
    <img src="./img/<?php echo $linha['foto']; ?>" style="border-radius:70px; width: 68px;height: 68px; left: 92px;top: 12px;" alt="">  
      
    <h4 style="margin-top: -50px; text-align: justify;font-size:14px; max-width: 120px; font-weight:bold; line-height: 18px; margin-left:102px;"><?php echo $linha['nome'];?></h4>

    <p style="margin-top: -7px; text-align: center;font-size:13px; margin-left:-6px;"><?php echo $linha['permissao'];?></p>
</div>

<!--DISCIPLINAS-->
<div class="disciplinas">
         
<!--<button type="submit" role="button" class="chat">
    <a href="home.php">Iniciar conversa<span class="material-icons">question_answer</span></a>
</button>-->
            
    <!-- BOTÃO ENTRAR DISCIPLINA-->
    <div class="addDisciplina">        
        <label> Suas disciplinas <img src="../bootstrap-icons-1.7.1/mortarboard-fill.svg" alt="" width="24"><!--<span class="material-icons">school</span>--></label>

        <div class="div_disciplinas">

            <?php 
                
                $query = $conecta->query("SELECT disciplinas.id, disciplinas.nome FROM disciplinas
                JOIN alunos on alunos.id_usuario =  {$_SESSION['id_session']}
                JOIN matriculas on disciplinas.id = matriculas.id_disciplina and matriculas.id_aluno = alunos.id
                ORDER BY disciplinas.nome                
                ");
                
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    
                foreach($resultado as $item){
                    echo '<hr>'.'<a href="disciplinaAluno.php?id_disc_select='.$item['id'].'" style="text-decoration:none">'.'<p style="margin-top: 5px; text-align: center;font-size: 14px; cursor: pointer; color:black;">'.$item['nome'].'</br>'.'</p>'.'</a>';                
                }
            ?>    
        </div>
    </div>
</div>

<!--FEED-->
<div class="feedAluno"> 
    <?php
        $query9 = $conecta->query(
            "SELECT usuarios.nome as n1, disciplinas.nome as n2, usuarios.foto, posts.id, posts.postagem, posts.data_postagem, posts.hora_postagem FROM posts 
            JOIN matriculas ON matriculas.id_aluno = {$_SESSION['id_aluno_session']} and matriculas.id_disciplina = posts.id_disciplina
            JOIN professores ON professores.id = posts.id_professor
            JOIN disciplinas ON disciplinas.id = posts.id_disciplina
            JOIN usuarios ON usuarios.id = professores.id_usuario
            ORDER BY posts.id desc
            ");
    
            $resultado9 = $query9->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultado9 as $item9){
                $pathx = "./img/"; 
                echo '<div class="card" style="height: 200px; margin-top:30px; width: 610px; margin-left:30px; padding:10px; font-size:14px">'.'<img src = "'.$pathx.$item9["foto"].'" style="width:40px; border-radius:40px ; margin-left:15px; margin-top:10px">'.'<p style="margin-left:65px; margin-top:-30px; font-weight: bold; font-size:15px">'.$item9['n1'].'</p>'.'<h5 style="font-weight: bold; font-size:35px; margin-left:230px; margin-top: -55px">'.'.'.'</h5>'.'<p style="margin-left: 250px;  margin-top: -30px;">'.$item9['n2'].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.mostra_data($item9['data_postagem']).'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$item9['hora_postagem'].'</p>'.'<p style="margin-left: 15px; margin-top:8px; font-size:14px">'.$item9['postagem'].'</p>'.'</br>'.'</div>';         
            } 
    ?>  
</div><!--</div>(?)-->
</main> 

<div class="resultado" style="list-style:none; position: fixed; 
background: whitesmoke; width: 650px; margin-left:345px; margin-top:70px;
box-shadow: 4px 0px 20px  rgba(0, 0, 0, 0.25);">

</div>



 <!--Iniciar Conversa (Chat)-->
<div class="p-2 w-400
                rounded shadow">
    	<div>
    		<div class="d-flex
    		            mb-3 p-3 
			            justify-content-between
			            align-items-center"
						style="border-radius:4px;background-color: #E3E3E3; height:45px">
    			<div class="d-flex
    			            align-items-center" style="height:100px; width:145px">
    			    <img src="img/<?=$user['foto']?>"
    			         class="w-25 rounded-circle">
                    <h3 style="font-size: 15px; margin-left:10px;margin-top:6px">Mensagens</h3>
    			</div>
    			<!--<a href="learnnowAluno.php"
    			   class="btn btn-dark">Home</a>-->
				
    		</div>

    		<div class="input-group mb-3" style="margin-left:-34px; width:450px; margin-top:-20px ">
    			<input type="text"
    			       placeholder="Digite o nome de usuario"
    			       id="searchText"
    			       class="form-control">
    			<button class="btn btn-primary" 
    			        id="serachBtn" style="height: 40px; margin-top:20px;">
    			        <i class="fa fa-search"></i>	
    			</button>       
    		</div>

            <div class="div_chat">

                <ul id="chatList"
                    class="list-group mvh-50 overflow-auto">
                    <?php if (!empty($conversations)) { ?>
                        <?php 
    
                        foreach ($conversations as $conversation){ ?>
                        <li class="list-group-item">
                            <a href="chat.php?user=<?=$conversation['id']?>" 
                               class="d-flex
                                      justify-content-between
                                      align-items-center p-2">
                                <div class="d-flex
                                            align-items-center">
                                    <img src="img/<?=$conversation['foto']?>"
                                         class="w-10 rounded-circle">
                                    <h3 class="fs-xs m-2">
                                        <?=$conversation['nome']?><br>
                          <small>
                            <?php 
                              echo lastChat($_SESSION['id_session'], $conversation['id'], $conn);
                            ?>
                          </small>
                                    </h3>            	
                                </div>
                                <?php if (last_seen($conversation['last_seen']) == "Active") { ?>
                                    <div title="online">
                                        <div class="online"></div>
                                    </div>
                                <?php } ?>
                            </a>
                        </li>
                        <?php } ?>
                    <?php }else{ ?>
                        <div class="alert alert-info 
                                    text-center">
                           <i class="fa fa-comments d-block fs-big"></i>
                           Ainda não há mensagens, comece uma conversa
                        </div>
                    <?php } ?>
                </ul>
            </div>
        </div>
            </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script type="text/javascript" src="personalizado.js"></script>
<script>
    $(function(){
        $(".button-collapse").sideNav();
    });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){
      
      // Search
       $("#searchText").on("input", function(){
       	 var searchText = $(this).val();
         if(searchText == ""){
             window.location.reload()
         }
         $.post('app/ajax/search.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });

       // Search using the button
       $("#serachBtn").on("click", function(){
       	 var searchText = $("#searchText").val();
         if(searchText == "") return;
         $.post('app/ajax/search.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });


      /** 
      auto update last seen 
      for logged in user
      **/
      let lastSeenUpdate = function(){
      	$.get("app/ajax/update_last_seen.php");
      }
      lastSeenUpdate();
      /** 
      auto update last seen 
      every 10 sec
      **/
      setInterval(lastSeenUpdate, 10000);

    });
</script>

</html>