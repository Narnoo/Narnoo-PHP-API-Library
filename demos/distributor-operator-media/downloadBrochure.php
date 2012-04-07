<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-operator-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$operator_id = $_POST ["operator_id"];
$brochure_id = $_POST ['brochure_id'];

if (isset ( $brochure_id ) && isset ( $operator_id )) {
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->downloadBrochure ( $operator_id, $brochure_id );
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

	<div id="demo-frame">
	<?php if (isset ( $message )==false){ ?>
		<form method="post">
			<label for="operator_id">operator_id</label><input name="operator_id"
				type="text" value="39"></input> <label for="brochure_id">brochure_id</label>
			<input name=brochure_id type="text" value="310"></input> <input
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
			
			$download_brochure = $message->download_brochure;
			
			$download_brochure_details = $download_brochure [0];
			
			$download_brochure_detail = $download_brochure_details->download_brochure_details;
			
			echo 'download_brochure_to_pdf_path : ' . uncdata ( $download_brochure_detail->download_brochure_to_pdf_path );
		
		}
		
		?>
	  </div>
	<?php
	}
	
	?>
	</div>

	<br />

	<pre class="code" lang="php">
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->downloadBrochure( $operator_id, $brochure_id );
	</pre>

</body>
</html>