<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';
require_once '../utilities.php';

$video_id = $_POST ['video_id'];

if (isset ( $video_id )) {
	$request = new OperatorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$request->sandbox = sandbox;
	try {
		$item = $request->downloadVideo ( $video_id );
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
	<h2>Download Operator's Videos - downloadVideo</h2>
	<p>Operators' use the Download Videos function to download their
		highest resolution videos.</p>
	<pre class="code" lang="php">
$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$item = $request->downloadVideo ( $video_id );
} catch ( Exception $ex ) {
	$error = $ex;
}
	</pre>

	<div id="demo-frame">
	<?php if (isset ( $video_id )==false){ ?>
		<form method="post">
			<label for="video_id">video_id</label> <input name=video_id
				type="text" value="413"></input> <input type="submit" value="submit">
		</form>
	
	<?php
	} else {
		
		?>
	  <div>
	  <?php
		if (isset ( $error )) {
			echo $error->getMessage();
		} else {
			
			echo '<ul>';
			echo '<li>download_video_stream_path : ' . uncdata ( $item->download_video_stream_path ) . '</li>';
			echo '<li>original_video_path : ' . $item->original_video_path . '</li>';
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