<?php
namespace narnoo;

require_once ('narnoo/class-narnoo-request.php');

class DistributorMediaNarnooRequest extends NarnooRequest {
	/* Distributor's Own Media Requests*/
	
	
	
	/**
	 * get your all image information
	 *
	 * @return array
	 */
	function getImages($operator_id) {
		return $this->getResponse ($this->interaction_url,  'getImages', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get your all albums
	 *
	 * @return array
	 */
	function getAlbums($operator_id) {
		return $this->getResponse ($this->interaction_url,  'getAlbums', array ('operator_id' => $operator_id ) );
	}
	
	
	/**
	 * get images of an album
	 *
	 * @param $album_id string
	 * @return array
	 */
	function getAlbumImages($operator_id, $album_name) {
		return $this->getResponse ($this->interaction_url,  'getAlbumImages', array ('operator_id' => $operator_id, 'albumName' => $album_name ) );
	}
	
	
	/**
	 * get your all videos information
	 *
	 * @return array
	 */
	function getVideos($operator_id) {
		return $this->getResponse ($this->interaction_url,  'getVideos', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get detail information of the video
	 *
	 * @param $video_id string
	 * @return object
	 */
	function getVideoDetails($operator_id, $video_id) {
		return $this->getResponse ($this->interaction_url,  'getVideoDetails', array ('operator_id' => $operator_id, 'video__id' => $video_id ) );
	}
	
	/**
	 * get your all brochures
	 *
	 * @return array
	 */
	function getBrochures($operator_id) {
		return $this->getResponse ($this->interaction_url,  'getBrochures', array ('operator_id' => $operator_id ) );
	}
	
	function getSingleBrochure($operator_id, $brochure_id) {
		return $this->getResponse ($this->interaction_url,  'getSingleBrochure', array ('operator_id' => $operator_id, 'brochure__id' => $brochure_id ) );
	}
	
	//TODO:Not test yet.
	function getChannel(){
	
	}
	
	//TODO:Not test yet.
	function getChannelVideos($channel_name){
	
	}
	
	/* Distributor's Own Media Download Requst */
	function searchMedia($category,$subcategory,$suburb,$location,$latitude,$longitude,$keywords){
		
	}
	
	function downloadImage($image_id){
		
	}
	
	function downloadVideo($video_id){
		
	}
	
	function dowloadBrochure($brochure_id){
		
	}
}

?>