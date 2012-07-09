<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';

$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

$image_id = $_POST ['image_id'];
$album_id = $_POST ['album_id'];
if (isset ( $image_id ) && isset ( $album_id )) {
	try {
		$request->removeFromAlbum ( $image_id, $album_id );
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
	<h2>Remove Operator's album image - removeFromAlbum</h2>
	<p>This function is used to add an image to an existing album.</p>
	<pre class="code" lang="php">
$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

$image_id = $_POST ['image_id'];
$album_id = $_POST['album_id'];
if (isset ( $image_id ) && isset($album_id)) {
	try {
		$request->removeFromAlbum($image_id, $album_id);
	} catch ( Exception $ex ) {
		$error = $ex;
	}
}}	
	</pre>
	<div id="demo-frame">

	<?php if(isset($image_id) == false || isset($album_id) == false){?>
	<form method="post">
			<label for="image_id">image_id</label> <input name=image_id
				type="text" value="1258"></input> <label for="album_id">album_id</label>
			<input name=album_id type="text" value="49"></input> <input
				type="submit" value="submit">
		</form>
	  <?php
	
	} else {
		if (isset ( $error )) {
			echo $error->getMessage ();
		} else {
			echo 'Congratulations! Image Removed from Album Successfully !!!.';
		}
	}
	?>
	  </div>


</body>
</html>