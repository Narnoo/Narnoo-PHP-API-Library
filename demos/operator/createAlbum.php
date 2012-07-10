<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';

$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

$album_name = $_POST ['album_name'];
if (isset ( $album_name )) {
	try {
		
		$request->createAlbum ( $album_name );
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
	<h2>Create Operator's Albums - createAlbum</h2>
	<p>Operators' use the createAlbum function to add their own album.</p>
	<pre class="code" lang="php">
$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

$album_name = $_POST ['album_name'];
if (isset ( $album_name )) {
	try {
		
		$request->createAlbum ($album_name);
	} catch ( Exception $ex ) {
		$error = $ex;
	}
}	
	</pre>
	<div id="demo-frame">

	<?php if(isset($album_name) == false){?>
	<form method="post">
			<label for="album_name">album_name</label> <input name=album_name
				type="text" value="test-dayi"></input> <input type="submit"
				value="submit">
		</form>
	  <?php
	
	} else {
		if (isset ( $error )) {
			echo $error->getMessage ();
		} else {
			echo 'Congratulations! Album Has Created Successfully !!!.';
		}
	}
	?>
	  </div>


</body>
</html>