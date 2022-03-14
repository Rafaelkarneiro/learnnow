<?php 

# server name
$sName = "localhost";
# user name
$uName = "id16918459_atreuz";
# password
$pass = "Camarãopistola123456789";

# database name
$db_name = "id16918459_learnnowbeta";

#creating database connection
try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}