<?php

require_once 'narnoo-cofing.php';
require_once 'narnoo/class-distributor-narnoo-request.php';

$operator_id = $_POST ['operator_id'];
echo $operator_id;
if (isset ( $operator_id )) {
	$request = new DistributorNarnooRequest ();
	$message = $request->addOperators ( $operator_id );
}

?>


<html>
<head>
</head>
<body>
	<form action="" method="post">
		<label for="operator">Operator id</label> <input name=operator_id
			type="text"></input><input type="submit" value="submit">
	</form>
	
	<?php
	if (isset ( $message )) {
		
		?>
	  <div>
	  <?php echo $message?>
	  </div>
	<?php
	}
	
	?>
	<div></div>

</body>
</html>