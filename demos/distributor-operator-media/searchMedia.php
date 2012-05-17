<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-operator-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$operator_id = $_POST ['operator_id'];

if (count ( $_POST ) > 0) {
	$media_type = $_POST ["media_type"];
	$business_name = $_POST ["business_name"];
	$country = $_POST ["country"];
	$state = $_POST ["state"];
	$category = $_POST ["category"];
	$subcategory = $_POST ["subcategory"];
	$suburb = $_POST ["suburb"];
	$location = $_POST ["location"];
	$postal_code = $_POST ["postal_code"];
	$latitude = $_POST ["latitude"];
	$longitude = $_POST ["longitude"];
	$keywords = $_POST ["keywords"];
	
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->searchMedia ( $media_type, $business_name, $country, $state, $category, $subcategory, $suburb, $location, $postal_code, $latitude, $longitude, $keywords );
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
<h2>Distributor's search their Operator's media</h2>
<p>Distributors use this function to search their Operator's media. *min 1 criteria needed</p>
<pre class="code" lang="php">
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->searchMedia ( $media_type, $business_name, $country, $state, $category, $subcategory, $suburb, $location, $postal_code, $latitude, $longitude, $keywords );
    
	</pre>
	<div id="demo-frame">
	<?php if (isset ( $message )==false){ ?>
		<form method="post">
			<label for="media_type">media_type</label><select name="media_type">
				<option value="image">image</option>
				<option value="brochure">brochure</option>
				<option value="video">video</option>
			</select><br /> <label for="business_name">business_name</label> <input
				name=business_name type="text"></input> <br /> <label for="country">country</label>
			<input name=country type="text"></input><label for="state">state</label>
			<input name=state type="text"></input> <br /> <label for="category">category</label>
			<input name=category type="text"></input> <label for="subcategory">subcategory</label>
			<input name=subcategory type="text"></input> <br /> <label
				for="suburb">suburb</label> <input name=suburb type="text"></input>
			<br /> <label for="location">location</label> <input name="location"
				type="text"></input> <br /> <label for="postal_code">postal_code</label>
			<input name="postal_code" type="text"></input> <br /> <label
				for="latitude">latitude</label> <input name="latitude" type="text"></input>
			<br /> <label for="longitude">longitude</label> <input name=longitude
				type="text"></input> <br /> <label for="keywords">keywords</label> <input
				name=keywords type="text" value="Narnoo"></input> <br /> <input
				type="submit" value="submit">
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
			
			$search_media = $message->search_media;
			
			foreach ( $search_media as $item ) {
				$search_media_image = $item->search_media_image;
				
				if (isset ( $search_media_image )) {
					echo '<li><dl>';
					echo "<dt>media_id</dt><dd>" . $search_media_image->media_id . "</dd>";
					echo "<dt>entry_date</dt><dd>" . $search_media_image->entry_date . "</dd>";
					echo "<dt>thumb_media_path</dt><dd>" . uncdata ( $search_media_image->thumb_media_path ) . "</dd>";
					echo "<dt>preview_media_path</dt><dd>" . uncdata ( $search_media_image->preview_media_path ) . "</dd>";
					echo "<dt>large_media_path</dt><dd>" . uncdata ( $search_media_image->large_media_path ) . "</dd>";
					echo "<dt>media_owner_business_name</dt><dd>" . $search_media_image->media_owner_business_name . "</dd>";
					echo "<dt>media_caption</dt><dd>" . $search_media_image->media_caption . "</dd>";
					
					echo '</dl></li>';
				}
				
				$search_media_brochure = $item->search_media_brochure;
				if (isset ( $search_media_brochure )) {
					echo '<li><dl>';
					echo "<dt>brochure_id</dt><dd>" . $search_media_brochure->brochure_id . "</dd>";
					echo "<dt>entry_date</dt><dd>" . $search_media_brochure->entry_date . "</dd>";
					echo "<dt>thumb_image_path</dt><dd>" . uncdata ( $search_media_brochure->thumb_image_path ) . "</dd>";
					echo "<dt>preview_image_path</dt><dd>" . uncdata ( $search_media_brochure->preview_image_path ) . "</dd>";
					
					$standard_pages = $search_media_brochure->standard_pages;
					
					echo "<dt>standard_pages</dt><dd><ul>";
					if (isset ( $standard_pages )) {
						echo '<li>page_0: ' . $standard_pages->page_0 . '</li>';
						echo '<li>page_1: ' . $standard_pages->page_1 . '</li>';
						echo '<li>page_2: ' . $standard_pages->page_2 . '</li>';
						echo '<li>page_3: ' . $standard_pages->page_3 . '</li>';
						echo '<li>page_4: ' . $standard_pages->page_4 . '</li>';
						echo '<li>page_5: ' . $standard_pages->page_5 . '</li>';
					
					}
					
					echo "</ul></dd>";
					
					$zoom_page = $search_media_brochure->zoom_page;
					echo '<dt>zoom_page </dt><dd><ul>';
					
					if (isset ( $zoom_page )) {
						echo '<li>page_order_xml_config: ' . $zoom_pages->page_order_xml_config . '</li>';
						echo '<li>file_path_to_pdf: ' . uncdata ( $zoom_pages->file_path_to_pdf ) . '</li>';
						echo '<li>validity_date: ' . $zoom_pages->validity_date . '</li>';
						echo '<li>brochure_caption: ' . $zoom_pages->brochure_caption . '</li>';
					}
					echo '</ul></dd>';
					
					echo '</dl></li>';
				}
				
				$search_media_video = $item->search_media_video;
				
				if (isset ( $search_media_video )) {
					echo '<li><dl>';
					echo "<dt>video_id</dt><dd>" . $search_media_video->video_id . "</dd>";
					echo "<dt>entry_date</dt><dd>" . $search_media_video->entry_date . "</dd>";
					echo "<dt>video_thumb_image_path</dt><dd>" . uncdata ( $search_media_video->video_thumb_image_path ) . "</dd>";
					echo "<dt>video_pause_image_path</dt><dd>" . uncdata ( $search_media_video->video_pause_image_path ) . "</dd>";
					echo "<dt>video_preview_path</dt><dd>" . uncdata ( $search_media_video->video_preview_path ) . "</dd>";
					echo "<dt>video_stream_path</dt><dd>" . uncdata ( $search_media_video->video_stream_path ) . "</dd>";
					echo "<dt>video_caption</dt><dd>" . $search_media_video->video_caption . "</dd>";
					echo "<dt>video_language</dt><dd>" . $search_media_video->video_language . "</dd>";
					
					echo '</dl></li>';
				}
			
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