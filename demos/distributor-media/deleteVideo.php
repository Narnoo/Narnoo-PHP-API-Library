<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$video_id = $_POST ['video_id'];

if (isset ( $video_id )) {
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$request->sandbox = sandbox;
	try {
		$request->deleteVideo ( $video_id );
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
	<h2>Distributor's Delete Video</h2>
	<p>This function used to delete Video of the distributor.</p>
	<pre class="code" lang="php">
$request = new DistributorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$request->deleteVideo ( $video_id );
} catch ( Exception $ex ) {
	$error = $ex;
} 
	</pre>
	<div id="demo-frame">
	<?php if (isset ( $video_id )==false){ ?>
		<form method="post">
			<label for="video_id">video_id</label> <input name=video_id
				type="text" value="160"></input> <input type="submit" value="submit">
		</form>
	
	<?php
	} else {
		
		?>
	  <div>
	  <?php
	
		if (isset ( $error )) {
			echo $error->getMessage();
		}else{
			echo 'done.';
		}
		
		?>
	  </div>
	<?php
	}
	
	?>
	</div>

</body>
</html>