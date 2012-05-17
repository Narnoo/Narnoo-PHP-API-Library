<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-operator-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$operator_id = $_POST ['operator_id'];

if (isset ( $operator_id )) {
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getProductText ( $operator_id );
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
<h2>Distributor's get product text</h2>
<p>Distributors use this function to retrieve Operator's product information</p>
	<pre class="code" lang="php">
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getProductTextWords( $operator_id );	
    
	</pre>
	<div id="demo-frame">
	<?php if (isset ( $message )==false){ ?>
		<form action="" method="post">
			<label for="operator_id">Operator id</label> <input name=operator_id
				type="text" value="39"></input><input type="submit" value="submit">
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
			
			$operator_products = $message->operator_products;
			
			echo '<ul>';
			foreach ( $operator_products as $item ) {
				$product = $item->operator_product;
				
				echo "<dl><dt>product_id</dt><dd>" . $product->product_id . "</dd><dt>product_title</dt><dd>" . $product->product_title . "</dd></dl>";
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