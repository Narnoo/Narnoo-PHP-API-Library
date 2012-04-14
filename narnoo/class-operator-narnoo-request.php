<?php


class OperatorNarnooRequest extends NarnooRequest{
	var $remote_url = "devapi.narnoo.com/op_xml.php";//Operator's own account 
	
	
	function getImages(){
		return $this->getResponse($this->remote_url, 'getImages',null);
	}
	
	function getAlbums(){
		
	}
	
	function getAlbumImages($album_name){
		
	}
	
	function getVideos(){
		
	}
	
	function getVideoDetails($video_id){
		
	}
	
	function getBrochures(){
		
	}
	
	function getSingleBrochure($brochure_id){
		
	}
	
	function getProducts(){
		
	}
	
	function getProductDescription($product_title){
		
	}
	
	function downloadImage($operator_id,$image_id){
		
	}
	
	function downloadVideo($operator_id,$video_id){
		
	}
	
	function dlownloadBrochure($operator_id,$brochure_id){
		
	}
	
}

?>