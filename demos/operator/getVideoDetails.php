<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';
require_once '../utilities.php';

$video_id = $_POST ['video_id'];

if (isset ( $video_id )) {
	$request = new OperatorNarnooRequest ();
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
<h2>Get Operator's Video - getVideoDetails</h2>
<p>Operators' use the Get Video Details function to retrieve their single video information.</p>
<pre class="code" lang="php">
	$request = new OperatorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getVideoDetails ($video_id );	
	</pre>
    <br/>
	<div id="demo-frame">
<?php if (isset ( $message )==false) { ?>
	
		<form action="" method="post">
			<label for="operator_id">video id</label> <input name=video_id
				type="text" value="413"></input><input type="submit" value="submit">
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
		echo '<ul>';
		foreach ( $message->operator_videos as $item ) {
			$operator_video = $item->operator_video;
			echo '<li><ul>';
			echo '<li>video_id : ' . $operator_video->video_id . '</li>';
			echo '<li>entry_date :' . $operator_video->entry_date . '</li>';
			echo '<li>video_thumb_image_path : ' . $operator_video->video_thumb_image_path . '</li>';
			echo '<li>video_pause_image_path : ' . $operator_video->video_pause_image_path . '</li>';
			echo '<li>video_preview_path : ' . $operator_video->video_preview_path . '</li>';
			echo '<li>video_stream_path : ' . uncdata ( $operator_video->video_stream_path ) . '</pre></li>';
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
	

</body>
</html>