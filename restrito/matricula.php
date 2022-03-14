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
    //Verifica se a variável GET existe
    $p = $_GET['p'];
    $id = $_GET['id'] ?? '';
    $id_p = $_GET['id_pesquisado'] ?? '';
    
    $sql5 = "SELECT * FROM usuarios WHERE id = '$id_p'";
    $dados5 = mysqli_query($conn,$sql5);
    $linha5 = mysqli_fetch_assoc($dados5);
    /*switch($p){
        case 1:            
            $sql5 = "SELECT * FROM usuarios 
            JOIN professores ON professores.id = '$id' 
            ";
            $dados5 = mysqli_query($conn,$sql5);
            $linha5 = mysqli_fetch_assoc($dados5);
            break;
        case 2:
            $sql5 = "SELECT * FROM usuarios 
            JOIN alunos ON alunos.id = '$id' 
            ";
            $dados5 = mysqli_query($conn,$sql5);
            $linha5 = mysqli_fetch_assoc($dados5);
            break;
    }*/
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/matricula.css">
    <link rel="stylesheet" href="../css/styleChat.css">
    <link rel="shortcut icon" type="imagex/png" href="../IMAGENS/logoln2.png">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <title>Document</title>
    
</head>
<body>
<!--CABEÇALHO-->
<nav class="navbar navbar-expand-md navbar-light"  style="padding: 15px; background-color: #3D9ACE;">
    <div class="container-fluid">
        <label style="margin-left: 85px; padding-right: 670px; color: white; font-weight: bold; font-size: 27px;">LearnNow</label>
        
        <div style="margin-left: -582px; margin-right: 190px;">
            <form method="POST" class="d-flex">
                <input class="form-control me-2" type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar perfil" aria-label="Search">
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

                <li class="nav-item dropdown" style="margin-top:-800">
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
                            <a class="dropdown-item" href="./cadastro_edit.php" style="margin-top: 10px;"><span class="material-icons" style="transform: translate(-13%,30%);">account_circle</span>Editar perfil</a>
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

<section>    
    <img id="image">
      
    <div id="quadro">
    </div>
    
    <div id="quadro2">
        <?php 
            if($p==1){
                echo '<h5 style="text-align: center; margin-top:40px">Disciplinas</h5>';
            }
            else if($p==2){
                echo '<h5 style="text-align: center; margin-top:40px">Seguindo</h5>';
            }
        ?>
        
        <div id="quadro2_interno" >       
            <table class="table" style="margin-top:20px">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php         
                        switch($p){
                            case 1:              
                                $id = $_GET['id']; 
                                $query = $conecta->query("SELECT * FROM disciplinas  WHERE id_professor = '$id'");
                                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

                                foreach($resultado as $item){ 
                                    $id_disciplina = $item['id'];  
                                    echo '<form action="seguir_script.php" method="POST" enctype="multipart/form-data">'.'<tr>'.'<td>'.$item['nome'].'<td>'.'<td>'.'<button type="submit" name="id_disciplina" value="'.$id_disciplina.'" style="width: 157px;height: 39px;color: white; background-color: #146df3;border: none; ">'.'Seguir'.'</button>'.'</td>'.'</tr>'.'</form>';
                                }
                                break;
                            case 2:
                                $id = $_GET['id_pesquisado'];
                                $query = $conecta->query("SELECT disciplinas.id, disciplinas.nome FROM disciplinas
                                JOIN alunos on alunos.id_usuario =  '$id'
                                JOIN matriculas on disciplinas.id = matriculas.id_disciplina and matriculas.id_aluno = alunos.id
                                ORDER BY disciplinas.nome                
                                ");
                                
                                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

                                foreach($resultado as $item){                                    
                                    echo '<hr>'.'<a href="disciplinaAluno.php?id_disc_select='.$item['id'].'" style="text-decoration:none">'.'<p style="margin-top: 5px; text-align: center;font-size: 14px; cursor: pointer; color:black;">'.$item['nome'].'</br>'.'</p>'.'</a>';                                            
                                }
                                break;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--<div id="quadro3">
    </div>-->
    
    <div id="fundoBrancoPerfil">
    </div>

    <div id="perfilFoto">
        <img src="./img/<?php echo $linha5['foto'];?>"
    </div>

    <div id="perfilNome">
        <h1 style= "font-family: 'Poppins', sans-serif;"><?php echo $linha5['nome'];?></h1>
        
        <p style= "font-family: 'Poppins', sans-serif;"></br><?php echo $linha5['permissao'];?></p>
        </br>
       
    <button type="submit" role="button" class="chat">
        
        <a href="chat.php?user=<?=$id_p?>">Iniciar conversa<!--<span class="material-icons">question_answer</span>--></a>
        
        
    </button>
        
        
        
                   
        <!--<p><?php
            /*$id = $linha['id'];
            $nome = $linha['nome'];
            echo "<a href='#' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirma' onclick=" . '"' . "pegar_dados('$id', '$nome')" . '"' . ">Excluir</a>" */
        ?></p> -->           
    </div>
</section>

<div class="resultado" style="list-style:none; position: relative;background: whitesmoke; width: 649px; margin-left:333px;margin-top:-80px;box-shadow: 4px 0px 20px  rgba(0, 0, 0, 0.25);">

</div>

<!-- Confirma exclusão-->
<div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
            <form action="excluir_script.php" method="POST">
                <p>Deseja realmente excluir o <b id="nome_pessoa">Nome da pessoa</b> ?</p>          
        <!--</div>(?)-->
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
</body>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>   
<script type="text/javascript" src="personalizado.js"></script>
<script>
    let img = document.getElementById('image')
    let data = new Date()
    let hora = data.getHours()

    

    if(hora <= 15){   
        img.setAttribute('src',' ../IMAGENS/fundoteste.jpg')     
    }

    if (hora >= 15){
        img.setAttribute('src',' ../IMAGENS/fundomatricula.jpg')
 
        
    }  
    //exclusão
    function pegar_dados(id,nome){
        document.getElementById('nome_pessoa').innerHTML = nome;
        document.getElementById('nome_pessoa2').value = nome;
        document.getElementById('cod_pessoa').value = id;
    }
    // END exclusão
</script>
</html>