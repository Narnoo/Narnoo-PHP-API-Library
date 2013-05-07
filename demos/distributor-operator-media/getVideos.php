<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-operator-media-narnoo-request.php';
require_once '../narnoo-cofing.php';

$operator_id = $_POST ['operator_id'];

if (isset ( $operator_id )) {
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$request->sandbox = sandbox;
	try {
		$list = $request->getVideos ( $operator_id );
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
	<h2>Distributor's get an Opeartor's videos list details</h2>
	<p>Distributors use this function to retrieve Operator's videos list
		information</p>
	<pre class="code" lang="php">
$request = new DistributorOperatorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$list = $request->getVideos ( $operator_id );
} catch ( Exception $ex ) {
	$error = $ex;
}
	</pre>
	<div id="demo-frame">
	<?php if (isset ( $operator_id )==false){ ?>
		<form action="" method="post">
			<label for="operator_id">Operator id</label> <input name=operator_id
				type="text" value="39"></input><input type="submit" value="submit">
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
			foreach ( $list->operator_videos as $operator_video ) {
				
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
	<?php
	}
	
	?>
	</div>

</body>
</html>