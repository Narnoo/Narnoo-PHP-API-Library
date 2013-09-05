<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';

$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$list = $request->getImages ();
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
	<h2>Get Operator's Images - getImages</h2>
	<p>Operators' use the Get Images function to retrieve their own images.</p>
	<pre class="code" lang="php">
$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$list = $request->getImages ();
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
				
				foreach ( $list->operator_images as $image ) {
					
					echo '<li><ul>';
					echo '<li>image_id : ' . $image->image_id . '</li>';
					echo '<li>entry_date : ' . $image->entry_date . '</li>';
					echo '<li>thumb_image_path : ' . $image->thumb_image_path . '</li>';
					echo '<li>preview_image_path : ' . $image->preview_image_path . '</li>';
					echo '<li>large_image_path : ' . $image->large_image_path . '</li>';
					echo '<li>secure_thumb_image_path : ' . $image->secure_thumb_image_path . '</li>';
					echo '<li>secure_preview_image_path : ' . $image->secure_preview_image_path . '</li>';
					echo '<li>secure_large_image_path : ' . $image->secure_large_image_path . '</li>';
					echo '<li>image_caption : ' . $image->image_caption . '</li>';
                                        echo '<li>image_privileges : ' . $image->image_privileges . '</li>';
					echo '</ul></li>';
				}
				
				echo '</ul>';
			}
			
			?>
	  </div>


</body>
</html>