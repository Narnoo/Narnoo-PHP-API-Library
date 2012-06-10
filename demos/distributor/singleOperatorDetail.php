
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
		$operator = $request->singleOperatorDetail ( $operator_id );
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
	<h2>Distributor's can list Operator details</h2>
	<p>Distributors use this function to get a single Operators' details</p>
	<pre class="code" lang="php">
$request = new DistributorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$operator = $request->singleOperatorDetail ( $operator_id );
} catch ( Exception $ex ) {
	$error = $ex;
}
	</pre>
	<div id="demo-frame">
		<form action="" method="post">
			<label for="operator">Operator id</label> <input name=operator_id
				type="text" value="39"></input><input type="submit" value="submit">
		</form>

		<div>
	  <?php
			
			if (isset ( $error )) {
				echo $error->getMessage ();
			} else {
				if (isset ( $operator )) {
					
					?>
			  
			  <dl>
				<dt>operator_id</dt>
				<dd><?php echo  $operator->operator_id ?></dd>

				<dt>category</dt>
				<dd><?php echo $operator->category ?></dd>

				<dt>sub_category</dt>
				<dd><?php echo $operator->sub_category ?></dd>


				<dt>operator_businessname</dt>
				<dd><?php echo $operator->operator_businessname ?></dd>

				<dt>country_name</dt>
				<dd><?php echo $operator->country_name ?></dd>


				<dt>state</dt>
				<dd><?php echo $operator->state ?></dd>

				<dt>suburb</dt>
				<dd><?php echo  $operator->suburb ?></dd>

				<dt>latitude</dt>
				<dd><?php echo  $operator->latitude ?></dd>

				<dt>longitude</dt>
				<dd><?php echo  $operator->longitude ?></dd>

				<dt>postcode</dt>
				<dd><?php echo  $operator->postcode ?></dd>

				<dt>keywords</dt>
				<dd><?php echo  $operator->keywords ?></dd>



			</dl>
			  <?php
				}
			}
			?>
	  </div>

	</div>

</body>
</html>