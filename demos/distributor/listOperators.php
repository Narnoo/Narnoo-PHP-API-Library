<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-narnoo-request.php';
require_once '../narnoo-cofing.php';

$request = new DistributorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$message = $request->listOperators ();

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
<p>Distributors use this function to list the details of Operator on their access list</p>
	<pre class="code" lang="php">	
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->listOperators();
    
	</pre>
	<div id="demo-frame">
	<?php
	if (isset ( $message )) {
		
		?>
	  <div>
	  <?php
		$error = $message->Error;
		if (isset ( $error )) {
			echo 'ErrorCode' . $error->ErrorCode . '</br>';
			echo 'ErroMessage' . $error->ErrorMessage . '</br>';
		} else {
			echo '<ul>';
			foreach ( $message->operators as $item ) {
				$business = $item->operator;
				echo '<li><ul>';
				echo '<li>operator_id : ' . $business->operator_id . '</li>';
				echo '<li>category : ' . $business->category . '</li>';
				echo '<li>sub_category : ' . $business->sub_category . '</li>';
				echo '<li>operator_businessname : ' . $business->operator_businessname . '</li>';
				echo '<li>country_name : ' . $business->country_name . '</li>';
				echo '<li>state : ' . $business->state . '</li>';
				echo '<li>suburb : ' . $business->suburb . '</li>';
				echo '<li>latitude : ' . $business->latitude . '</li>';
				echo '<li>longitude : ' . $business->longitude . '</li>';
				echo '<li>postcode : ' . $business->postcode . '</li>';
				echo '<li>keywords : ' . $business->keywords . '</li>';
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
	



</body>
</html>