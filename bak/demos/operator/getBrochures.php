<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';
require_once '../utilities.php';

$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$message = $request->getBrochures ();

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
	<?php if (isset ( $message )){ ?>
	  <div>
	  <?php
		$error = $message->Error;
		if (isset ( $error )) {
			echo 'ErrorCode' . $error->ErrorCode . '</br>';
			echo 'ErroMessage' . $error->ErrorMessage . '</br>';
		} else {
			echo '<ul>';
			foreach ( $message->operator_brochures as $item ) {
				$brochure = $item->brochure;
				
				echo '<li><ul>';
				echo '<li>brochure_id : ' . $brochure->brochure_id . '</li>';
				echo '<li>entry_date :' . $brochure->entry_date . '</li>';
				echo '<li>thumb_image_path : ' . $brochure->thumb_image_path . '</li>';
				echo '<li>preview_image_path : ' . $brochure->preview_image_path . '</li>';
				echo '<li>page_order_xml_config : ' . $brochure->page_order_xml_config . '</li>';
				echo '<li>file_path_to_pdf : ' . uncdata ( $brochure->file_path_to_pdf ) . '</li>';
				echo '<li>validity_date : ' . $brochure->validity_date . '</li>';
				echo '<li>brochure_caption : ' . $brochure->brochure_caption . '</li>';
				echo '</ul></li>';
			}
			echo '</ul>';
		}
		
		?>
	  </div>
	<?php
	}
	
	?>
	</div>

	<br />
	<pre class="code" lang="php">
	$request = new OperatorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getBrochures ();	
	</pre>

</body>
</html>