<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-operator-media-narnoo-request.php';
require_once '../narnoo-cofing.php';

$operator_id = $_POST ['operator_id'];

if (isset ( $operator_id )) {
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$request->sandbox = sandbox;
	try {
		$list = $request->getAlbums ( $operator_id );
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
	<h2>Distributor's get album names</h2>
	<p>Distributors use this function to retrieve Operator's album names</p>
	<pre class="code" lang="php">
$request = new DistributorOperatorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sandbox = sandbox;
try {
	$list = $request->getAlbums ( $operator_id );
} catch ( Exception $ex ) {
	$error = $ex;
}
	</pre>
	<div id="demo-frame">
<?php if (isset ( $operator_id ) == false){?>
	
		<form action="" method="post">
			<label for="operator_id">Operator id</label> <input name=operator_id
				type="text" value="39"></input><input type="submit" value="submit">
		</form>
	
	<?php
} else {
	
	?>
	  <div>
	  <?php

	if (isset ( $error )) {
		echo $error->getMessage();
	} else {
		echo '<label>total pages:'.$list->total_pages.'</label>';
		echo '<ul>';

		foreach ( $list->operator_albums as $album ) {

			echo '<li>album_id: ' . $album->album_id . '  album_name: ' . $album->album_name . '</li>';
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