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
// action may be  (listOperators or listDetails or searchMedia(media_id) or getImages or downloadImage(based on dst_id,based on image id) or getAlbums or getAlbumImages(based on album_name) or getBrochures or getSingleBrochure(based on brochure_id) or downloadBrochure(based on dst_id,based on brochure_id) or getVideos or getVideoDetails(based on video_id) or downloadVideo(based on dst_id,based on video_id)
$action =  (trim($_GET['action'])!='') ? trim($_GET['action']) : "listDetails";
// if you left blank album name then all images of all album will be listed when you use getAlbumImages action
$page_no =  ($_GET['page_no']!='') ? $_GET['page_no'] : 1;
$album__name =  (trim($_GET['album'])!='') ? trim($_GET['album']) : "";
$operator_id =  ($_GET['op_id']!='') ? $_GET['op_id'] : 0;
$brochure__id =  ($_GET['brochure_id']!='') ? $_GET['brochure_id'] : 0;
$video__id =  ($_GET['video_id']!='') ? $_GET['video_id'] : 0;
$product__title =  ($_GET['product_title']!='') ? $_GET['product_title'] : "";
if($_GET['media_id']!='')
 $media_id = $_GET['media_id'];
 else if($_GET['image_id']!='')
 $media_id = $_GET['image_id'];
 else
 $media_id = 0;

$media_type =  ($_GET['media_type']!='') ? $_GET['media_type'] : "";
$category =  ($_GET['category']!='') ? $_GET['category'] : "";
$subcategory =  ($_GET['subcategory']!='') ? $_GET['subcategory'] : "";
$location =  ($_GET['location']!='') ? $_GET['location'] : "";
$latitude =  ($_GET['latitude']!='') ? $_GET['latitude'] : "";
$longitude =  ($_GET['longitude']!='') ? $_GET['longitude'] : "";
$keywords =  ($_GET['keywords']!='') ? $_GET['keywords'] : "";

$data = array('app_key' => $app_key, 'secret_key' => $secret_key, 'response_type' => $response_type, 'action' => $action, 'album__name' => $album__name, 'brochure__id' => $brochure__id, 'video__id' => $video__id, 'media_id' =>$media_id, 'media_type' => $media_type, 'category' => $category, 'subcategory' => $subcategory, 'location' => $location, 'latitude' => $latitude, 'longitude' => $longitude, 'keywords' => $keywords, 'page_no' => $page_no);
if ($_SERVER['HTTPS'] == "on") {
$xmlUrl = 'https://devapi.narnoo.com/dist_xml.php'; // XML feed file/URL
} else {
$xmlUrl = 'http://devapi.narnoo.com/dist_xml.php'; // XML feed file/URL
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