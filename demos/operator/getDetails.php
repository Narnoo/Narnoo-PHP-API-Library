<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';

$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

try {
	$operator = $request->getDetails ();
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
	<h2>Get Operator's account information - getDetails</h2>
	<p>This function is used to retrieve Operator's account info.</p>
	<pre class="code" lang="php">
$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

try {
$operator = $request->getDetails ();
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
			<dt>operator_id</dt>
			<dd><?php echo $operator->operator_id ?></dd>
			<dt>operator_url</dt>
			<dd><?php echo $operator->operator_url ?></dd>
			<dt>operator_username</dt>
			<dd><?php echo $operator->operator_username ?></dd>
			<dt>operator_businessname</dt>
			<dd><?php echo $operator->operator_businessname ?></dd>
			<dt>operator_contactname</dt>
			<dd><?php echo $operator->operator_contactname ?></dd>
			<dt>country_name</dt>
			<dd><?php echo $operator->country_name ?></dd>
			<dt>state</dt>
			<dd><?php echo $operator->state ?></dd>
			<dt>suburb</dt>
			<dd><?php echo $operator->suburb ?></dd>
			<dt>phone</dt>
			<dd><?php echo $operator->phone ?></dd>
			<dt>email</dt>
			<dd><?php echo $operator->email ?></dd>
			<dt>postcode</dt>
			<dd><?php echo $operator->postcode ?></dd>
			<dt>Total Images</dt>
			<dd><?php echo $operator->total_images ?></dd>
			<dt>Total Brochures</dt>
			<dd><?php echo $operator->total_brochures ?></dd>
			<dt>Total Videos</dt>
			<dd><?php echo $operator->total_videos ?></dd>
			<dt>Total Products</dt>
			<dd><?php echo $operator->total_products ?></dd>

		</dl>
<?php
}

?>
  </div>


</body>
</html>