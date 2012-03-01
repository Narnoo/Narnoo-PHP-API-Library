<?php

require_once 'narnoo-cofing.php';
require_once 'narnoo/class-distributor-narnoo-request.php';
require_once 'utilities.php';

$operator_id = $_POST ['operator_id'];

if (isset ( $operator_id )) {
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getVideos($operator_id);
}

?>


<html>
<head>
</head>
<body>
	<form action="" method="post">
		<label for="operator_id">Operator id</label> <input name=operator_id
			type="text" value="39"></input><input type="submit" value="submit">
	</form>
	
	<?php
	if (isset ( $message )) {
		
		?>
	  <div>
	  <?php
		$error = $message->Error;
		if (isset ( $error )) {
			echo 'ErrorCode' . $error->ErrorCode .'</br>';
			echo 'ErroMessage' . $error->ErrorMessage . '</br>';
		}else {
			echo '<ul>';
			foreach ( $message->operator_videos as $item ) {
				$operator_video = $item->operator_video;
				echo '<li><ul>';
				echo '<li>video_id : ' . $operator_video->video_id . '</li>';
				echo '<li>entry_date :' . $operator_video->entry_date . '</li>';
				echo '<li>video_thumb_image_path : ' . $operator_video->video_thumb_image_path . '</li>';
				echo '<li>video_pause_image_path : ' . $operator_video->video_pause_image_path . '</li>';
				echo '<li>video_preview_path : ' . $operator_video->video_preview_path . '</li>';
				
				echo '<li>video_stream_path : ' . uncdata($operator_video->video_stream_path) . '</li>';
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
	<div></div>

</body>
</html>