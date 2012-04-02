<?php

require_once 'narnoo/narnoo-config.php';
require_once 'narnoo/class-distributor-narnoo-request.php';

$operator_id = $_POST ['operator_id'];

if (isset ( $operator_id )) {
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->singleOperatorDetail ( $operator_id );
}

?>


<html>
<head>
</head>
<body>
	<form action="" method="post">
		<label for="operator_id">Operator id</label> <input name=operator_id
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
			foreach ( $message->operator_detail as $item ) {
				$business = $item->operator;
				echo '<li><ul>';
				echo '<li>operator_id : ' . $business->operator_id . '</li>';
				echo '<li>category : ' . $business->category . '</li>';
				echo '<li>sub_category : ' . $business->sub_category . '</li>';
				echo '<li>operator_businessname : ' . $business->operator_businessname . '</li>';
				echo '<li>country_name : ' . $business->country_name . '</li>';
				echo '<li>state : ' . $business->state . '</li>';
				echo '<li>suburb : ' . $business->suburb . '</li>';
				echo '<li>latitude : ' . $business->latitude . '</li>';
				echo '<li>longitude : ' . $business->longitude . '</li>';
				echo '<li>postcode : ' . $business->postcode . '</li>';
				echo '<li>keywords : ' . $business->keywords . '</li>';
				echo '</ul></li>';
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