<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';

$request = new DistributorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$list = $request->getVideos ();
} catch ( Exception $ex ) {
	$error = $ex;
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
	<h2>Distributor's get videos</h2>
	<p>Distributors use this Get Videos function to retreive their videos</p>
	<pre class="code" lang="php">
$request = new DistributorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$list = $request->getVideos ();
} catch ( Exception $ex ) {
	$error = $ex;
}
    </pre>
	<div id="demo-frame">
	  <?php
			if (isset ( $error )) {
				echo $error->getMessage ();
			} else {
				echo '<label>total pages:' . $list->total_pages . '</label>';
				echo '<ul>';
				
				foreach ( $list->distributor_videos as $operator_video ) {
					
					echo '<li><ul>';
					echo '<li>video_id : ' . $operator_video->video_id . '</li>';
					echo '<li>entry_date :' . $operator_video->entry_date . '</li>';
					echo '<li>video_thumb_image_path : ' . $operator_video->video_thumb_image_path . '</li>';
					echo '<li>video_pause_image_path : ' . $operator_video->video_pause_image_path . '</li>';
					echo '<li>video_preview_path : ' . $operator_video->video_preview_path . '</li>';
					echo '<li>secure_video_thumb_image_path : ' . $operator_video->secure_video_thumb_image_path . '</li>';
					echo '<li>secure_video_pause_image_path : ' . $operator_video->secure_video_pause_image_path . '</li>';
					echo '<li>secure_video_preview_path : ' . $operator_video->secure_video_preview_path . '</li>';
					echo '<li>video_caption : ' . $operator_video->video_caption . '</li>';
					echo '<li>video_language : ' . $operator_video->video_language . '</li>';
					echo '</ul></li>';
				
				}
				
				echo '<ul>';
			}
			
			?>
	
	</div>

</body>
</html>