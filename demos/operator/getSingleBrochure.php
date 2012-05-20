<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';
require_once '../utilities.php';


$brochure_id = $_POST ['brochure_id'];

if (isset ( $brochure_id )) {
	$request = new OperatorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getSingleBrochure ($brochure_id );

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
<h2>Get Operator's Single Brochure - getSingleBrochure</h2>
<p>Operators' use the getSingleBrochure function to retrieve their brochure details.</p>
	<pre class="code" lang="php">
	$request = new OperatorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getSingleBrochure ($brochure_id );	
    
	</pre>
	<div id="demo-frame">
<?php if (isset ( $message ) ==false){ ?>
	<form action="" method="post">
			<label for="brochure_id">brochure id</label>
			<input name=brochure_id type="text" value="310"></input><input
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
			echo '<li>format : ' . $brochure->format . '</li>';
			$standard_pages = $brochure->standard_pages;
			echo '<li>standard_pages : <ul>';
			echo '<li>page_0: ' . $standard_pages->page_0 . '</li>';
			echo '<li>page_1: ' . $standard_pages->page_1 . '</li>';
			echo '<li>page_2: ' . $standard_pages->page_2 . '</li>';
			echo '<li>page_3: ' . $standard_pages->page_3 . '</li>';
			echo '<li>page_4: ' . $standard_pages->page_4 . '</li>';
			echo '<li>page_5: ' . $standard_pages->page_5 . '</li>';
			echo '</ul></li>';
			
			$zoom_pages = $brochure->zoom_page;
			echo '<li>zoom_page : <ul>';
			echo '<li>zoom_0: ' . $zoom_pages->zoom_0 . '</li>';
			echo '<li>zoom_1: ' . $zoom_pages->zoom_1 . '</li>';
			echo '<li>zoom_2: ' . $zoom_pages->zoom_2 . '</li>';
			echo '<li>zoom_3: ' . $zoom_pages->zoom_3 . '</li>';
			echo '<li>zoom_4: ' . $zoom_pages->zoom_4 . '</li>';
			echo '<li>zoom_5: ' . $zoom_pages->zoom_5 . '</li>';
			echo '</ul></li>';
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

</body>
</html>