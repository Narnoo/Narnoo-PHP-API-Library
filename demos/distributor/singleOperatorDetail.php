
<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-narnoo-request.php';
require_once '../narnoo-cofing.php';

$operator_id = $_POST ['operator_id'];

if (isset ( $operator_id )) {
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->singleOperatorDetail ( $operator_id );
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
		<form action="" method="post">
			<label for="operator">Operator id</label> <input name=operator_id
				type="text"></input><input type="submit" value="submit">
		</form>
		
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
				$operator_detail = $message->operator_detail;
				$operator = $operator_detail [0]->operator;
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
			?>
	  </div>
	<?php
		} else {
			echo $message;
		}
		
		?>
	</div>

	<br />
	<pre class="code" lang="php">
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->singleOperatorDetail ( $operator_id );
			</pre>




</body>
</html>