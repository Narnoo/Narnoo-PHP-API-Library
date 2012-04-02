<?php

require_once 'narnoo/narnoo-config.php';
require_once 'narnoo/class-distributor-narnoo-request.php';

$operator_id = $_POST ['operator_id'];

if (isset ( $operator_id )) {
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getAlbums ( $operator_id );
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
			$operator_albums = $message->operator_albums;
			foreach ( $operator_albums as $item ) {
				$album = $item->album;
				echo '<li>album_id: ' . $album->album_id . '  album_name: ' . $album->album_name . '</li>';
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