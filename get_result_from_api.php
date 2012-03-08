<?php
$response_type =  (trim($_GET['response_type'])!='') ? trim($_GET['response_type']) : "xml"; // xml OR json
if(strtolower($response_type)=="xml"){
header ('Content-type: text/xml; charset=UTF-8');
} else if(strtolower($response_type)=="json" OR strtolower($response_type)=="jsonp") {
header('Content-type: text/json');
header('Content-type: application/json');
}

$app_key = "1000000002";
$secret_key = "8d75f2d29d40296867d12ae65f685fc81c6b5d0a";
// action may be  (addOperator or deleteOperator or showAllOperator or singleOperatorDetail or getImages or getAlbums or getAlbumImages(based on album_name) or getBrochures or getSingleBrochure(based on brochure_id) or getVideos or getVideoDetails(based on video_id) or getProducts or getProductDescription(based on product_title) )
$action =  (trim($_GET['action'])!='') ? trim($_GET['action']) : "addOperator";
// if you left blank album name then all images of all album will be listed when you use getAlbumImages action
$page_no =  ($_GET['page_no']!='') ? $_GET['page_no'] : 1;
$album__name =  (trim($_GET['album'])!='') ? trim($_GET['album']) : "";
$operator_id =  ($_GET['op_id']!='') ? $_GET['op_id'] : 0;
$brochure__id =  ($_GET['brochure_id']!='') ? $_GET['brochure_id'] : 0;
$video__id =  ($_GET['video_id']!='') ? $_GET['video_id'] : 0;
$product__title =  ($_GET['product_title']!='') ? $_GET['product_title'] : "";
$data = array('app_key' => $app_key, 'secret_key' => $secret_key, 'response_type' => $response_type, 'action' => $action, 'album__name' => $album__name, 'brochure__id' => $brochure__id, 'video__id' => $video__id, 'product__title' => $product__title, 'operator_id' => $operator_id, 'page_no' => $page_no);
$xmlUrl = 'http://devapi.narnoo.com/xml.php'; // XML feed file/URL
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_HTTPGET, 0);
//curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FAILONERROR, 0);
// curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_URL, $xmlUrl);
$returned = curl_exec($ch);
curl_close ($ch);
?>