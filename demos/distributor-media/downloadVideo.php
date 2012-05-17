<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';


$video_id = $_POST ['video_id'];

if (isset ( $video_id )) {
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->downloadVideo ($video_id );
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
<h2>Distributor's Download Video</h2>
<p>Distributors use this downloadVideo function to download the HD video file. *only available to approved Distributors</p>
<pre class="code" lang="php">
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->downloadVideo ($video_id );
    
	</pre>
	<div id="demo-frame">
	<?php if (isset ( $message )==false){ ?>
		<form method="post">
			<label for="video_id">video_id</label> <input name=video_id
				type="text" value="160"></input> <input type="submit" value="submit">
		</form>
	
	<?php
	} else {
		
		?>
	  <div>
	  <?php
		$error = $message->error;
		if (isset ( $error )) {
			echo 'ErrorCode' . $error->errorCode . '</br>';
			echo 'ErroMessage' . $error->errorMessage . '</br>';
		} else {
			
			$download_video = $message->download_video;
			
			$download_video_details = $download_video [0];
			
			$download_video_detail = $download_video_details->download_video_details;
			
			echo '<ul>';
			echo '<li>download_video_stream_path : ' . uncdata ( $download_video_detail->download_video_stream_path ). '</li>';
			echo '<li>original_video_path : ' .  $download_video_detail->original_video_path . '</li>' ;
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