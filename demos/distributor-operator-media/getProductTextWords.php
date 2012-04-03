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
	$message = $request->getProductTextWords ( $operator_id, $product_title );
}

?>


<html>
<head>
<link href="../../css/demo.css" rel="stylesheet" type="text/css" />
<link href="../../scripts/highlight/highlight.css" rel="stylesheet"
	type="text/css" />

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

	<div id="demo-frame">
	<?php if (isset ( $message )==false){ ?>
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
		$error = $message->Error;
		if (isset ( $error )) {
			echo 'ErrorCode' . $error->ErrorCode . '</br>';
			echo 'ErroMessage' . $error->ErrorMessage . '</br>';
		} else {
			
			$operator_products = $message->operator_products;
			
			echo '<ul>';
			foreach ( $operator_products as $item ) {
				$product_description = $item->product_description;
				
				echo "<dl>";
				
				echo "<dt>product_title</dt><dd>" . $product_description->product_title . "</dd>";
				
				$text = $product_description->text;
				
				echo "<dt></dt><dd><ul>";
				echo "<li>word_50:" . $text->word_50 . "</li>";
				echo "<li>word_100:" . $text->word_100 . "</li>";
				echo "<li>word_150:" . $text->word_150 . "</li>";
				echo "</ul></dd>";
				
				echo "</dl>";
				
				
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
	<pre class="code" lang="php">
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getProductTextWords ( $operator_id, $product_title );
	</pre>

</body>
</html>