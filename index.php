
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Narnoo.com - Tourism Media Networking Platform</title>
<link href="css/public-style.css" rel="stylesheet" type="text/css" />
<link href="css/demo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.normal {
	height: 100%;
	width: auto;
}

.normal div,.normal iframe {
	margin: 0;
	padding: 0;
	height: 100%;
}

.normal iframe {
	display: block;
	width: 100%;
	border: 0;
}
</style>

<script type="text/javascript"
	src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
$(function(){

	$('.demos-nav dt').click(function(e){
		$(this).toggleClass('collapse');

		if($(this).is('.collapse')){
			$(this).nextUntil('dt').hide();
		}else{
			$(this).nextUntil('dt').show();
		}
	});

	
	$('dd a').click(function(e){
		e.preventDefault();	
		$('#code-container').attr('src',$(this).attr('href')+'?r='+Math.random());
	
	});

	function setHeight(){
			$('iframe').height($('.normal').height());
	}	

	//if($.browser.msie){
		$(window).resize(function(){
			setHeight();
		});
	
		setHeight();
	//}
});
</script>

</head>
<body marginwidth="0" marginheight="0">

	<!-- Header Nav Contents -->
	<!-- Header Contents -->
	<div id="headerBox">
		<div id="headerContainer">
			<table height="80" width="950">
				<tbody>
					<tr>
						<td width="576" height="80"><a href="index.php"><img
								src="images/logo-header.jpg" width="220" height="61"
								alt="Narnoo.com Logo"></a></td>
						<td width="220">&nbsp;</td>
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
			<table width="950" class="layout-grid" style="height: 100%;"
				border="0" cellspacing="0" cellpadding="0">
				<tbody>

					<tr>
						<td class="left-nav">
							<dl class="demos-nav">
								<dt>Distributor</dt>
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
								<dd>
									<a href="demos/distributor/getDetails.php">getDetails</a>
								</dd>

								<dt>Distributor's Own Media</dt>
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
									<a href="demos/distributor-media/getChannelList.php">getChannelList</a>
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


								<dd>
									<a href="demos/distributor-media/deleteBrochure.php">deleteBrochure</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/deleteImage.php">deleteImage</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/deleteVideo.php">deleteVideo</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/createAlbum.php">createAlbum</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/addToAlbum.php">addToAlbum</a>
								</dd>
								<dd>
									<a href="demos/distributor-media/removeFromAlbum.php">removeFromAlbum</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/createChannel.php">createChannel</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/addToChannel.php">addToChannel</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/removeFromChannel.php">removeFromChannel</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/sendImage.php">sendImage</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/sendVideo.php">sendVideo</a>
								</dd>

								<dd>
									<a href="demos/distributor-media/sendBrochure.php">sendBrochure</a>
								</dd>

								<dt>Distributors->Operator Media</dt>
								<dd>
									<a href="demos/distributor-operator-media/getImages.php">getImages</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator-media/getAlbums.php">getAlbums</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator-media/getAlbumImages.php">getAlbumImages</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator-media/getVideos.php">getVideos</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator-media/getVideoDetails.php">getVideoDetails</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator-media/getBrochures.php">getBrochures</a>
								</dd>
								<dd>
									<a
										href="demos/distributor-operator-media/getSingleBrochure.php">getSingleBrochure</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator-media/getProductText.php">getProductText</a>
								</dd>
								<dd>
									<a
										href="demos/distributor-operator-media/getProductTextWords.php">getProductTextWords</a>
								</dd>

								<dd>
									<a href="demos/distributor-operator-media/downloadImage.php">downloadImage</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator-media/downloadVideo.php">downloadVideo</a>
								</dd>

								<dd>
									<a href="demos/distributor-operator-media/downloadBrochure.php">downloadBrochure</a>
								</dd>
								<dd>
									<a href="demos/distributor-operator-media/searchMedia.php">searchMedia</a>
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
									<a href="demos/operator/getVideoDetails.php">getVideoDetails</a>
								</dd>
								<dd>
									<a href="demos/operator/getBrochures.php">getBrochures</a>
								</dd>
								<dd>
									<a href="demos/operator/getSingleBrochure.php">getSingleBrochure</a>
								</dd>
								<dd>
									<a href="demos/operator/getProductText.php">getProductText</a>
								</dd>
								<dd>
									<a href="demos/operator/getProductTextWords.php">getProductTextWords</a>
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

								<dd>
									<a href="demos/operator/deleteBrochure.php">deleteBrochure</a>
								</dd>

								<dd>
									<a href="demos/operator/deleteImage.php">deleteImage</a>
								</dd>

								<dd>
									<a href="demos/operator/deleteVideo.php">deleteVideo</a>
								</dd>
								<dd>
									<a href="demos/operator/getDistributors.php">getDistributors</a>
								</dd>
								<dd>
									<a href="demos/operator/createAlbum.php">createAlbum</a>
								</dd>
								<dd>
									<a href="demos/operator/getDetails.php">getDetails</a>
								</dd>
								<dd>
									<a href="demos/operator/addToAlbum.php">addToAlbum</a>
								</dd>
								<dd>
									<a href="demos/operator/removeFromAlbum.php">removeFromAlbum</a>
								</dd>

								<dd>
									<a href="demos/operator/sendImage.php">sendImage</a>
								</dd>

								<dd>
									<a href="demos/operator/sendVideo.php">sendVideo</a>
								</dd>

								<dd>
									<a href="demos/operator/sendBrochure.php">sendBrochure</a>
								</dd>
							</dl>
						</td>
						<td class="normal"><iframe id="code-container" src=""
								marginheight="0" marginwidth="0" frameborder="0"></iframe></td>

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




