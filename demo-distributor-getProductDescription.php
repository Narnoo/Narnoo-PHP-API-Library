<?php

require_once 'narnoo/narnoo-config.php';
require_once 'narnoo/class-distributor-narnoo-request.php';

$operator_id = $_POST ['operator_id'];
$product_title = $_POST ['product_title'];

if (isset ( $operator_id )) {
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getProductDescription ( $operator_id, $product_title );
}

?>


<html>
<head>
</head>
<body>
	<form action="" method="post">
		<label for="operator_id">Operator id</label> <input name=operator_id
			type="text" value="39"></input><label for="product_title">product
			title</label> <input name=product_title type="text" value="Narnoo"></input><input
			type="submit" value="submit">
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
				$product_description = $item->product_description;
				echo '<li><ul>';
				echo '<li>product_title: ' . $product_description->product_title . '</li>';
				$text = $product_description->text;
				
				echo '<li>word_50: ' . $text->word_50 . '</li>';
				echo '<li>word_100: ' . $text->word_100 . '</li>';
				echo '<li>word_150: ' . $text->word_150 . '</li>';
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