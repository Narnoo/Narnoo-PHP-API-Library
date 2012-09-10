<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';

$request = new DistributorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

$video_id = $_POST ['video_id'];
$channel_id = $_POST ['channel_id'];
if (isset ( $video_id ) && isset ( $channel_id )) {
	try {
		$request->addToChannel ( $video_id, $channel_id );
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
	<h2>Add a video into a Distributor's channel - addToChannel</h2>
	<p>This function is used to add a video to an already created channel.
		Distributor's can add their operator's videos to this channel as
		well.. Operator has to be on the Distributors access list.</p>
	<pre class="code" lang="php">
$request = new DistributorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

$video_id = $_POST ['video_id'];
$channel_id = $_POST['channel_id'];
if (isset ( $video_id ) && isset($channel_id)) {
	try {
		$request->addToChannel ($video_id ,$channel_id );
	} catch ( Exception $ex ) {
		$error = $ex;
	}
}	
	</pre>
	<div id="demo-frame">

	<?php if(isset($video_id) == false && isset($channel_id) == false ){?>
	<form method="post">
			<label for="video_id">video id</label> <input name=video_id
				type="text" value="176"></input> <label for="channel_id">channel id</label>
			<input name=channel_id type="text" value="11"></input> <input
				type="submit" value="submit">
		</form>
	  <?php
	
	} else {
		if (isset ( $error )) {
			echo $error->getMessage ();
		} else {
			echo 'Congratulations! Video Has Been Added Successfully !!!.';
		}
	}
	?>
	  </div>


</body>
</html>