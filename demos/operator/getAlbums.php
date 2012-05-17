<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-operator-narnoo-request.php';
require_once '../narnoo-operator-config.php';

$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$message = $request->getAlbums ();

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
<h2>Get Operator's Albums - getAlbums</h2>
<p>Operators' use the Get Albums function to retrieve their own album names.</p>
	<pre class="code" lang="php">
$request = new OperatorNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$message = $request->getAlbums ();
	
	</pre>
	<div id="demo-frame">
<?php
if (isset ( $message )) {
	?>

	  <div>
	  <?php
	$error = $message->error;
	if (isset ( $error )) {
		echo 'ErrorCode' . $error->errorCode . '</br>';
		echo 'ErroMessage' . $error->errorMessage . '</br>';
	} else {
		echo '<ul>';
		
		$operator_albums = $message->operator_albums;
		
		foreach ( $operator_albums as $item ) {
			$album = $item->album;
			echo '<li><ul>';
			echo '<li>album_id : ' . $album->album_id . '</li>';
			echo '<li>album_name : ' . $album->album_name . '</li>';			
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

</body>
</html>