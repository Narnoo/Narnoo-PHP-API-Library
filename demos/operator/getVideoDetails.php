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
		$operator_video = $request->getVideoDetails ( $video_id );
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
	<h2>Get Operator's Video - getVideoDetails</h2>
	<p>Operators' use the Get Video Details function to retrieve their
		single video information.</p>
	<pre class="code" lang="php">
$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$operator_video = $request->getVideoDetails ( $video_id );
} catch ( Exception $ex ) {
	$error = $ex;
}	
	</pre>
	<br />
	<div id="demo-frame">
<?php if (isset (  $video_id )==false) { ?>
	
		<form action="" method="post">
			<label for="operator_id">video id</label> <input name=video_id
				type="text" value="413"></input><input type="submit" value="submit">
		</form>
	
	<?php
} else {
	
	?>
	  <div>
	  <?php
	if (isset ( $error )) {
		echo $error->getMessage ();
	} else {
		echo '<ul>';
		echo '<li>video_id : ' . $operator_video->video_id . '</li>';
		echo '<li>entry_date :' . $operator_video->entry_date . '</li>';
		echo '<li>video_thumb_image_path : ' . $operator_video->video_thumb_image_path . '</li>';
		echo '<li>video_pause_image_path : ' . $operator_video->video_pause_image_path . '</li>';
		echo '<li>video_preview_path : ' . $operator_video->video_preview_path . '</li>';
		echo '<li>video_webm_path : ' . uncdata ( $operator_video->video_webm_path ) . '</pre></li>';
		echo '<li>video_stream_path : ' . uncdata ( $operator_video->video_stream_path ) . '</pre></li>';
		echo '<li>video_hqstream_path : ' . uncdata ( $operator_video->video_hqstream_path ) . '</pre></li>';
		echo '<li>secure_video_thumb_image_path : ' . $operator_video->secure_video_thumb_image_path . '</li>';
		echo '<li>secure_video_pause_image_path : ' . $operator_video->secure_video_pause_image_path . '</li>';
		echo '<li>secure_video_preview_path : ' . $operator_video->secure_video_preview_path . '</li>';
		echo '<li>secure_video_webm_path : ' . uncdata ( $operator_video->secure_video_webm_path ) . '</pre></li>';
		echo '<li>secure_video_stream_path : ' . uncdata ( $operator_video->secure_video_stream_path ) . '</pre></li>';
		echo '<li>secure_video_hqstream_path : ' . uncdata ( $operator_video->secure_video_hqstream_path ) . '</pre></li>';		
		echo '<li>video_caption : ' . $operator_video->video_caption . '</li>';
		echo '<li>video_language : ' . $operator_video->video_language . '</li>';
                echo '<li>video_priveleges : ' . $operator_video->video_priveleges . '</li>';
		echo '<ul>';
	}
	
	?>
	  </div>
	<?php
}

?>
	</div>
	<br />


</body>
</html>