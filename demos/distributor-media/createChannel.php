<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';

$request = new DistributorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

$channel_name = $_POST ['channel_name'];
if (isset ( $channel_name )) {
	try {
		$request->createChannel ( $channel_name );
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
	<h2>Create Distributor's channel - createChannel</h2>
	<p>This function is used to create a new video channel for a distributor. </p>
	<pre class="code" lang="php">
$request = new DistributorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

$channel_name = $_POST ['channel_name'];
if (isset ( $channel_name )) {
	try {
		$request->createChannel ( $channel_name );
	} catch ( Exception $ex ) {
		$error = $ex;
	}
}	
	</pre>
	<div id="demo-frame">

	<?php if(isset($channel_name) == false){?>
	<form method="post">
			<label for="channel_name">channel name</label> <input name=channel_name
				type="text" value="demo channel"></input> <input type="submit"
				value="submit">
		</form>
	  <?php
	
	} else {
		if (isset ( $error )) {
			echo $error->getMessage ();
		} else {
			echo 'Congratulations! Channel Has Created Successfully !!!.';
		}
	}
	?>
	  </div>


</body>
</html>