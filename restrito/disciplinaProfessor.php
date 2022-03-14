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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="shortcut icon" type="imagex/png" href="../IMAGENS/logoln2.png">
    <link rel="stylesheet" href="../css/disciplina.css">
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
                    <a class="nav-link active" aria-current="page" href="learnnowProfessor.php" style="padding-right: 30px; color: white;margin-top:5px;">Pagina inicial</a>
                </li>
                <!--<li class="nav-item">
                  <a class="nav-link" href="#" style="padding-right: 30px; color: white;" >Features</a>
                </li>-->
                <!--<li class="nav-item">
                  <a class="nav-link" href="#" style="padding-right: 30px; color: white;">Criar disciplina</a>
                </li>-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;"><img src="./img/<?php echo $linha['foto']; ?>" style="border-radius:70px; width: 30px;height: 30px; left: 92px;" alt=""></a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="padding-top: 2px; font-size: 15px; height: 150px; margin-top: 12px;">
                        <li>  
                            <a class="dropdown-item" href="cadastro_edit.php" style="margin-top: 10px;"> Editar perfil</a>
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
  <!--<div>
    <img src="PagProf/livros-viagem-1.jpg" alt="" style="width: 100%;height: 170px;">

  </div>-->
<main>
           

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

<!--Nome da disciplina aqui-->
    <h3 style="font-size:22px; margin-top:45px"><?php echo $linha_disc['nome'];?></h3>
  
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Enviar arquivos</button>
    </li>
    
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Arquivos enviados</button>
    </li>

    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Editar disciplina</button>
    </li>

    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-alunos-tab" data-bs-toggle="pill" data-bs-target="#pills-alunos" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Seguidores</button>
    </li>
  
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" style="margin-top:100px">
        <?php
                /*$id_disc_select = $_GET['id_disc_select'] ?? '';
                $query = $conecta->query("SELECT * FROM disciplinas WHERE id = '$id_disc_select' LIMIT 1");
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);*/
        ?>
        
        <form  method="POST" enctype="multipart/form-data">
            <div class="areaPostagem">
                <input type="text" class="form-control" name="titulo" placeholder="Título do documento" aria-label="Username" aria-describedby="addon-wrapping" style="margin-left:120px; margin-top:70px; width: 585px; border: 0.1px solid rgba(0, 0, 0, 0.363)">
                
                <div class="mb-3">  
                    <input class="form-control form-control-sm" name="documento" type="file" id="formFileMultiple" multiple style="width:585px; margin-top: 27px; margin-left: 120px; border: 0.1px solid rgba(0, 0, 0, 0.363)">  
                </div>
                
                <button type="submit" name="enviar_doc" value="<?php echo $id_disc_select;?>" style="width: 160px; height: 35px">Enviar documento</button>
            </div>
        </form> 

        <?php   
            /* Método antigo
            if(isset($_POST['enviar_doc']) and isset($_FILES['documento'])){
                $titulo = $_POST['titulo'];
                $id_d = $_POST['enviar_doc'];
                $extensao = strtolower(substr($_FILES['documento']['name'],-20));
                $novo_nome = md5(time()) .$extensao;
                $diretorio = "upload/";

                move_uploaded_file($_FILES['documento']['tmp_name'], $diretorio.$novo_nome);

                $arq="INSERT INTO documentos (`id_professor`,`id_disciplina`,`titulo`, `documento`) VALUE ('{$_SESSION['id_prof_session']}', '$id_d', '$titulo','$extensao')";
                $conecta->exec($arq);
            }*/
            if(isset($_POST['enviar_doc']) and isset($_FILES['documento'])){
                $titulo = $_POST['titulo'];
                $id_d = $_POST['enviar_doc'];
                $documento = $_FILES['documento'];
                
                preg_match("/\.(pdf|pptx|doc|docx|png|jpg|jpeg|zip|txt){1}$/i", $documento["name"], $extensao);
                
                if ($extensao == true){
                    $nome_doc = md5(uniqid(time())) . "." . $extensao[1];
                    $caminho_doc = "../upload/" . $nome_doc;
                    move_uploaded_file($documento["tmp_name"], $caminho_doc);
                }

                $sql_arquivo = "INSERT INTO documentos (`id_professor`,`id_disciplina`,`titulo`, `documento`) VALUE ('{$_SESSION['id_prof_session']}', '$id_d', '$titulo', '$nome_doc')";
                $conecta->exec($sql_arquivo);
            }
        ?>
    </div>

    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <?php
             
            $sql_arquivo_show = $conecta->query("SELECT * FROM documentos WHERE documentos.id_disciplina = '$id_disc_select' AND documentos.id_professor = {$_SESSION['id_prof_session']}");
            $result_arq = $sql_arquivo_show->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($result_arq as $item){
                //$pathx = "upload/"; 
                echo '<div class="card" style="width: 20rem; display:flex; display: inline-block; margin-left:60px; margin-right:-20px;box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.342); margin-top:20px">   
                    <div class="card-body">            
                        <h5 class="card-title">'.$item["titulo"].'</h5>
                        <a class="nav-link active" aria-current="page" href="../upload/'.$item["documento"].' " target="_blank" style="padding-right: 30px; color: white;margin-top:5px;">"'.$item["documento"].'"</a>
                    </div>
                </div>';
            }  
        ?>
    </div>
    
    <div class="tab-pane fade" id="pills-alunos" role="tabpanel" aria-labelledby="pills-alunos-tab">
        <div class="Remover_seguidor">   
            <table class="table table-hover" style="width: 1300px; margin:auto; margin-top:60px">
                <thead>
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nome</th> 
                        <th scope="col"></th>     
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        $query9 = $conecta->query(
                            "SELECT  alunos.id as id_aluno, usuarios.id as id_usuario, usuarios.nome, usuarios.foto FROM alunos 
                            JOIN matriculas ON matriculas.id_disciplina = $id_disc_select and alunos.id = matriculas.id_aluno
                            JOIN usuarios ON usuarios.id = alunos.id_usuario
                        ");
                    
                        $resultado9 = $query9->fetchAll(PDO::FETCH_ASSOC);
                        foreach($resultado9 as $item9){
                            /*$pathx = "./img/"; 
                            echo '<div class="card" style="height: 200px; margin-top:30px; width: 610px; margin-left:30px; padding:10px; font-size:14px">'.'<img src = "'.$pathx.$item9["foto"].'" style="width:40px; border-radius:40px ; margin-left:15px; margin-top:10px">'.'<p style="margin-left:65px; margin-top:-30px; font-weight: bold; font-size:15px">'.$item9['nome'].'</div>'; */
                            $pathx = "./img/"; 
                            $id_aluno = $item9['id_aluno'];
                            $id_usuario = $item9['id_usuario'];
                            $nome = $item9['nome'];
                            
                            /* TESTE 1
                            echo '<div class="card" style="width: 20rem; display:flex; display: inline-block; margin-left:50px; margin-right:-20px;box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.342); margin-top:20px">
                            '.'<img src = "'.$pathx.$item9["foto"].'" style="width:40px; border-radius:40px ; margin-left:15px; margin-top:10px">'.'<p style="margin-left:65px; margin-top:-30px; font-weight: bold; font-size:15px">'.$item9['nome'].
                            '<br><a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirma" onclick="' . '"' . "pegar_dados({$item9['id']}, {$item9['nome']})" . '"' .' ">Excluir</a>
                            </div>';
                            */
                            /* TESTE 2
                            echo '<tr>
                                <th> <img src="./img/'.$item9['foto'].'" style="width:40px; border-radius:40px ; margin-left:15px; margin-top:10px"> </th>
                                <th scope="row">'.$item9['nome'].'</th>
                                
                                <td>
                                    <button class="btn btn-danger" type="submit" data-bs-toggle="modal" data-bs-target="#remover" onclick=" '."pegar_dados('$id', '$nome')" .'">Remover seguidor</button>
                                </td>
                            </tr>';  
                            */
                            echo '<tr>
                                <th> <img src="./img/'.$item9['foto'].'" style="width:40px; border-radius:40px ; margin-left:15px; margin-top:10px"> </th>
                                <th scope="row" style="top:20px">'.$item9['nome'].'</th>
                                
                                <th>
                                    <a href="excluir_seguidor_script.php?id_disc_select='.$id_disc_select.'& id_aluno= '.$id_aluno.' & nome_aluno= '.$nome.'" class="btn btn-danger"">Remover seguidor</a> 
                                    <a href="matricula.php?id_aluno='.$id_aluno.' & p=2 & id_pesquisado='.$id_usuario.'" class="btn btn-primary" ">Visualizar perfil</a>                       
                                </th>
                            </tr>';
                        } 
                    ?>  
                </tbody>
            </table>
        </div>   
    </div>

    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="EditarDisciplina">
            <form action="edit_disciplina_script.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nome da disciplina</label>
                    <input type="text" class="form-control" name="nome" required value="<?php echo $linha_disc['nome'];?>" id="exampleFormControlInput1" placeholder="Disciplina" style="border: 0.1px solid rgba(0, 0, 0, 0.363); width: 600px">       
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                    <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="4" style="margin-left: 1px; margin-top:20px; border: 0.1px solid rgba(0, 0, 0, 0.363)"><?php echo $linha_disc['descricao'];?></textarea>
                </div>

                <button class="atualizar" type="submit">Atualizar</button>
                <input type="hidden" name="id" value="<?php echo $linha_disc['id'];?>">
                <input type="hidden" name="permissao" value="<?php echo $linha['permissao'];?>">
            </form>
            
            <?php
                    $id = $linha_disc['id'];
                    $nome = $linha_disc['nome'];
                    echo '<button class="excluir" type="submit" data-bs-toggle="modal" style="margin-left:430px" data-bs-target="#confirma" onclick=" '."pegar_dados('$id', '$nome')" .'">Excluir</button>'; 
            ?>
        </div>   
    </div>

</div>

<!--Confirma exclusão-->
<div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
            <form action="excluir_disciplina_script.php" method="POST">
                <p>Deseja realmente excluir o <b id="nome_pessoa">Nome da pessoa</b> ?</p>          
        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    
                    <input type="hidden" name="nome" id="nome_pessoa2" value="">
                    <input type="hidden" name="id" id="cod_pessoa" value="">
                    <input type="submit" class="btn btn-danger" value="Sim"></input>
                </div><!--test de identação-->    
            </form>
        </div>
    </div>
</div>
<!--END Confirma exclusão-->

<!--Confirma remover seguidor-->
<div class="modal fade" id="remover" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
            <form action="excluir_seguidor_script.php" method="POST">
                <p>Deseja realmente remover <b id="nome_pessoa">Nome da pessoa</b> ?</p>          
        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    
                    <input type="hidden" name="nome" id="nome_pessoa2" value="">
                    <input type="hidden" name="id" id="cod_pessoa" value="">
                    <input type="submit" class="btn btn-danger" value="Sim"></input>
                </div><!--test de identação-->    
            </form>
        </div>
    </div>
</div>
<!--END Confirma remover seguidor-->

<script>    
    function pegar_dados(id,nome){
        document.getElementById('nome_pessoa').innerHTML = nome;
        document.getElementById('nome_pessoa2').value = nome;
        document.getElementById('cod_pessoa').value = id;
    }
</script>
</main>
</body>
</html>