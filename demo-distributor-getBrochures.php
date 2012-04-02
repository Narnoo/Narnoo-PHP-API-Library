<?php

require_once 'narnoo/narnoo-config.php';
require_once 'narnoo/class-distributor-narnoo-request.php';
require_once 'narnoo/utilities.php';

$operator_id = $_POST ['operator_id'];

if (isset ( $operator_id )) {
	$request = new DistributorNarnooRequest ();
	$request->setAuth ( app_key, secret_key );
	$message = $request->getBrochures($operator_id);
}

?>


<html>
<head>
</head>
<body>
	<form action="" method="post">
		<label for="operator_id">Operator id</label> <input name=operator_id
			type="text" value="39"></input><input type="submit" value="submit">
	</form>
	
	<?php
	if (isset ( $message )) {
		
		?>
	  <div>
	  <?php
		$error = $message->Error;
		if (isset ( $error )) {
			echo 'ErrorCode' . $error->ErrorCode .'</br>';
			echo 'ErroMessage' . $error->ErrorMessage . '</br>';
		}else{
			echo '<ul>';
			foreach($message->operator_brochures as $item){
			  	$brochure = $item->brochure;
			  	
			  	echo '<li><ul>';
			  	echo '<li>brochure_id : ' . $brochure->brochure_id . '</li>';
			  	echo '<li>entry_date :' . $brochure->entry_date . '</li>';
			  	echo '<li>thumb_image_path : ' . $brochure->thumb_image_path . '</li>';
			  	echo '<li>preview_image_path : ' . $brochure->preview_image_path . '</li>';
			  	echo '<li>page_order_xml_config : ' . $brochure->page_order_xml_config . '</li>';
			  	echo '<li>file_path_to_pdf : ' . uncdata($brochure->file_path_to_pdf) . '</li>';
			  	echo '<li>validity_date : ' . $brochure->validity_date . '</li>';
			  	echo '<li>brochure_caption : ' . $brochure->brochure_caption . '</li>';
			  	echo '</ul></li>';
			}
			echo '</ul>';
		}
		
		?>
	  </div>
	<?php
	}
	
	?>
	<div></div>

</body>
</html>