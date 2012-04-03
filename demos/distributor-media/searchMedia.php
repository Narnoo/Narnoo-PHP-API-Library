<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$operator_id = $_POST ['operator_id'];

if (count ( $_POST ) > 0) {
	$media_type = $_POST ["media_type"];
	$category = $_POST ["category"];
	$subcategory = $_POST ["subcategory"];
	$suburb = $_POST ["suburb"];
	$location = $_POST ["location"];
	$latitude = $_POST ["latitude"];
	$longitude = $_POST ["longitude"];
	$keywords = $_POST ["keywords"];
	
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->searchMedia ( $media_type, $category, $subcategory, $suburb, $location, $latitude, $longitude, $keywords );
}

?>


<html>
<head>
<link href="../../css/demo.css" rel="stylesheet" type="text/css" />
<link href="../../scripts/highlight/highlight.css" rel="stylesheet"
	type="text/css" />

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
		<form method="post">
			<label for="media_type">media_type</label><select name="media_type">
				<option value="image">image</option>
				<option value="brochure">brochure</option>
				<option value="video">video</option>
			</select><br /> <label for="category">category</label> <input
				name=category type="text"></input> <br /> <label for="subcategory">subcategory</label>
			<input name=subcategory type="text"></input> <br /> <label
				for="suburb">suburb</label> <input name=suburb type="text"></input>
			<br /> <label for="location">location</label> <input name="location"
				type="text"></input> <br /> <label for="latitude">latitude</label> <input
				name="latitude" type="text"></input> <br /> <label for="longitude">longitude</label>
			<input name=longitude type="text"></input> <br /> <label
				for="keywords">keywords</label> <input name=keywords type="text"></input>
			<br /> <input type="submit" value="submit">
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
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->searchMedia ( $media_type, $category, $subcategory, $suburb, $location, $latitude, $longitude, $keywords );
	</pre>

</body>
</html>