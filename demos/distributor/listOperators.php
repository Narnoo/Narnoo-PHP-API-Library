<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-narnoo-request.php';
require_once '../narnoo-cofing.php';

$request = new DistributorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

try {
	$list = $request->listOperators ();
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
	<h2>Distributor's can list Opeartors</h2>
	<p>Distributors use this function to list the details of Operator on
		their access list</p>
	<pre class="code" lang="php">	
$request = new DistributorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;

try {
	$list = $request->listOperators ();
} catch ( Exception $ex ) {
	$error = $ex;
}
    
	</pre>
	<div id="demo-frame">

		<div>
	  <?php
			
			if (isset ( $error )) {
				echo $error->getMessage ();
			} else {
				echo '<lable>total pages:' . $list->total_pages . '</label>';
				echo '<ul>';
				foreach ( $list->operators as $operator ) {
					
					echo '<li><ul>';
					echo '<li>operator_id : ' . $operator->operator_id . '</li>';
					echo '<li>category : ' . $operator->category . '</li>';
					echo '<li>sub_category : ' . $operator->sub_category . '</li>';
					echo '<li>operator_businessname : ' . $operator->operator_businessname . '</li>';
					echo '<li>country_name : ' . $operator->country_name . '</li>';
					echo '<li>state : ' . $operator->state . '</li>';
					echo '<li>suburb : ' . $operator->suburb . '</li>';
					echo '<li>latitude : ' . $operator->latitude . '</li>';
					echo '<li>longitude : ' . $operator->longitude . '</li>';
					echo '<li>postcode : ' . $operator->postcode . '</li>';
					echo '<li>keywords : ' . $operator->keywords . '</li>';
					echo '</ul></li>';
				}
				
				echo '</ul>';
			
			}
			
			?>
	  </div>

	</div>
	<br />




</body>
</html>