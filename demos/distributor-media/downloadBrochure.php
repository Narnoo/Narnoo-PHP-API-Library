<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$brochure_id = $_POST ['brochure_id'];

if (isset ( $brochure_id )) {
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$request->sandbox = sandbox;
	try {
		$item = $request->downloadBrochure ( $brochure_id );
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
	<h2>Distributor's Download Brochure</h2>
	<p>Distributors use this downloadBrochures function to download their
		PDF. *only available to approved Distributors</p>
	<pre class="code" lang="php">
$request = new DistributorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$item = $request->downloadBrochure ( $brochure_id );
} catch ( Exception $ex ) {
	$error = $ex;
}

</pre>
	<div id="demo-frame">
	<?php if (isset ( $brochure_id )==false){ ?>
		<form method="post">
			<label for="brochure_id">brochure_id</label> <input name=brochure_id
				type="text" value="170"></input> <input type="submit" value="submit">
		</form>
	
	<?php
	} else {
		
		?>
	  <div>
	  <?php
		$error = $message->error;
		if (isset ( $error )) {
			echo $error->getMessage();
		} else {
			echo 'download_brochure_to_pdf_path : ' . uncdata ( $item->download_brochure_to_pdf_path );
		}
		
		?>
	  </div>
	<?php
	}
	
	?>
	</div>

</body>
</html>