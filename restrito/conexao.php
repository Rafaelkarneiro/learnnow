<?php
    $server = "localhost";
    $user = "id16918459_atreuz";
    $pass = "Camarãopistola123456789";
    $bd = "id16918459_learnnowbeta"; 

    if ($conn = mysqli_connect($server, $user, $pass, $bd)) {
        //echo "Conectado"; 
    }
    else{
        echo "Erro de conexão!";
    }

    function mensagem1($texto, $tipo) {
        echo "<div class='alert alert-$tipo' role='alert'>
        $texto
        </div>";
    }

    function mostra_data($data){
        $d = explode('-',$data);
        $escreve = $d[2]. "/" . $d[1] . "/" . $d[0];
        return $escreve;
    }

    function mover_foto($vetor_foto){
        $vtipo = explode("/", $vetor_foto['type']);
        $tipo = $vtipo[0] ?? '';
        $extensao = "." .$vtipo[1] ?? '';
        if((!$vetor_foto['error']) and ($vetor_foto['size'] <= 500000) and ($tipo == "image")){
           
            $nome_arquivo = date('Ymdhms') . $extensao;
            move_uploaded_file($vetor_foto['tmp_name'], "img/" . $nome_arquivo);
            return $nome_arquivo;

        }
        else{
            return 0;
        }
    }
    function mover_foto2($vetor_foto){
        $vtipo = explode("/", $vetor_foto['type']);
        $tipo = $vtipo[0] ?? '';
        $extensao = "." .$vtipo[1] ?? '';
        if((!$vetor_foto['error']) and ($vetor_foto['size'] <= 500000) and ($tipo == "image")){       
            $nome_arquivo = date('Ymdhms') . $extensao;
            move_uploaded_file($vetor_foto['tmp_name'], "restrito/img/" . $nome_arquivo);
            return $nome_arquivo;
        }
        else{
            return 0;
        }
    }
    function mover_foto3($vetor_foto){     
            $nome_arquivo = $vetor_foto;
            move_uploaded_file($vetor_foto, "restrito/img/" . $nome_arquivo);
            return $nome_arquivo;     
    }
?>