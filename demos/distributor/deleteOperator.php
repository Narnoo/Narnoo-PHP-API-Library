<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-narnoo-request.php';
require_once '../narnoo-cofing.php';

$operator_id = $_POST ['operator_id'];

if (isset ( $operator_id )) {
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$request->sandbox = sandbox;
	try {
		$request->deleteOperator ( $operator_id );
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
	<h2>Distributor's can delete Opeartors</h2>
	<p>Distributors use this function to remove Operator's from their
		access list</p>
	<pre class="code" lang="php">
$request = new DistributorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$reqeust->sandbox = sandbox;
try {
	$request->deleteOperator ( $operator_id );
} catch ( Exception $ex ) {
	$error = $ex;
}
	</pre>
	<div id="demo-frame">
		<form action="" method="post">
			<label for="operator">Operator id</label> <input name=operator_id
				type="text"></input><input type="submit" value="submit">
		</form>
	
	<?php
	if (isset ( $operator_id )) {
		
		?>
	  <div>
	  <?php
		
		if (isset ( $error )) {
			echo $error->getMessage ();
		} else {
			echo 'done.';
		}
		?>
	  </div>
	  <?php } ?>
	</div>
</body>
</html>