<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';

$album_name = $_POST ['album_name'];

if (isset ( $album_name )) {
	$request = new OperatorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getAlbumImages ( $album_name );
}
?>


<html>
<head>
<link href="../../scripts/highlight/highlight.css" rel="stylesheet"
	type="text/css" />
<link href="../../css/demo.css" rel="stylesheet" type="text/css" />

<script type="text/javascript"
	src="http://code.jquery.com/jquery.min.js"></script>

<script type="text/javascript"
	src="../../scripts/highlight/highlight.js"></script>
<script type="text/javascript">
$(function(){
	$('pre.code').highlight({source:1, zebra:1, indent:'space', list:'ol'});

});
</script>
</head>
<body>
	<div id="demo-frame">
<?php
if (isset ( $message ) == false) {
	?>
<form action="" method="post">
			<label for="album_name">album name</label> <input name=album_name
				type="text" value="test"></input><input type="submit" value="submit">
		</form>
	
	<?php }else{?>
	  <div>
	  <?php
	
	$error = $message->Error;
	if (isset ( $error )) {
		echo 'ErrorCode' . $error->ErrorCode . '</br>';
		echo 'ErroMessage' . $error->ErrorMessage . '</br>';
	} else {
		echo '<ul>';
		

		
		$operator_albums_images = $message->operator_albums_images;
		
		foreach ( $operator_albums_images as $item ) {
			$album = $item->album_image;
			echo '<li><ul>';
			echo '<li>album_name : ' . $album->album_name . '</li>';
			echo '<li>image_id : ' . $album->image_id . '</li>';
			echo '<li>entry_date : ' . $album->entry_date . '</li>';
			echo '<li>thumb_image_path : ' . $album->thumb_image_path . '</li>';
			echo '<li>preview_image_path : ' . $album->preview_image_path . '</li>';
			echo '<li>large_image_path : ' . $album->large_image_path . '</li>';
			echo '<li>image_caption : ' . $album->image_caption . '</li>';
	
			echo '</ul></li>';
		}
		
		echo '</ul>';
	}
	
	?>
	  </div>
	<?php
}

?>
	</div>

	<br />
	<pre class="code" lang="php">
$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$message = $request->getAlbumImages ($album_name);
	</pre>

</body>
</html>