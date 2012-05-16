<?php
$response_type =  (trim($_GET['response_type'])!='') ? trim($_GET['response_type']) : "xml"; // xml OR json
if(strtolower($response_type)=="xml"){
header ('Content-type: text/xml; charset=UTF-8');
} else if(strtolower($response_type)=="json" OR strtolower($response_type)=="jsonp") {
header('Content-type: text/json');
header('Content-type: application/json');
}

$app_key = "1336471851155";
$secret_key = "be96a6462b3bda7f36831afb4888c75e675cdfa3";
// action may be  (addOperator or deleteOperator or listOperators or searchOperators(Country/category/subcategory/state/suburb/zip) or searchMedia(media_id) or singleOperatorDetail or getImages or downloadImage(based on op_id,based on image id) or getAlbums or getAlbumImages(based on album_name) or getBrochures or getSingleBrochure(based on brochure_id) or downloadBrochure(based on op_id,based on brochure_id) or getVideos or getVideoDetails(based on video_id) or downloadVideo(based on op_id,based on video_id) or getProductText or getProductTextWords or getProductDescription(based on product_title) )
$action =  (trim($_GET['action'])!='') ? trim($_GET['action']) : "addOperator";
// if you left blank album name then all images of all album will be listed when you use getAlbumImages action
$page_no =  ($_GET['page_no']!='') ? $_GET['page_no'] : 1;
$album__name =  (trim($_GET['album'])!='') ? trim($_GET['album']) : "";
$operator_id =  ($_GET['op_id']!='') ? $_GET['op_id'] : 0;
$brochure__id =  ($_GET['brochure_id']!='') ? $_GET['brochure_id'] : 0;
$video__id =  ($_GET['video_id']!='') ? $_GET['video_id'] : 0;
$product__title =  ($_GET['product_title']!='') ? $_GET['product_title'] : "";
// search fields
if($_GET['media_id']!='')
 $media_id = $_GET['media_id'];
 else if($_GET['image_id']!='')
 $media_id = $_GET['image_id'];
 else
 $media_id = 0;

$country =  ($_GET['country']!='') ? $_GET['country'] : "";
$media_type =  ($_GET['media_type']!='') ? $_GET['media_type'] : "";
$category =  ($_GET['category']!='') ? $_GET['category'] : "";
$subcategory =  ($_GET['subcategory']!='') ? $_GET['subcategory'] : "";
$state =  ($_GET['state']!='') ? $_GET['state'] : "";
$suburb =  ($_GET['suburb']!='') ? $_GET['suburb'] : "";
$location =  ($_GET['location']!='') ? $_GET['location'] : "";
$postal_code =  ($_GET['postal_code']!='') ? $_GET['postal_code'] : "";
$latitude =  ($_GET['latitude']!='') ? $_GET['latitude'] : "";
$longitude =  ($_GET['longitude']!='') ? $_GET['longitude'] : "";
$keywords =  ($_GET['keywords']!='') ? $_GET['keywords'] : "";
$business_name =  ($_GET['business_name']!='') ? $_GET['business_name'] : "";
$data = array('app_key' => $app_key, 'secret_key' => $secret_key, 'response_type' => $response_type, 'action' => $action, 'album_name' => $album__name, 'brochure_id' => $brochure__id, 'video_id' => $video__id, 'media_id' =>$media_id, 'media_type' => $media_type, 'product_title' => $product__title, 'operator_id' => $operator_id, 'country' => $country, 'category' => $category, 'subcategory' => $subcategory, 'state' => $state, 'suburb' => $suburb, 'location' => $location, 'postal_code' => $postal_code, 'latitude' => $latitude, 'longitude' => $longitude, 'keywords' => $keywords, 'business_name' => $business_name, 'page_no' => $page_no);
if ($_SERVER['HTTPS'] == "on") {
$xmlUrl = 'https://api.narnoo.com/xml.php'; // XML feed file/URL
} else {
$xmlUrl = 'http://api.narnoo.com/xml.php'; // XML feed file/URL
}

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