<?php

require_once '../../narnoo/class-narnoo-request.php';
require_once '../../narnoo/class-distributor-media-narnoo-request.php';
require_once '../narnoo-cofing.php';
require_once '../utilities.php';

$request = new DistributorMediaNarnooRequest ();
$request->setAuth ( app_key, secret_key );
$message = $request->getChannelList ();

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

	<div id="demo-frame">
	<?php if (isset ( $message )){ ?>
	  <div>
	  <?php
		$error = $message->Error;
		if (isset ( $error )) {
			echo 'ErrorCode' . $error->ErrorCode . '</br>';
			echo 'ErroMessage' . $error->ErrorMessage . '</br>';
		} else {
			echo '<ul>';
			

			$distributor_channel_list = $message->distributor_channel_list;			
			
			foreach ( $distributor_channel_list as $item ) {
				$channel = $item->channel;
				echo '<li><ul>';
				echo '<li>channel_id : ' . $channel->channel_id . '</li>';
				echo '<li>channel_name :' . $channel->channel_name . '</li>';
				echo '<li>location : ' . $channel->location . '</li>';
				echo '<li>latitude : ' . $channel->latitude . '</li>';
				echo '<li>longitude : ' . $channel->longitude . '</li>';
				
		
				echo '</ul></li>';
			
			}
			
			echo '<ul>';
		}
		
		?>
	  </div>
	<?php
	}
	
	?>
	</div>

	<br />

	<pre class="code" lang="php">
	$request = new DistributorMediaNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getChannelList ();
	</pre>

</body>
</html>