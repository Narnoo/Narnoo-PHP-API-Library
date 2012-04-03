<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$image_id = $_POST ['image_id'];

if (isset ( $image_id )) {
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->downloadImage ( $image_id );
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
			<label for="image_id">image_id</label> <input name=image_id
				type="text" value="212"></input> <input type="submit" value="submit">
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
			
			$download_image_details = $download_image [0];
			
			$download_image_detail = $download_image_details->download_image_details;
			
		    echo "download_image_link:" . uncdata($download_image_detail->download_image_link); 
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
	$message = $request->downloadImage ( $operator_id, $image_id );
	</pre>

</body>
</html>