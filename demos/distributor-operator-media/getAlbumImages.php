<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-operator-media-narnoo-request.php';
require_once '../narnoo-cofing.php';

$operator_id = $_POST ['operator_id'];
$album_name = $_POST ['album_name'];

if (isset ( $operator_id )) {
	$request = new DistributorOperatorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$request->sandbox = sandbox;
	try {
		$list = $request->getAlbumImages ( $operator_id, $album_name );
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
	<h2>Distributor's get Operator's album images</h2>
	<p>Distributors use this function to retrieve Operator's album images</p>
	<pre class="code" lang="php">
$request = new DistributorOperatorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$request->sanbox = false;
try {
	$list = $request->getAlbumImages ( $operator_id, $album_name );
} catch ( Exception $ex ) {
	$error = $ex;
}    
</pre>
	<div id="demo-frame">
<?php if (isset ( $operator_id )==false){ ?>
	<form action="" method="post">
			<label for="operator">Operator id</label> <input name=operator_id
				type="text" value="39"></input><label for="album_name">album name</label>
			<input name=album_name type="text" value="test"></input><input
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
		echo '<label>total pages:' . $list->total_pages . '</label>';
		
		?>
		
			<ul>
			
			
			<?php
		foreach ( $list->operator_albums_images as $album_image ) {
			echo '<li><ul>';
			
			echo '<li>album_name:' . $album_image->album_name . '</li>';
			echo '<li>image_id:' . $album_image->image_id . '</li>';
			echo '<li>entry_date:' . $album_image->entry_date . '</li>';
			echo '<li>thumb_image_path:' . $album_image->thumb_image_path . '</li>';
			echo '<li>preview_image_path:' . $album_image->preview_image_path . '</li>';
			echo '<li>large_image_path:' . $album_image->large_image_path . '</li>';
			echo '<li>image_caption:' . $album_image->image_caption . '</li>';
			
			echo '</ul></li>';
		}
		?>
			</ul>
	<?php 	} ?>
	</div>
	<?php
}
?>
	
</div>

</body>
</html>