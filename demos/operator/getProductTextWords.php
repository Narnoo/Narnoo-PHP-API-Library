<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';
require_once '../utilities.php';

$product_title = $_POST ["product_title"];

if (isset ( $product_title )) {
	$request = new OperatorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$request->sandbox = sandbox;
	try {
		$product = $request->getProductTextWords ( $product_title );
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
	<h2>Get Operator's Text - getProductTextWords</h2>
	<p>Operators' use the Get Product Text Words function to retrieve their
		own product descriptions.</p>
	<pre class="code" lang="php">
$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$product = $request->getProductTextWords ( $product_title );
} catch ( Exception $ex ) {
	$error = $ex;
}
	</pre>
	<div id="demo-frame">
	<?php if (isset ( $product_title )==false){ ?>
		<form action="" method="post">
			<label for="product_title">product_title</label> <input
				name=product_title type="text" value="Narnoo Platform"></input><input
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
		
			
			echo "<dl>";
			
			echo "<dt>product_title</dt><dd>" . $product->product_title . "</dd>";
			
			$text = $product->text;
			
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