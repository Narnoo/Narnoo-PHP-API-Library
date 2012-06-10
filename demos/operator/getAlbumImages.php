<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';

$album_name = $_POST ['album_name'];

if (isset ( $album_name )) {
	$request = new OperatorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$request->sandbox = sandbox;
	try {
		$list = $request->getAlbumImages ( $album_name );
	} catch ( Exception $ex ) {
		$error = $ex;
	}
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
	<h2>Get Operator's Album Images - getAlbumImages</h2>
	<p>Operators' use the Get Album Images function to retrieve their
		images within an album.</p>
	<pre class="code" lang="php">
$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$list = $request->getAlbumImages ( $album_name );
} catch ( Exception $ex ) {
	$error = $ex;
}
	</pre>
	<div id="demo-frame">
<?php
if (isset ( $album_name ) == false) {
	?>
<form action="" method="post">
			<label for="album_name">album name</label> <input name=album_name
				type="text" value="test"></input><input type="submit" value="submit">
		</form>
	
	<?php }else{?>
	  <div>
	  <?php
	
	if (isset ( $error )) {
		echo $error->getMessage ();
	} else {
		echo '<label>total pages:' . $list->total_pages . '</label>';
		echo '<ul>';
		
		foreach ( $list->operator_albums_images as $album ) {
			
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


</body>
</html>