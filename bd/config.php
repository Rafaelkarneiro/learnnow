<?php
    //Para conectar ao Banco de Dados
    try{
        $conecta=new PDO("mysql:host=localhost;port=3306;dbname=id16918459_learnnowbeta","id16918459_atreuz","Camarãopistola123456789");
        $conecta->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //tratar erros 
        /*echo "Dados gravados com sucesso...";*/
    }

    catch(PDOException $erro){
        echo "Problemas de conexão...";
    }

    function mensagem($texto, $tipo){
      echo "<div class='alert alert-$tipo' role='alert'>
      $texto
      </div>";
    }
?>
