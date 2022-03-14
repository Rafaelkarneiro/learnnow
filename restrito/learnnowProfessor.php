<?php
    include_once "../validar.php";
    include_once "conexao.php";
    include_once "../bd/config.php"; 
      
    $sql = "SELECT * FROM usuarios WHERE id = {$_SESSION['id_session']}";
    $result = mysqli_query($conn, $sql); 
    $num_registros = mysqli_num_rows($result);
    if($num_registros == 1){
      $linha = mysqli_fetch_assoc($result);
    } 
    
?>


<?php 

    if(isset($_POST['criar_disciplina'])){
        $id_professor = $_POST['criar_disciplina'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao']; 
        $sql = "INSERT INTO disciplinas(`id`,`id_professor`,`nome`,`descricao`) VALUES (default,'$id_professor','$nome','$descricao')";
        if (mysqli_query($conn, $sql)) {
            //mensagem1("disciplina cadastrada com sucesso!",'success');
        } 
        else{
            //mensagem1("Não foi possível cadastrar $nome. Volte mais tarde!",'danger');
      }
    }
    /* método antigo
    if(isset($_POST['criar_disciplina'])){

      $id_professor = $_GET['id'] = "{$_SESSION['id_session']}"; 
      $nome = $_POST['nome'];
      $descricao = $_POST['descricao'];
      $texto="INSERT INTO disciplinas (nome, descricao, user) VALUE ('".$nome."','".$descricao."','".$id."')";
      $conecta->exec($texto);   
    }*/
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/learnnow.css">
    <link rel="stylesheet" href="../css/styleChat.css">
    <link rel="shortcut icon" type="imagex/png" href="../IMAGENS/logoln2.png">

    <title>Learn Professor</title>
</head>
<body>
<!--CABEÇALHO-->
<nav class="navbar navbar-expand-md navbar-light "  style="padding: 12px; background-color: #3D9ACE; position:fixed; z-index: 9; width: 100%">
    <div class="container-fluid">
        <label style="margin-left: 85px; padding-right: 670px; color: white; font-weight: bold; font-size: 27px;">LearnNow</label>
        <div style="margin-left: -582px; margin-right: 190px;">
            <form  method="POST" class="d-flex">
            <input class="form-control me-2" type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar perfil" aria-label="Search">
            <!--<button class="btn btn-outline-success" name="busca" type="submit">Buscar</button>-->
            <!--<a type="button" class="btn btn-success" name="busca" href="pesquisa.php">Buscar</a>-->
            </form>
        </div>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="margin-top: -40px;"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" style="padding-right: 20px; color: white; margin-top:5px;margin-left: -56px">Pagina inicial</a>
                </li>
      
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                    <img src="./img/<?php echo $linha['foto']; ?>" style="border-radius:70px; width: 30px;height:30px;left: 92px;" alt="">  
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="padding-top: 2px; font-size: 15px; height: 150px; margin-top: 12px;">
                        <li>
                            <a class="dropdown-item" href="cadastro_edit.php" style="margin-top: 10px;"><!--<i class="bi bi-gear-fill"style="transform: translate(-13%,30%);"></i>-->Editar perfil</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="../logout.php" style="margin-top: 10px;">Sair</a>
                        </li>
                    </ul> 
                </li>
            </ul>  
        </div>
    </div>
<!--<button id="botao">Ativar modo escuro</button>-->
</nav>
<main>
<!--REALIZAR POSTAGEM-->
<form action="" method="POST" enctype="multipart/form-data">
    <div class="areaPostagem">
        <div class="mb-3">
            <textarea class="form-control" name=" txtArea"id="Textarea1" rows="4" maxlength="360" ></textarea>
        </div>
     
        <!-- Método antigo
            <select class="form-select form-select-sm" name="disciplina" value="disciplina" aria-label="size 3 select example">
            <option selected disabled >Escolha uma disciplina</option>
        END Método antigo-->
        <select class="form-select form-select-sm" name="disciplina" value="disciplina" aria-label="size 3 select example">
            <option selected disabled >Escolha uma disciplina</option>
            
            <?php
                $id = $linha['id']; 
                $query = $conecta->query("SELECT * FROM disciplinas 
                JOIN professores on professores.id_usuario = {$_SESSION['id_session']}
                and disciplinas.id_professor = professores.id
                ORDER BY nome ASC");
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $item){   
                    echo '<hr><option>'.$item['nome'].'</option>.</br>';
                }
                /*Método antigo
                $id = $_GET['id'] = "{$_SESSION['id_session']}"; 
                $query = $conecta->query("SELECT * FROM disciplina WHERE user = '$id' ORDER BY nome ASC");
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $item){   
                    echo '<hr><option>' .$item['nome'].'</option>.</br>';
                }*/
            ?>

        </select>
        <!--<form action="learnnowProfessor.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <input class="form-control form-control-sm" name="arquivo" type="file" id="formFileMultiple" multiple >
            </div>
        </form>-->
        <br><br>
        <button type="submit" >Postar</button>   
    </div><!--</div>(?)-->
</form>

<!--FEED-->
<?php

    if (isset($_POST['txtArea'])) {
        if (!empty($_POST['txtArea'])) {
            $id = $linha['id']; 
            $id_professor1 = $_SESSION['id_prof_session'];           
            $nome_disciplina1 = $_POST['disciplina'];
            date_default_timezone_set('America/Sao_Paulo');
            $data_post1 = date("Y-m-d");
            $hora_post1 = date("H:i:s"); 

            $sql5 = "SELECT * FROM disciplinas WHERE id_professor = '$id_professor1' AND nome = '$nome_disciplina1' ";
            $result5 = mysqli_query($conn, $sql5); 
            $num_registros5 = mysqli_num_rows($result5);

            if($num_registros5 == 1){
                $linha5 = mysqli_fetch_assoc($result5);
            }    
           

            $id_disciplina1 = $linha5['id'];
            $postagem1 = $_POST['txtArea'];
            $texto="INSERT INTO posts (`id`, `id_professor`, `id_disciplina`, `postagem`,`data_postagem`,`hora_postagem`) VALUES (default,'$id_professor1', '$id_disciplina1', '$postagem1', '$data_post1', '$hora_post1')";
            $conecta->exec($texto);   
            
        }
        else {
            ?>
            <div style ="margin-top:250px; position:absolute; margin-left:370px; width: 600px;">
                <?php
                    mensagem("Campo não preenchido ou disciplina não selecionada!", 'danger');
                ?> 
            </div>
            <?php
        }
    }
        /* TRATAMENTO DE ERRO DA DISCIPLINA
        
        if(!empty($_POST['disciplina'])){
            $texto="INSERT INTO postagem (disciplina) VALUE ('".$_POST['disciplina']."')";
            $conecta->exec($texto);
        }
        else{
            ?>
            <div style ="margin-top:250px; position:absolute; margin-left:370px; width: 600px;">
            <?php
                mensagem("selecione uma disciplina!", 'danger');
            ?> 
            </div>
            <?php  
        }
        echo ' <div style="margin-left:400px; position:fixed; background:blue; height:30px;
        margin-top:250px;">
        O campo nome precisa ser preenchido</div>';
        ;
        */ 
?>

<?php   
    if(isset($_FILES['arquivo'])){
    $extensao = strtolower(substr($_FILES['arquivo']['name'],-20));
    $novo_nome = md5(time()) .$extensao;
    $diretorio = "upload/";

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

    $arq="INSERT INTO documentos (arquivo) VALUE ('".$extensao."')";
    $conecta->exec($arq);
    }
?>

<div class="feed">
    <?php
        /*$arq = $conecta->query("SELECT * FROM documentos ORDER BY id DESC");
        $result = $arq->fetchAll(PDO::FETCH_ASSOC);*/ 
        //$id = $_GET['id'] = "{$_SESSION['id_session']}"; 
        $query = $conecta->query("SELECT posts.id, posts.postagem, posts.data_postagem, posts.hora_postagem, disciplinas.nome FROM posts 
        JOIN disciplinas ON disciplinas.id_professor = {$_SESSION['id_prof_session']} AND posts.id_disciplina = disciplinas.id AND posts.id_professor = {$_SESSION['id_prof_session']}
        ORDER BY posts.id desc
        ");
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultado as $item){
            $pathx = "./img/"; 
            echo '<div class="card" style="height: 200px; margin-top:30px; width: 610px; margin-left:30px; padding:10px; font-size:14px">'.'<img src = "'.$pathx.$linha["foto"].'" style="width:40px; border-radius:40px; margin-left:15px; margin-top:10px">'.'<p style="margin-left:65px; margin-top:-30px; font-weight: bold; font-size:15px">'.$linha['nome'].'</p>'.'<h5 style="font-weight: bold; font-size:35px; margin-left:230px; margin-top: -55px">'.'.'.'</h5>'.'<p style="margin-left: 250px;  margin-top: -30px;">'.$item['nome'].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.'<a style=color:#b8babf>'.mostra_data($item['data_postagem']).'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$item['hora_postagem'].'</a>'.'</p>'.'<p style="margin-left: 15px; margin-top:8px; font-size:14px">'.$item['postagem'].'</p>'.'</br>'.'</div>';         
        }
        /*Método antigo
        $id = $_GET['id'] = "{$_SESSION['id_session']}"; 
        $query = $conecta->query("SELECT * FROM postagem  WHERE user = '$id' ORDER BY id DESC");
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultado as $item){
            $pathx = "./img/"; 
            echo '<div class="card" style="height: 200px; margin-top:30px; width: 610px; margin-left:30px; padding:10px; font-size:14px">'.'<img src = "'.$pathx.$linha["foto"].'" style="width:40px; border-radius:40px ; margin-left:15px; margin-top:10px">'.'<p style="margin-left:65px; margin-top:-30px; font-weight: bold; font-size:15px">'.$linha['nome'].'</p>'.'<h5 style="font-weight: bold; font-size:35px; margin-left:230px; margin-top: -55px">'.'.'.'</h5>'.'<p style="margin-left: 250px;  margin-top: -30px;">'.$item['disciplina'].'</p>'.'<p style="margin-left: 15px; margin-top:8px; font-size:14px">'.$item['postagens'].'</p>'.'</br>'.'</div>';         
        }*/
    ?>                 
</div>
<!--echo '<div class="card" style="height: 50px; margin-top:3px; width: 610px; margin-left:30px; padding:10px; font-size:14px">'."<a href='".$diretorio.$novo_nome."'target='_blank'>".$arquivo['arquivo']."</a>".'</div>';-->

<div class="chatgeral">
    <label><img src="../bootstrap-icons-1.7.1/pencil-square.svg" alt="" width="25"><!--<span class="material-icons" style="transform: translate(1%,20%);">post_add</span>--> Criar postagem</label>
</div>
     
<!--PERFIL-->  
<div class="perfil" >
    <img src="./img/<?php echo $linha['foto']; ?>" style="border-radius:70px; width: 68px;height: 68px; left: 92px;margin-top: 34px;" alt="">  
    <h4 style="margin-top: -50px; text-align: justify;font-size:14px; font-weight:bold; line-height: 18px; margin-left:102px; max-width:120px "><?php echo $linha['nome'];?></h4>
    <p style="margin-top: -7px; text-align: center;font-size:13px; margin-left:15px"><?php echo $linha['permissao'];?></p>
</div>   
    
<!--DISCIPLINAS-->
<div class="disciplinas">
    <!-- Button trigger modal -->
    <p style="margin-top: 25px; text-align: center; font-weight: bold;">Disciplinas</p>
    
    <div class="div_disciplinas">
        <p style="margin-top: 20px; text-align: center; font-size: 14px;">

            <?php
                $id = $_GET['id'] = "{$_SESSION['id_session']}"; 
                $query = $conecta->query("SELECT disciplinas.id, disciplinas.nome FROM disciplinas 
                JOIN professores on professores.id_usuario = {$_SESSION['id_session']}
                and disciplinas.id_professor = professores.id
                ORDER BY nome ASC");
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $item){
                    echo '<hr>'.'<a href="disciplinaProfessor.php?id_disc_select='.$item['id'].'" style="text-decoration:none">'.'<p style="margin-top: 5px; text-align: center;font-size: 14px; cursor: pointer; text-decoration:none; color:black;">'.$item['nome'].'</br>'.'</p>'.'</a>';                
                }
                /* Método antigo
                $id = $_GET['id'] = "{$_SESSION['id_session']}"; 
                $query = $conecta->query("SELECT * FROM disciplina WHERE user ='$id' ORDER BY nome ASC");
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

                foreach($resultado as $item){
                    echo '<hr>'.'<a href="disciplinaProfessor.php" style="text-decoration:none">'.'<p style="margin-top: 5px; text-align: center;font-size: 14px; cursor: pointer; text-decoration:none; color:black;">'.$item['nome'].'</br>'.'</p>'.'</a>';                
                }*/
            ?>
        </p>
    </div>
    <p style="margin-top: 5px; text-align: center;font-size: 14px;"></p>
    <p style="margin-top: 5px; text-align: center;font-size: 14px;"></p>
    <p style="margin-top: 5px; text-align: center;font-size: 14px;"></p>
    <p style="margin-top: 5px; text-align: center;font-size: 14px;"></p>
    <p style="margin-top: 5px; text-align: center;font-size: 14px;"></p>

   
</div>

<!--CRIAR DISCIPLINA-->
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <?php                         
            
            /*$query = $conecta->query("SELECT * FROM professores WHERE id_usuario = {$_SESSION['id_session']}");
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $x = $resultado['id'];     */            
        
        echo '<form class="modal-content" method="POST">
            
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="margin-left: 34px;">Nova disciplina</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <div class="input-group-sm mb-2">
                    <h11 style="margin-left: 35px; margin-top: 10px; font-size: 15px;">Nome da disciplina</h11>
                    <input type="text" class="form-control"  name="nome" placeholder="" aria-label="Username" aria-describedby="basic-addon1" style="width: 340px; margin-left: 35px;margin-top: 20px;">
                </div>

                <div class="mb-3" style="margin-top: 30px;">
                    <h11 style="margin-left: 35px;font-size: 15px;">Descrição</h11>
                    <textarea class="form-control" name="descricao" rows="4" style="width: 400px; margin-top: 20px;" ></textarea>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" name="criar_disciplina" value="'.$_SESSION['id_prof_session'].'" class="btn btn-primary" >Criar disciplina</button>
            </div>
        </form>';
        ?>
    </div>
</div>



   <!-- <button type="submit" role="button" class="chat">
        <a href="home.php">Iniciar conversa<span class="material-icons">question_answer</span></a>
    </button>-->


<!-- BOTÃO CRIAR DISCIPLINA-->
<div class="addDisciplina">
    <button type="button" class="btn-none" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: rgba(255, 255, 255, 0); color: rgb(255, 255, 255); border: none; outline: none; outline-color: none; margin-top: 7px; margin-left: 60px; font-size: 14px; font-weight: bold;">Nova disciplina <img src="../bootstrap-icons-1.7.1/plus-circle.svg" alt="" width="25"><!--<span class="material-icons" style="transform: translate(5%,29%);">add_circle_outline</span>--></button>
    <!--<label> Suas disciplinas <span class="material-icons">school</span></label>-->   
</div>




<div class="p-2 w-400
                rounded shadow">

<?php
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
	  
<!--FEED-->   
</main >

<div class="resultado" style="list-style:none; position: fixed; 
background: whitesmoke; width: 650px; margin-left:345px; margin-top:70px;
box-shadow: 4px 0px 20px  rgba(0, 0, 0, 0.25);">

</div>

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


<script>
    var toastTrigger = document.getElementById('liveToastBtn')
    var toastLiveExample = document.getElementById('liveToast')
    if (toastTrigger) {
        toastTrigger.addEventListener('click', function () {
        var toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
        })
    }
</script>    
<!--<script src="modoescuro.js"></script>-->
</body>
</html>