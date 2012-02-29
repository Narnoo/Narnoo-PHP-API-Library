<?php
require_once 'narnoo-cofing.php';
require_once 'narnoo/class-distributor-narnoo-request.php';

$distributor_id = $_POST ['distributor_id'];
echo $distributorr_id;
if (isset ( $distributor_id )) {
	$request = new DistributorNarnooRequest();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getAlbums($distributor_id );
}

?>


<html>
<head>
</head>
<body>

<form action="" method="post">
		<label for="distributor_id">distributor id</label> <input name=distributor_id
			type="text"></input><input type="submit" value="submit">
	</form>
	
	<?php
	if (isset ( $message )) {
		
		?>
	  <div>
	  <?php
		$error = $message->Error;
		if (isset ( $error )) {
			echo 'ErrorCode' . $error->ErrorCode .'</br>';
			echo 'ErroMessage' . $error->ErrorMessage . '</br>';
		}else{
			
		}
		
		?>
	  </div>
	<?php
	}
	
	?>
	<div></div>
</body>
</html>
