<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';
require_once '../utilities.php';

$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$message = $request->getVideos ();

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
	<?php if (isset ( $message )){ ?>

	  <div>
	  <?php
		$error = $message->Error;
		if (isset ( $error )) {
			echo 'ErrorCode' . $error->ErrorCode . '</br>';
			echo 'ErroMessage' . $error->ErrorMessage . '</br>';
		} else {
			echo '<ul>';
			foreach ( $message->operator_videos as $item ) {
				$operator_video = $item->operator_video;
				echo '<li><ul>';
				echo '<li>video_id : ' . $operator_video->video_id . '</li>';
				echo '<li>entry_date :' . $operator_video->entry_date . '</li>';
				echo '<li>video_thumb_image_path : ' . $operator_video->video_thumb_image_path . '</li>';
				echo '<li>video_pause_image_path : ' . $operator_video->video_pause_image_path . '</li>';
				echo '<li>video_preview_path : ' . $operator_video->video_preview_path . '</li>';
				
				echo '<li>video_stream_path : ' . uncdata ( $operator_video->video_stream_path ) . '</li>';
				echo '<li>video_caption : ' . $operator_video->video_caption . '</li>';
				echo '<li>video_language : ' . $operator_video->video_language . '</li>';
				echo '</ul></li>';
			
			}
			
			echo '<ul>';
		}
		
		?>
	  </div>
	<?php
	}
	
	?>
	</div>

	<br />

	<pre class="code" lang="php">
	$request = new OperatorNarnooRequest ();	
	$request->setAuth ( app_key, secret_key );
	$message = $request->getVideos ();	
	</pre>

</body>
</html>