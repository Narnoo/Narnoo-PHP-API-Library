<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-operator-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$operator_id = $_POST ['operator_id'];
$product_title = $_POST ["product_title"];

if (isset ( $operator_id )) {
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$request->sandbox = sandbox;
	try {
		$product_description = $request->getProductTextWords ( $operator_id, $product_title );
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
	<h2>Distributor's get product text words</h2>
	<p>Distributors use this function to retrieve Operator's product
		information text (50/100/150)</p>
	<pre class="code" lang="php">
$request = new DistributorOperatorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$product_description = $request->getProductTextWords ( $operator_id, $product_title );
} catch ( Exception $ex ) {
	$error = $ex;
} 
	</pre>
	<div id="demo-frame">
	<?php if (isset ( $operator_id )==false){ ?>
		<form action="" method="post">
			<label for="operator_id">Operator id</label> <input name=operator_id
				type="text" value="39"></input><label for="product_title">product_title</label>
			<input name=product_title type="text" value="Narnoo Platform"></input><input
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
			
			$items = $product_description->operator_products;
			$item = $items[0];
			
			echo "<dl>";
			
			echo "<dt>product_title</dt><dd>" . $item->product_title . "</dd>";
			
			$text = $item->text;
			
			echo "<dt></dt><dd><ul>";
			echo "<li>word_50:" . $text->word_50 . "</li>";
			echo "<li>word_100:" . $text->word_100 . "</li>";
			echo "<li>word_150:" . $text->word_150 . "</li>";
			echo "</ul></dd>";
			
			echo "</dl>";
		
		}
		
		?>
	  </div>
	<?php
	}
	
	?>
	</div>

</body>
</html>