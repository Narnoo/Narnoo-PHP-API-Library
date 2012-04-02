
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Narnoo.com - Tourism Media Networking Platform</title>
<link href="css/public-style.css" rel="stylesheet" type="text/css" />
<link href="css/demo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"
	src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$('dd a').click(function(e){
		e.preventDefault();	
		$('#code-container').attr('src',$(this).attr('href')+'?r='+Math.random())
	});
});
</script>

</head>
<body marginwidth="0" marginheight="0">

	<!-- Header Nav Contents -->
	<div id="topNavBox">
		<div id="topNavContainer">
			<div id="menu_items" class="menu_nav">
				<a href="index.php"><img src="images/public-home-icon.png"
					width="25" height="25" alt="home"></a> <a href="howitworks.php">How
					Narnoo Works</a> <a href="pricing.php">Prices</a><a
					href="tools.php">Tools</a><a href="demos.php">Demos</a><a
					href="documentation.php">Documentation</a><a href="signup.php">Sign
					Up</a><a href="login.php">login</a> <span class="smm_connect">Connect
					With Us<a href="http://twitter.com/narnoocom"><img
						style="margin-left: 10px; margin-right: 10px"
						src="images/public_twitter.gif" width="20" height="20"
						alt="twitter"></a>
					<div id="___plusone_0"
						style="height: 15px; width: 24px; display: inline-block; text-indent: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; background-position: initial initial; background-repeat: initial initial;">
						<iframe allowtransparency="true" frameborder="0" hspace="0"
							id="I1_1333360189618" marginheight="0" marginwidth="0"
							name="I1_1333360189618" scrolling="no"
							src="https://plusone.google.com/_/+1/fastbutton?url=http%3A%2F%2Fwww.narnoo.com%2F&amp;size=small&amp;count=false&amp;hl=en-US&amp;jsh=m%3B%2F_%2Fapps-static%2F_%2Fjs%2Fgapi%2F__features__%2Frt%3Dj%2Fver%3DcXz1lRfcpG4.en.%2Fsv%3D1%2Fam%3D!Ze6NnRS0VYCICGRMrA%2Fd%3D1#id=I1_1333360189618&amp;parent=http%3A%2F%2Fnarnoo.com&amp;rpctoken=224409076&amp;_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart"
							style="position: absolute; left: -10000px; top: -10000px; width: 24px; margin: 0px; border-style: none"
							tabindex="0" vspace="0" width="100%" title="+1"></iframe>
					</div>
				</span>
			</div>
		</div>
	</div>

	<!-- Header Contents -->
	<div id="headerBox">
		<div id="headerContainer">
			<table height="80" width="950">
				<tbody>
					<tr>
						<td width="576" height="80"><a href="index.php"><img
								src="images/logo-header.jpg" width="220" height="61"
								alt="Narnoo.com Logo"></a></td>
						<td width="220"><a href="hosting.php"><img
								src="images/index_hosting.gif" width="220" height="61"
								alt="Hosting"></a></td>
						<td width="138" align="right"><a
							href="http://helpdesk.narnoo.com/" target="_blank"><img
								src="images/index_help.gif" width="131" height="61"
								alt="Help Desk"></a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>



	<!-- Main Contents -->
	<div id="contentBox">
		<div id="contentContainer">
			<table width="950" class="layout-grid">
				<tbody>

					<tr>
						<td class="left-nav">
							<dl class="demos-nav">
								<dt>Distributor->Operator</dt>
								<dd>
									<a href="demos/distributor/addOperator.php">addOperator</a>
								</dd>
								<dd>
									<a href="demos/distributor/deleteOperator.php">deleteOperator</a>
								</dd>
								<dd>
									<a href="demos/distributor/listOperators.php">listOperators</a>
								</dd>
								<dd>
									<a href="demos/distributor/singleOperatorDetail.php">singleOperatorDetail</a>
								</dd>
								<dd>
									<a href="demos/distributor/searchOperators.php">searchOperators</a>
								</dd>
								<dt>Distributor’s Own Media</dt>
								<dd>
									<a href="demos/distributor-media/getImages.php">getImages</a>
								</dd>
								<dd>
									<a href="demos/distributor-media/getAlbums.php">getAlbums</a>
								</dd>
								<dd>
									<a href="demos/distributor-media/getAlbumImages.php">getAlbumImages</a>
								</dd>
								<dd>
									<a href="demos/distributor-media/getVideos.php">getVideos</a>
								</dd>
								<dd>
									<a href="demos/distributor-media/getVideoDetails.php">getVideoDetails</a>
								</dd>
								<dd>
									<a href="demos/distributor-media/getBrochures.php">getBrochures</a>
								</dd>
								<dd>
									<a href="demos/distributor-media/getSingleBrochure.php">getSingleBrochure</a>
								</dd>
								<dd>
									<a href="demos/distributor-media/getChannel.php">getChannel</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/getChannelVideos.php">getChannelVideos</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/searchMedia.php">searchMedia</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/downloadImage.php">downloadImage</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/downloadVideo.php">downloadVideo</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/downloadBrochure.php">downloadBrochure</a>
								</dd>




								<dt>Distributors->Operator Media</dt>
								<dd>
									<a href="demos/distributor-operator/getImages.php">getImages</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator/getAlbums.php">getAlbums</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator/getAlbumImages.php">getAlbumImages</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator/getVideos.php">getVideos</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator/getVideoDetails.php">getVideoDetails</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator/getBrochures.php">getBrochures</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator/getSingleBrochure.php">getSingleBrochure</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator/getProducts.php">getProducts</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator/getProductDescription.php">getProductDescription</a>
								</dd>

								<dd>
									<a href="demos/distributor-operator/downloadImage.php">downloadImage</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator/downloadVideo.php">downloadVideo</a>
								</dd>

								<dd>
									<a href="demos/distributor-operator/downloadBrochure.php">downloadBrochure</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator/searchMedia.php">searchMedia</a>
								</dd>

								<dt>Operator</dt>
								<dd>
									<a href="demos/operator/getImages.php">getImages</a>
								</dd>
								<dd>
									<a href="demos/operator/getAlbums.php">getAlbums</a>
								</dd>
								<dd>
									<a href="demos/operator/getAlbumImages.php">getAlbumImages</a>
								</dd>
								<dd>
									<a href="demos/operator/getVideos.php">getVideos</a>
								</dd>
								<dd>
									<a href="#demos/operator/getVideoDetails.php">getVideoDetails</a>
								</dd>
								<dd>
									<a href="demos/operator/getBrochures.php">getBrochures</a>
								</dd>
								<dd>
									<a href="demos/operator/getSingleBrochure.php">getSingleBrochure</a>
								</dd>
								<dd>
									<a href="demos/operator/getProducts.php">getProducts</a>
								</dd>
								<dd>
									<a href="demos/operator/getProductDescription.php">getProductDescription</a>
								</dd>
								<dd>
									<a href="demos/operator/downloadImage.php">downloadImage</a>
								</dd>
								<dd>
									<a href="demos/operator/downloadVideo.php">downloadVideo</a>
								</dd>
								<dd>
									<a href="demos/operator/downloadBrochure.php">downloadBrochure</a>
								</dd>

							</dl>
						</td>
						<td class="normal"><iframe id="code-container" src="" style="border: 0;width: 100%;height: 100%;"></iframe></td>

					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Footer Contents -->
	<div id="footerBox">
		<div id="footerContainer">
			<table width="950">
				<div id="title" style="margin-top: 15px">Narnoo Icons</div>
				<div style="margin-top: 15px">
					<img src="icons/icon-128.png" width="124" height="124" alt="icon"><img
						src="icons/icon-96.png" width="96" height="96" alt="icon"><img
							src="icons/icon-72.png" width="72" height="72" alt="icon"><img
								src="icons/icon-64.png" width="64" height="64" alt="icon"><img
									src="icons/icon-48.png" width="48" height="48" alt="icon"><img
										src="icons/icon-32.png" width="32" height="32" alt="icon"><img
											src="icons/icon-24.png" width="24" height="24" alt="icon"><img
												src="icons/icon-16.png" width="16" height="16" alt="icon">
				
				</div>
			</table>
		</div>
	</div>


</body>
</html>




