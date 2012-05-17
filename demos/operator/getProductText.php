<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';
require_once '../utilities.php';

$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$message = $request->getProductText ();

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
<h2>Get Operator's Text Titles - getProductText</h2>
<p>Operators' use the Get Prodcut Text function to retrieve their own Text description titles.</p>
<pre class="code" lang="php">
	$request = new OperatorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getProductText();	
    
	</pre>
	<div id="demo-frame">
	<?php if (isset ( $message )){ ?>

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