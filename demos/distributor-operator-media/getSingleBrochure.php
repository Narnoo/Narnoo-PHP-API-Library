<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-operator-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$operator_id = $_POST ['operator_id'];
$brochure_id = $_POST ['brochure_id'];

if (isset ( $operator_id )) {
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$request->sandbox = sandbox;
	try {
		$brochure = $request->getSingleBrochure ( $operator_id, $brochure_id );
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
	<h2>Distributor's get an Opeartor's single brochure details</h2>
	<p>Distributors use this function to retrieve Operator's single
		brochure information</p>
	<pre class="code" lang="php">
$request = new DistributorOperatorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$brochure = $request->getSingleBrochure ( $operator_id, $brochure_id );
} catch ( Exception $ex ) {
	$error = $ex;
}
	</pre>
	<div id="demo-frame">
<?php if (isset ( $operator_id ) ==false){ ?>
	<form action="" method="post">
			<label for="operator_id">Operator id</label> <input name=operator_id
				type="text" value="39"></input><label for="brochure_id">brochure id</label>
			<input name=brochure_id type="text" value="310"></input><input
				type="submit" value="submit">

		</form>
	
	<?php
} else {
	
	?>
	  <div>
	  <?php
	if (isset ( $error )) {
		echo $error->getMessage ();
	} else {
		echo '<ul>';
		echo '<li>brochure_id : ' . $brochure->brochure_id . '</li>';
		echo '<li>entry_date :' . $brochure->entry_date . '</li>';
		echo '<li>thumb_image_path : ' . $brochure->thumb_image_path . '</li>';
		echo '<li>preview_image_path : ' . $brochure->preview_image_path . '</li>';
		echo '<li>page_order_xml_config : ' . $brochure->page_order_xml_config . '</li>';
		echo '<li>file_path_to_pdf : ' . uncdata ( $brochure->file_path_to_pdf ) . '</li>';
		echo '<li>validity_date : ' . $brochure->validity_date . '</li>';
		echo '<li>brochure_caption : ' . $brochure->brochure_caption . '</li>';
		echo '<li>format:' . $brochure->format . '</li>';
		$pages = $brochure->pages;
		$standard_pages = $pages [0]->standard_pages;
		echo '<li>standard_pages : <ul>';
		foreach ( $standard_pages as $item ) {
			echo '<li>' . $item . '</li>';
		}
		echo '</ul></li>';
		
		$zoom_pages = $pages [0]->zoom_page;
		echo '<li>zoom_page : <ul>';
		foreach ( $zoom_pages as $item ) {
			echo '<li>' . $item . '</li>';
		}
		echo '</ul></li>';
		
		echo '</ul>';
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