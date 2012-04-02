<?php

require_once 'narnoo-cofing.php';
require_once 'narnoo/class-distributor-narnoo-request.php';

$operator_id = $_POST ['operator_id'];

if (isset ( $operator_id )) {
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getImages ( $operator_id );
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
			foreach ( $message->operator_images as $item ) {
				$image = $item->image;
				echo '<li><ul>';
				echo '<li>image_id : ' . $image->image_id . '</li>';
				echo '<li>entry_date : ' . $image->entry_date . '</li>';
				echo '<li>thumb_image_path : ' . $image->thumb_image_path . '</li>';
				echo '<li>preview_image_path : ' . $image->preview_image_path . '</li>';
				echo '<li>large_image_path : ' . $image->large_image_path . '</li>';
				echo '<li>image_caption : ' . $image->image_caption . '</li>';
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