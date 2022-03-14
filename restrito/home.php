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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat App - Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" 
	      href="../css/styleChat.css">
	<link rel="icon" href="img/logo.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../css/learnnow.css">
	<link rel="shortcut icon" type="imagex/png" href="../IMAGENS/logoln2.png">
    
</head>




<body>


 <nav class="navbar navbar-expand-md navbar-light "  style="padding: 14px; background-color: #3D9ACE; width: 100%">
    <div class="container-fluid">
        <label style="margin-left: 85px; padding-right: 670px; color: white; font-weight: bold; font-size: 27px;">LearnNow</label>
        
        <div style="margin-left: -582px; margin-right: 190px;">
            <form method="POST" class="d-flex">
                <input class="form-control me-2" type="search" name="pesquisa" id="pesquisa" placeholder="Pesquisar perfil" aria-label="Search">
            </form>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="margin-top: -40px;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php         
                        switch($linha['permissao']){
                            case "professor":
                                    echo '<a class="nav-link active" aria-current="page" href="learnnowProfessor.php" style="padding-right: 30px; color: white;">Pagina inicial</a>';
                                    break;
                            case "aluno":
                                    echo '<a class="nav-link active" aria-current="page" href="learnnowAluno.php" style="padding-right: 30px; color: white;">Pagina inicial</a>';
                                    break;
                            } 
                    ?>           
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                    <?php 
                        /*$sql2 = "SELECT foto FROM usuarios WHERE id = {$_SESSION['id_session']}";
                        $result2 = mysqli_query($conn, $sql2); 
                        $num_registros2 = mysqli_num_rows($result2);
                        if($num_registros2 == 1){
                        $linha2 = mysqli_fetch_assoc($result2);
                        }*/
                    ?>
                        <img src="./img/<?php echo $linha['foto']; ?>" style="border-radius:70px; width: 30px;
                        height: 30px; left: 92px;" >
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="padding-top: 2px; font-size: 15px; height: 150px; margin-top: 14px;">
                        <li>
                            <a class="dropdown-item" href="#" style="margin-top: 10px;"><span class="material-icons" style="transform: translate(-13%,30%);">account_circle</span>Editar perfil</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="../logout.php" style="margin-top: 10px;">Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="p-2 w-400
                rounded shadow">
    	<div>
    		<div class="d-flex
    		            mb-3 p-3 
			            justify-content-between
			            align-items-center"
						style="border-radius:4px;background-color: #E3E3E3;">
    			<div class="d-flex
    			            align-items-center" style="height:100px; width:350px">
    			    <img src="img/<?=$user['foto']?>"
    			         class="w-25 rounded-circle">
                    <h3 class="fs-xs m-2"><?=$user['nome']?></h3> 
    			</div>
    			<!--<a href="learnnowAluno.php"
    			   class="btn btn-dark">Home</a>-->
				<?php
					$permissao = $linha['permissao'];
					if($permissao =="professor"){
						echo '<a href="learnnowProfessor.php" class="btn btn-dark">Home</a>';
					}
					elseif($permissao =="aluno"){
						echo '<a href="learnnowAluno.php" class="btn btn-dark">Home</a>';
                	} 
            	?>
    		</div>

    		<div class="input-group mb-3" style="margin-left:-34px; width:767px; ">
    			<input type="text"
    			       placeholder="Search..."
    			       id="searchText"
    			       class="form-control">
    			<button class="btn btn-primary" 
    			        id="serachBtn" style="height: 40px; margin-top:20px">
    			        <i class="fa fa-search"></i>	
    			</button>       
    		</div>
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
                       No messages yet, Start the conversation
					</div>
    			<?php } ?>
    		</ul>
    	</div>
    </div>
	  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){
      
      // Search
       $("#searchText").on("input", function(){
       	 var searchText = $(this).val();
         if(searchText == "") return;
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
<script type="text/javascript" src="personalizado.js"></script>
</body>
</html>
