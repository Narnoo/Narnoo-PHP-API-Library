<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';

$request = new DistributorMediaNarnooRequest ();
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
<h2>Get Distributor's album names - Get Albums</h2>
<p>Distributors use the Get Albums function to retrieve their list of album names.</p>
	<pre class="code" lang="php">
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getAlbums ();	
	
	</pre>
	<div id="demo-frame">
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
		
		echo '<ul>';
		
		$distributor_albums = $message->distributor_albums;
		foreach ( $distributor_albums as $item ) {
			$album = $item->album;
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

</body>
</html>