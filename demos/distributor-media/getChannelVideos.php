<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$channel_name = $_POST ["channel_name"];
if (isset ( $channel_name )) {
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$request->sandbox = sandbox;
	try {
		$list = $request->getChannelVideos ( $channel_name );
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
	<h2>Distributor's get channel videos</h2>
	<p>Distributors use this getChannelVideos function to retrieve their
		video channel detailed information.</p>
	<pre class="code" lang="php">
$request = new DistributorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$list = $request->getChannelVideos ( $channel_name );
} catch ( Exception $ex ) {
	$error = $ex;
}
	</pre>
	<div id="demo-frame">
	<?php if (isset ( $channel_name )==false){ ?>
		<form action="" method="post">
			<label for="channel_name">channel</label> <input name="channel_name"
				type="text" value="disst_33_channel"></input><input type="submit"
				value="submit">
		</form>
	
	<?php
	} else {
		
		?>
	  <div>
	  <?php
		
		if (isset ( $error )) {
			echo $error->getMessage ();
		} else {
			echo '<label>total pages:' . $list->total_pages . '</label>';
			echo '<ul>';
			
			echo '<li><ul>';
			
			foreach ( $list->distributor_channel_videos as $channel_video_details ) {
				if ($channel_video_details->owner_id != '') {
					
					echo '<li>owner_id : ' . $channel_video_details->owner_id . '</li>';
					echo '<li>owner_business_name :' . $channel_video_details->owner_business_name . '</li>';
				}
				echo '<li>video_id : ' . $channel_video_details->video_id . '</li>';
				echo '<li>entry_date : ' . $channel_video_details->entry_date . '</li>';
				echo '<li>video_thumb_image_path : ' . $channel_video_details->video_thumb_image_path . '</li>';
				echo '<li>video_pause_image_path : ' . $channel_video_details->video_pause_image_path . '</li>';
				echo '<li>video_preview_path : ' . $channel_video_details->video_preview_path . '</li>';
				echo '<li>video_webm_path : ' . uncdata ( $channel_video_details->video_webm_path ) . '</li>';
				echo '<li>video_stream_path : ' . uncdata ( $channel_video_details->video_stream_path ) . '</li>';
				echo '<li>video_hqstream_path : ' . uncdata ( $channel_video_details->video_hqstream_path ) . '</li>';
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
</body>
</html>