<?php
    
    include_once "conexao.php";
    include_once "../validar.php";
    $usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
    //Pesquisar no banco de dados nome do usuario referente a palavra digitada
    $sql = "SELECT * FROM usuarios WHERE nome LIKE '%$usuarios%' AND id != {$_SESSION['id_session']} LIMIT 4";
    $dados = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    
</body>
</html>


<table class="table" style=" height:53px">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>

    <tbody>   
        <?php
            if(($dados) AND ($dados->num_rows != 0 )){
                while($row_user = mysqli_fetch_assoc($dados)){
                    $id = $row_user['id'];
                    $permissao = $row_user['permissao'];

               
                    switch($permissao){
                        case "professor":
                            $sql2 = "SELECT * FROM professores WHERE id_usuario = '$id' ";
        
                            $result2 = mysqli_query($conn, $sql2); 
                            $num_registros2 = mysqli_num_rows($result2);
                
                            if($num_registros2 == 1){
                                $linha2 = mysqli_fetch_assoc($result2);
                            }    
                            $id_professor = $linha2['id'];
            
                            
                            $nome = $row_user['nome'];          
                            $foto = $row_user['foto'];
                            
                            if(!$foto == null){
                                $mostra_foto = "<img src='./img/$foto' class='lista_foto' style='width: 35px;
                                height: 35px;
                                border-radius: 70px; margin-left:10px;'>";
                            }
                            else{
                                $mostra_foto = "<img src='./img/user.png' class='lista_foto'style='width: 35px;
                                height: 35px;
                                border-radius: 70px; margin-left:10px;'>";
                            }
                            
                            echo " <tr>
                                <th scope='row'>$mostra_foto</th>
                                <td scope='row' style='line-height:40px; margin-left: 30px'>$nome</td>
                                <td scope='row' style='line-height:40px; margin-left: 30px; font-size: 14px; font-weight:bold'>$permissao</td>
                                <td style='line-height:40px'><a href='matricula.php?id=$id_professor & p=1 & id_pesquisado=$id' class='btn btn-primary' name='visualizar' style='width:120px;'>Visualizar</a></td> 
                            </tr> ";
                            break;       

                        case "aluno":
                            $sql2 = "SELECT * FROM alunos WHERE id_usuario = '$id' ";
        
                            $result2 = mysqli_query($conn, $sql2); 
                            $num_registros2 = mysqli_num_rows($result2);
                
                            if($num_registros2 == 1){
                                $linha2 = mysqli_fetch_assoc($result2);
                            }    
                            $id_aluno = $linha2['id'];
            
                            


                            $nome = $row_user['nome'];          
                            $foto = $row_user['foto'];
                            if(!$foto == null){
                                $mostra_foto = "<img src='./img/$foto' class='lista_foto' style='width: 35px;
                                height: 35px;
                                border-radius: 70px; margin-left:10px;'>";
                            }
                            else{
                                $mostra_foto = "<img src='./img/user.png' class='lista_foto'style='width: 35px;
                                height: 35px;
                                border-radius: 70px; margin-left:10px;'>";
                            }
                            
                            echo " <tr>
                                <th scope='row'>$mostra_foto</th>
                                <td scope='row' style='line-height:40px; margin-left: 30px'>$nome</td>
                                <td scope='row' style='line-height:40px; margin-left: 30px; font-size: 14px; font-weight:bold'>$permissao</td>
                                <td style='line-height:40px'><a href='matricula.php?id=$id_aluno & p=2 & id_pesquisado=$id' class='btn btn-primary' name='visualizar' style='width:120px;'>Visualizar</a></td> 
                            </tr> ";
                            break;       
                    }
                    
        }?>

    </tbody>
</table> 
<!-- <div class="form-group">
    <a type="button" class="btn btn-danger" href="sistema.php">Voltar</a>
</div>-->
<?php
    }else{
        echo "Nenhum usuário encontrado ...";
    }
?>