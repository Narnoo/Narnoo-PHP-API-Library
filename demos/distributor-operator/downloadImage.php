<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-operator-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$operator_id = $_POST ["operator_id"];
$image_id = $_POST ['image_id'];

if (isset ( $image_id ) && isset ( $operator_id )) {
	$request = new DistributorOperatorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->downloadImage ( $operator_id, $image_id );
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
			<label for="operator_id">operator_id</label><input name="operator_id"
				type="text" value="39"></input> <label for="image_id">image_id</label>
			<input name=image_id type="text" value="295"></input> <input
				type="submit" value="submit">
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
			
			$download_image = $message->download_image;
			
			$download_image_details = $download_image[0];
			
			echo '<ul>';
			foreach ( $download_image_details as $item ) {
				
				echo '<li><ul>';
				echo '<li>image_id : ' . $item->video_id . '</li>';
				echo '<li>entry_date :' . $item->entry_date . '</li>';
				echo '<li>thumb_image_path : ' . uncdata ( $item->thumb_image_path ) . '</li>';
				echo '<li>preview_image_path : ' . uncdata ( $item->preview_image_path ) . '</li>';
				echo '<li>large_image_path : ' . uncdata ( $item->large_image_path ) . '</li>';
				
				echo '<li>image_owner_business_name : ' . $item->image_owner_business_name . '</li>';
				echo '<li>image_caption : ' . $item->image_caption . '</li>';
				
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
	$request = new DistributorOperatorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->downloadImage ( $operator_id, $image_id );
	</pre>

</body>
</html>