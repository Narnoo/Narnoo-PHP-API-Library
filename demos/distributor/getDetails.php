<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-narnoo-request.php';
require_once '../narnoo-cofing.php';

$request = new DistributorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

try {
	$distributor = $request->getDetails ();
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
	<h2>Get Distributor's account information - getDetails</h2>
	<p>This function is used to retrieve Distributor's account info.</p>
	<pre class="code" lang="php">
$request = new DistributorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

try {
$distributor = $request->getDetails ();
} catch ( Exception $ex ) {
$error = $ex;
}	
</pre>
	<div id="demo-frame">


  <?php
		
		if (isset ( $error )) {
			echo $error->getMessage ();
		} else {
			?>
<dl>
			<dt>distributor_id</dt>
			<dd><?php echo $distributor->distributor_id ?></dd>
			<dt>distributor_businessname</dt>
			<dd><?php echo $distributor->distributor_businessname ?></dd>
			<dt>distributor_contactname</dt>
			<dd><?php echo $distributor->distributor_contactname ?></dd>
			<dt>country_name</dt>
			<dd><?php echo $distributor->country_name ?></dd>
			<dt>state</dt>
			<dd><?php echo $distributor->state ?></dd>
			<dt>suburb</dt>
			<dd><?php echo $distributor->suburb ?></dd>
			<dt>phone</dt>
			<dd><?php echo $distributor->phone ?></dd>
			<dt>url</dt>
			<dd><?php echo $distributor->url ?></dd>
			<dt>email</dt>
			<dd><?php echo $distributor->email ?></dd>
			<dt>postcode</dt>
			<dd><?php echo $distributor->postcode ?></dd>
			<dt>Total Images</dt>
			<dd><?php echo $distributor->total_images ?></dd>
			<dt>Total Brochures</dt>
			<dd><?php echo $distributor->total_brochures ?></dd>
			<dt>Total Videos</dt>
			<dd><?php echo $distributor->total_videos ?></dd>

		</dl>
<?php
}

?>
  </div>


</body>
</html>