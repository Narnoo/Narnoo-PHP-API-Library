<?php

require_once 'narnoo-cofing.php';
require_once 'narnoo/class-distributor-narnoo-request.php';

$operator_id = $_POST ['operator_id'];

if (isset ( $operator_id )) {
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getProducts ( $operator_id );
}

?>


<html>
<head>
</head>
<body>
	<form action="" method="post">
		<label for="operator">Operator id</label> <input name=operator_id
			type="text" value="39"></input><input type="submit" value="submit">
	</form>
	
	<?php
	if (isset ( $message )) {
		
		?>
	  <div>
	  <?php
		$error = $message->Error;
		if (isset ( $error )) {
			echo 'ErrorCode' . $error->ErrorCode . '</br>';
			echo 'ErroMessage' . $error->ErrorMessage . '</br>';
		} else {
			echo '<ul>';
			foreach ( $message->operator_products as $item ) {
				$operator_product = $item->operator_product;
				
				echo '<li>product_id :' . $operator_product->product_id . ' product_title :' . $operator_product->product_title . '</li>';
			}
			
			echo '</ul>';
		}
		
		?>
	  </div>
	<?php
	}
	
	?>
	<div></div>

</body>
</html>