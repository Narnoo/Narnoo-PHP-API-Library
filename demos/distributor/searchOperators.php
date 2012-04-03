<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-narnoo-request.php';
require_once '../narnoo-cofing.php';

if (count ( $_POST ) > 0) {
	$country = $_POST ["country"];
	$category = $_POST ["category"];
	$subcategory = $_POST ["subcategory"];
	$state = $_POST ["state"];
	$suburb = $_POST ["suburb"];
	$postal_code = $_POST ["postal_code"];
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->searchOperators ( $country, $category, $subcategory, $state, $suburb, $postal_code );
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

	<?php
	if (isset ( $message ) == false) {
		?>
		<form method="post">
			<label for="country">country</label> <input name=country type="text"></input>
			<br /> <label for="category">category</label> <input name=category
				type="text"></input> <br /> <label for="subcategory">subcategory</label>
			<input name=subcategory type="text"></input> <br /> <label
				for="state">state</label> <input name=state type="text"></input> <br />
			<label for="suburb">suburb</label> <input name=suburb type="text"></input>
			<br /> <label for="postal_code">postal_code</label> <input
				name=postal_code type="text"></input> <br /> <input type="submit"
				value="submit">
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
			$search_operators = $message->search_operators;
			?>
			<ul>
		<?php
			
foreach ( $search_operators as $item ) {
				$operator = $item->operator;
				?>					  
					 <li><dl>
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
					</dl></li>
		<?php
			}
			
			?>
	</ul>
		<?php } ?>
		</div>

		<?php } ?>	
</div>
	<br />
	<pre class="code" lang="php">	
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->searchOperators ( $country, $category, $subcategory, $state, $suburb, $postal_code );
	</pre>

</body>
</html>