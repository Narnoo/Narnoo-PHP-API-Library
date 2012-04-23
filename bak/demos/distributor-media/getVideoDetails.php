<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$video_id = $_POST ['video_id'];

if (isset ( $video_id )) {
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getVideoDetails ( $video_id );

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
	<div id="demo-frame">
<?php if (isset ( $message )==false) { ?>
	
		<form action="" method="post">
			<label for="video_id">video id</label> <input name=video_id
				type="text" value="160"></input><input type="submit" value="submit">
		</form>
	
	<?php
} else {
	
	?>
	  <div>
	  <?php
	$error = $message->Error;
	if (isset ( $error )) {
		echo 'ErrorCode' . $error->ErrorCode . '</br>';
		echo 'ErroMessage' . $error->ErrorMessage . '</br>';
	} else {
		
		$distributor_video_detail = $message->distributor_video_details[0];
		
		$distributor_video = $distributor_video_detail->distributor_video;
		

		echo '<dl>';
		echo '<dt>video_id<dt><dd>' . $distributor_video->video_id . '</dt>';
		echo '<dt>entry_date<dt><dd>' . $distributor_video->entry_date . '</dt>';
		echo '<dt>video_thumb_image_path<dt><dd>' . $distributor_video->video_thumb_image_path . '</dt>';
		echo '<dt>video_pause_image_path <dt><dd> ' . $distributor_video->video_pause_image_path . '</dt>';
		echo '<dt>video_preview_path<dt><dd> ' . $distributor_video->video_preview_path . '</li>';
		echo '<dt>video_stream_path<dt><dd>' . uncdata ( $distributor_video->video_stream_path ) . '</pre></dt>';
		echo '<dt>video_caption <dt><dd> ' . $distributor_video->video_caption . '</dt>';
		echo '<dt>video_language <dt><dd>' . $distributor_video->video_language . '</dt>';
		echo '</dl>';
	
	}
	
	?>
	  </div>
	<?php
}

?>
	</div>
	<br />
	<pre class="code" lang="php">
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getVideoDetails ($video_id );	
	</pre>

</body>
</html>