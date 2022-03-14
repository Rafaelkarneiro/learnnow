<?php
        class pegarFoto{



          public function logado($id){
            global $pdo;

            $array = array();
            $sql = "SELECT nome FROM usuarios WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetch();
            }
                    return $array;
          }
        }


?>