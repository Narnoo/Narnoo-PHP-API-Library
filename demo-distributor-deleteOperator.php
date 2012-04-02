<?php

require_once 'narnoo/narnoo-config.php';
require_once 'narnoo/class-distributor-narnoo-request.php';

$operator_id = $_POST ['operator_id'];
echo $operator_id;
if (isset ( $operator_id )) {
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->deleteOperator($operator_id);
}

?>


<html>
<head>
</head>
<body>
	<form action="" method="post">
		<label for="operator">Operator id</label> <input name=operator_id
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
		}
		
		?>
	  </div>
	<?php
	}else{
		
		echo $message;
	}
	
	?>
	<div></div>

</body>
</html>