<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$channel = $_POST ["channel"];
if (isset ( $channel )) {
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getChannelVideos ( $channel );
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
	<?php if (isset ( $message )==false){ ?>
		<form action="" method="post">
			<label for="channel">channel</label> <input name=channel type="text"
				value="disst_33_channel"></input><input type="submit" value="submit">
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
			echo '<ul>';
			
			$distributor_channel_videos = $message->distributor_channel_videos;
			
			foreach ( $distributor_channel_videos as $item ) {
				$channel_video_details = $item->channel_video_details;
				echo '<li><ul>';
				echo '<li>owner_id : ' . $channel_video_details->owner_id . '</li>';
				echo '<li>owner_business_name :' . $channel_video_details->owner_business_name . '</li>';
				echo '<li>video_id : ' . $channel_video_details->video_id . '</li>';
				echo '<li>entry_date : ' . $channel_video_details->entry_date . '</li>';
				echo '<li>video_thumb_image_path : ' . $channel_video_details->video_thumb_image_path . '</li>';
				
				echo '<li>video_pause_image_path : ' . $channel_video_details->video_pause_image_path . '</li>';
				echo '<li>video_preview_path : ' . $channel_video_details->video_preview_path . '</li>';
				echo '<li>video_stream_path : ' . uncdata ( $channel_video_details->video_stream_path ) . '</li>';
				echo '<li>video_caption : ' . $channel_video_details->video_caption . '</li>';
				echo '<li>video_language : ' . $channel_video_details->video_language . '</li>';
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
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getChannelVideos ( $channel );
	</pre>

</body>
</html>