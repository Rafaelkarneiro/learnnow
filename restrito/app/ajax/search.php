<?php

	include_once "../../../bd/config.php";
  	include_once "../../../validar.php";
  	include_once "../../conexao.php";
    # check if the key is submitted
    if(isset($_POST['key'])){
       # database connection file
	   include '../db.conn.php';

	   # creating simple search algorithm :) 
	   $key = "%{$_POST['key']}%";
	   
     
	   $sql = "SELECT * FROM usuarios
	           WHERE nome
	           LIKE ? OR nome LIKE ?";
       $stmt = $conn->prepare($sql);
       $stmt->execute([$key, $key]);

       if($stmt->rowCount() > 0){ 
         $users = $stmt->fetchAll();

         foreach ($users as $user) {
         	if ($user['id'] == $_SESSION['id_session']) continue;
       ?>
       <li class="list-group-item">
		<a href="chat.php?user=<?=$user['id']?>"
		   class="d-flex
		          justify-content-between
		          align-items-center p-2">
			<div class="d-flex
			            align-items-center">

			    <img src="img/<?=$user['foto']?>"
			         class="w-10 rounded-circle">

			    <h3 class="fs-xs m-2">
			    	<?=$user['nome']?>
			    </h3>            	
			</div>
		 </a>
	   </li>
       <?php } }else { ?>
         <div class="alert alert-info 
    				 text-center">
		   <i class="fa fa-user-times d-block fs-big"></i>
           The user "<?=htmlspecialchars($_POST['key'])?>"
           is  not found.
		</div>
    <?php }
    }
?>

<script>
	if($key == ''){

			
	window.location.reload()
}
</script>

