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
    
    $id_disc_select = $_GET['id_disc_select'];
    $sql_disc = "SELECT * FROM disciplinas WHERE id = '$id_disc_select'";
    $result_disc = mysqli_query($conn, $sql_disc); 
    $num_registros_disc = mysqli_num_rows($result_disc);
    
    if($num_registros_disc == 1){
        $linha_disc = mysqli_fetch_assoc($result_disc);
    }        
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">    
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/disciplina.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="shortcut icon" type="imagex/png" href="../IMAGENS/logoln2.png">
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light "  style="padding: 12px; background-color: #3D9ACE;">
    <div class="container-fluid">
        <label style="margin-left: 85px; padding-right: 670px; color: white; font-weight: bold; font-size: 27px;">LearnNow</label>
        
        <div style="margin-left: -582px; margin-right: 194px;">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Pesquisar perfil" aria-label="Search">
                <!--<button class="btn btn-outline-success" type="submit">Buscar</button>-->
            </form>
        </div>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="margin-top: -40px;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php
                        switch($linha['permissao']){    
                            case "professor":
                                echo "learnnowProfessor.php";
                            break;
                            case "aluno":
                                echo "learnnowAluno.php";
                                break;
                        }
                        ?>" style="padding-right: 30px; color: white;margin-top:5px;">Pagina inicial</a>
                </li>
                <!--<li class="nav-item">
                  <a class="nav-link" href="#" style="padding-right: 30px; color: white;" >Features</a>
                </li>-->
                <!--<li class="nav-item">
                  <a class="nav-link" href="#" style="padding-right: 30px; color: white;">Criar disciplina</a>
                </li>-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;"><img src="./img/<?php echo $linha['foto']; ?>" style="border-radius:70px; width: 30px;height: 30px; left: 92px;" alt=""> </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="padding-top: 2px; font-size: 15px; height: 150px; margin-top: 12px;">
                        <li>
                            <a class="dropdown-item" href="cadastro_edit.php" style="margin-top: 10px;">Editar perfil</a>
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


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <!--Nome da disciplina aqui-->
    <h3 style="font-size:22px; margin-top:45px"><?php echo $linha_disc['nome'];?></h3>
   
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Arquivos recebidos</button>
    </li>

    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Descrição</button>
    </li>
</ul>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <?php       
            $sql_arquivo_show = $conecta->query(
            "SELECT documentos.titulo, documentos.documento FROM documentos 
            JOIN disciplinas ON disciplinas.id = documentos.id_disciplina and disciplinas.id = '$id_disc_select'
            JOIN professores ON professores.id = documentos.id_professor
            ");
            $result_arq = $sql_arquivo_show->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($result_arq as $item){
                //$pathx = "upload/"; 
                echo '<div class="card" style="width: 20rem;; display:flex; display: inline-block; margin-left:50px; margin-right:-20px;box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.342); margin-top:20px">   
                    <div class="card-body">            
                        <h5 class="card-title">'.$item["titulo"].'</h5>
                        <a class="nav-link active" aria-current="page" href="../upload/'.$item["documento"].' " target="_blank" style="padding-right: 30px; color: white;margin-top:5px;">"'.$item["documento"].'"</a>
                        
                    </div>
                </div>';
            }  
        ?>
    </div>


    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="EditarDisciplina">
            <form action="">
                <div class="mb-3">
                    <!--<label for="exampleFormControlInput1" class="form-label">Disciplina</label>
                    
                    <input type="text" class="form-control" name="nome" id="exampleFormControlInput1" placeholder="Disciplina" style="border: 0.1px solid rgba(0, 0, 0, 0.363); width: 600px">-->
                    <label for="exampleFormControlInput1" class="form-label"><b>Disciplina:</b><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $linha_disc['nome'];?></label>
                    
                </div>
                
                <div class="mb-3">
                    <!--<label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                    
                    <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="4" style="margin-left: 1px; margin-top:20px; border: 0.1px solid rgba(0, 0, 0, 0.363)"></textarea>-->
                    <label for="exampleFormControlTextarea1" class="form-label"><b>Descrição:</b><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $linha_disc['descricao'];?> </label>
             
                </div>
            </form>
        </div>   
    </div>
</div>
</body>
</html>