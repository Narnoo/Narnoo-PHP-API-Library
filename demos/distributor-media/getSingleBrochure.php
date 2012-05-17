<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$brochure_id = $_POST ['brochure_id'];

if (isset ( $brochure_id )) {
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getSingleBrochure ( $brochure_id );

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
<h2>Distributor's get single brochure</h2>
<p>Distributors use this getSingleBrochure function to retrieve a single brochure's detailed information.</p>
<pre class="code" lang="php">
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getSingleBrochure ($brochure_id );	
    
	</pre>
	<div id="demo-frame">
<?php if (isset ( $message ) ==false){ ?>
	<form action="" method="post">
			<label for="brochure_id">brochure id</label> <input name=brochure_id
				type="text" value="208"></input><input type="submit" value="submit">
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
		
		$distributor_brochure = $message->distributor_brochure;
		$brochure = $distributor_brochure [0]->brochure;
		
		echo '<dl>';
		echo '<dt>brochure_id</dt><dd>' . $brochure->brochure_id . '</dd>';
		echo '<dt>entry_date</dt><dd>' . $brochure->entry_date . '</dd>';
		echo '<dt>thumb_image_path</dt><dd>' . $brochure->thumb_image_path . '</dd>';
		echo '<dt>preview_image_path</dt><dd>' . $brochure->preview_image_path . '</dd>';
		echo '<dt>page_order_xml_config</dt><dd>' . $brochure->page_order_xml_config . '</dd>';
		echo '<dt>file_path_to_pdf</dt><dd>' . uncdata ( $brochure->file_path_to_pdf ) . '</dd>';
		echo '<dt>validity_date</dt><dd>' . $brochure->validity_date . '</dd>';
		echo '<dt>brochure_caption</dt><dd>' . $brochure->brochure_caption . '</dd>';
		
		$standard_pages = $brochure->standard_pages;
		echo '<dt>standard_pages</dt><dd> <ul>';
		echo '<li>page_0: ' . $standard_pages->page_0 . '</li>';
		echo '<li>page_1: ' . $standard_pages->page_1 . '</li>';
		echo '<li>page_2: ' . $standard_pages->page_2 . '</li>';
		echo '<li>page_3: ' . $standard_pages->page_3 . '</li>';
		echo '<li>page_4: ' . $standard_pages->page_4 . '</li>';
		echo '<li>page_5: ' . $standard_pages->page_5 . '</li>';
		echo '</ul></dd>';
		
		$zoom_pages = $brochure->zoom_page;
		echo '<dt>zoom_page </dt><dd><ul>';
		echo '<li>zoom_0: ' . $zoom_pages->zoom_0 . '</li>';
		echo '<li>zoom_1: ' . $zoom_pages->zoom_1 . '</li>';
		echo '<li>zoom_2: ' . $zoom_pages->zoom_2 . '</li>';
		echo '<li>zoom_3: ' . $zoom_pages->zoom_3 . '</li>';
		echo '<li>zoom_4: ' . $zoom_pages->zoom_4 . '</li>';
		echo '<li>zoom_5: ' . $zoom_pages->zoom_5 . '</li>';
		echo '</ul></dd>';
		
		echo '</dl>';
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