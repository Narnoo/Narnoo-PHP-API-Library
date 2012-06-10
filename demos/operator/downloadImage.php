<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';
require_once '../utilities.php';

$image_id = $_POST ['image_id'];

if (isset ( $image_id )) {
	$request = new OperatorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$request->sandbox = sandbox;
	try {
		$item = $request->downloadImage ( $image_id );
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
	<h2>Download Operators images - Downlaod Images</h2>
	<p>Operators' use this function to download their high resolution
		images.</p>
	<pre class="code" lang="php">
$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$item = $request->downloadImage ( $image_id );
} catch ( Exception $ex ) {
	$error = $ex;
} 
	</pre>

	<div id="demo-frame">
	<?php if (isset ( $image_id )==false){ ?>
		<form method="post">
			<label for="image_id">image_id</label> <input name=image_id
				type="text" value="295"></input> <input type="submit" value="submit">
		</form>
	
	<?php
	} else {
		
		?>
	  <div>
	  <?php
		if (isset ( $error )) {
			echo $error->getMessage ();
		} else {
			echo "download_image_link:" . uncdata ( $item->download_image_link );
		}
		
		?>
	  </div>
	<?php
	}
	
	?>
	</div>
</body>
</html>