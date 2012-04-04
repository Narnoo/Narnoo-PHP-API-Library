<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';

$album_name = $_POST ['album_name'];

if (isset ( $album_name )) {
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getAlbumImages ( $album_name );
}

?>


<html>
<head>
<link href="../../css/demo.css" rel="stylesheet" type="text/css" />
<link href="../../scripts/highlight/highlight.css" rel="stylesheet"
	type="text/css" />

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
<?php if (isset ( $message )==false){ ?>
	<form action="" method="post">
			<label for="album_name">album name</label> <input name=album_name
				type="text" value="test"></input><input type="submit" value="submit">
		</form>
	
	<?php
} else {
	
	?>
	  <div>
	  <?php
	$error = $message->Error;
	if (isset ( $error )) {
		echo 'ErrorCode' . $error->ErrorCode . '</br>';
		echo 'ErroMessage' . $error->ErrorMessage . '</br>';
	} else {
		?>
			<ul>
			
			
			<?php
			
			
		foreach ( $message->distributor_albums_images as $image ) {
			echo '<li><ul>';
			$album_image = $image->album_image;
			
			echo '<li>album_name:' . $album_image->album_name . '</li>';
			echo '<li>image_id:' . $album_image->image_id . '</li>';
			echo '<li>entry_date:' . $album_image->entry_date . '</li>';
			echo '<li>thumb_image_path:' . $album_image->thumb_image_path . '</li>';
			echo '<li>preview_image_path:' . $album_image->preview_image_path . '</li>';
			echo '<li>large_image_path:' . $album_image->large_image_path . '</li>';
			echo '<li>image_caption:' . $album_image->image_caption . '</li>';
			
			echo '</ul></li>';
		}
		?>
			</ul>
	<?php 	} ?>
	</div>
	<?php
}
?>
	
</div>
	<br />
	<pre class="code" lang="php">
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getAlbumImages ($album_name );
</pre>
</body>
</html>