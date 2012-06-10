<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$request = new DistributorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$list = $request->getBrochures ();
} catch ( Exception $ex ) {
	$error = $ex;
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
	<h2>Distributor's get brochures</h2>
	<p>Distributors use this get brochures function to retrieve their
		brochure information.</p>
	<pre class="code" lang="php">
$request = new DistributorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$list = $request->getBrochures ();
} catch ( Exception $ex ) {
	$error = $ex;
}	
	
    </pre>
	<div id="demo-frame">

	  <?php
			
			if (isset ( $error )) {
				echo $error->getMessage ();
			} else {
				echo '<label>total pages:' . $list->total_pages . '</label>';
				echo '<ul>';
				
				foreach ( $list->distributor_brochures as $brochure ) {
					echo '<li><ul>';
					echo '<li>brochure_id : ' . $brochure->brochure_id . '</li>';
					echo '<li>entry_date :' . $brochure->entry_date . '</li>';
					echo '<li>thumb_image_path : ' . $brochure->thumb_image_path . '</li>';
					echo '<li>preview_image_path : ' . $brochure->preview_image_path . '</li>';
					echo '<li>page_order_xml_config : ' . $brochure->page_order_xml_config . '</li>';
					echo '<li>validity_date : ' . $brochure->validity_date . '</li>';
					echo '<li>brochure_caption : ' . $brochure->brochure_caption . '</li>';
					echo '</ul></li>';
				}
				echo '</ul>';
			}
			
			?>
	  </div>

</body>
</html>