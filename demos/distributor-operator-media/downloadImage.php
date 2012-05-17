<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-operator-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$operator_id = $_POST ["operator_id"];
$image_id = $_POST ['image_id'];

if (isset ( $image_id ) && isset ( $operator_id )) {
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->downloadImage ( $operator_id, $image_id );
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
<h2>Distributor's download Operator's Image</h2>
<p>Distributors use this function to download an Operator's high resolution image</p>
	<pre class="code" lang="php">
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->downloadImage ( $operator_id, $image_id );
    
	</pre>
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
		$error = $message->error;
		if (isset ( $error )) {
			echo 'ErrorCode' . $error->errorCode . '</br>';
			echo 'ErroMessage' . $error->errorMessage . '</br>';
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

</body>
</html>