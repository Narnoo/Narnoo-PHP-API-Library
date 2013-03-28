<?php

// require_once ('narnoo/class-narnoo-request.php');

class DistributorMediaNarnooRequest extends NarnooRequest {
	
	/*
	 * Distributor's Own Media Requests
	 */
	
	function getImages($page_no = 1) {
		return $this->getResponse ( $this->getDistXmlApi (), 'getImages', array ('page_no' => $page_no ) );
	}
	
	function getAlbums($page_no = 1) {
		return $this->getResponse ( $this->getDistXmlApi (), 'getAlbums', array ('page_no' => $page_no ) );
	}
	
	/**
	 * get images of an album
	 *
	 * @param $album_id string       	
	 * @return array
	 */
	function getAlbumImages($album_name, $page_no = 1) {
		return $this->getResponse ( $this->getDistXmlApi (), 'getAlbumImages', array ('album_name' => $album_name, 'page_no' => $page_no ) );
	}
	
	/**
	 * get your all videos information
	 *
	 * @return array
	 */
	function getVideos($page_no = 1) {
		return $this->getResponse ( $this->getDistXmlApi (), 'getVideos', array ('page_no' => $page_no ) );
	}
	
	/**
	 * get detail information of the video
	 *
	 * @param $video_id string       	
	 * @return object
	 */
	function getVideoDetails($video_id) {
		return $this->getResponse ( $this->getDistXmlApi (), 'getVideoDetails', array ('video_id' => $video_id ) );
	}
	
	/**
	 * get your all brochures
	 *
	 * @return array
	 */
	function getBrochures($page_no = 1) {
		return $this->getResponse ( $this->getDistXmlApi (), 'getBrochures', array ('page_no' => $page_no ) );
	}
	
	function getSingleBrochure($brochure_id) {
		return $this->getResponse ( $this->getDistXmlApi (), 'getSingleBrochure', array ('brochure_id' => $brochure_id ) );
	}
	
	function getChannelList($page_no = 1) {
		return $this->getResponse ( $this->getDistXmlApi (), 'getChannelList', array ('page_no' => $page_no ) );
	}
	
	function getChannelVideos($channel_name,$page_no = 1) {
		return $this->getResponse ( $this->getDistXmlApi (), "getChannelVideos", array ("channel" => $channel_name,'page_no' => $page_no ) );
	}
	
	/*
	 * Distributor's Own Media Download Requst
	 */
	function searchMedia($media_type, $media_id, $category, $subcategory, $suburb, $location, $latitude, $longitude, $radius, $privilege, $keywords, $page_no=1) {
		$params = array ();
		
		if (is_null ( $media_type ) || empty ( $media_type )) {
			$media_type = "image";
		}
		
		$params = array_merge ( $params, array ("media_type" => $media_type ) );
		
		if (is_null ( $media_id ) == false && empty ( $media_id ) == false) {
			$params = array_merge ( $params, array ("media_id" => $media_id ) );
		} else {
			
			if (is_null ( $category ) == false && empty ( $category ) == false) {
				$params = array_merge ( $params, array ("category" => $category ) );
			}
			
			if (is_null ( $subcategory ) == false && empty ( $subcategory ) == false) {
				$params = array_merge ( $params, array ("subcategory" => $subcategory ) );
			}
			
			if (is_null ( $suburb ) == false && empty ( $suburb ) == false) {
				$params = array_merge ( $params, array ("suburb" => $suburb ) );
			}
			
			if (is_null ( $location ) == false && empty ( $location ) == false) {
				$params = array_merge ( $params, array ("location" => $location ) );
			}
			
			if (is_null ( $latitude ) == false && empty ( $latitude ) == false) {
				$params = array_merge ( $params, array ("latitude" => $latitude ) );
			}
			
			if (is_null ( $longitude ) == false && empty ( $longitude ) == false) {
				$params = array_merge ( $params, array ("longitude" => $longitude ) );
			}
			
			if (is_null ( $longitude ) == false && empty ( $longitude ) == false) {
				$params = array_merge ( $params, array ("longitude" => $longitude ) );
			}
			
			if (is_null ( $radius ) == false && empty ( $radius ) == false) {
				$params = array_merge ( $params, array ("radius" => $radius ) );
			}
			
			if (is_null ( $privilege ) == false && empty ( $privilege ) == false) {
				$params = array_merge ( $params, array ("privilege" => $privilege ) );
			}
			
			if (is_null ( $keywords ) == false && empty ( $keywords ) == false) {
				$params = array_merge ( $params, array ("keywords" => $keywords ) );
			}
		
		}
		
		if (is_null ( $page_no ) || empty ( $page_no )) {
			$page_no = 1;
		}
		$params = array_merge ( $params, array ("page_no" => $page_no ) );
		
		// if (count ( $params ) < 2) {
		//
		// $message = new NarrooException();
		// $message->error = "Minimum of one search criteria needs to be passed
		// across all possible criteria." ;
		//
		// return $message;
		// }
		
		return $this->getResponse ( $this->getDistXmlApi (), 'searchMedia', $params );
	}
	
	function downloadImage($image_id) {
		return $this->getResponse ( $this->getDistXmlApi (), 'downloadImage', array ("image_id" => $image_id ) );
	}
	
	function downloadVideo($video_id) {
		return $this->getResponse ( $this->getDistXmlApi (), 'downloadVideo', array ("video_id" => $video_id ) );
	}
	
	function downloadBrochure($brochure_id) {
		return $this->getResponse ( $this->getDistXmlApi (), 'downloadBrochure', array ("brochure_id" => $brochure_id ) );
	}
	
	function deleteImage($image_id) {
		return $this->getResponse ( $this->getDistXmlApi (), 'deleteImage', array ("image_id" => $image_id ) );
	}
	
	function deleteBrochure($brochure_id) {
		return $this->getResponse ( $this->getDistXmlApi (), 'deleteBrochure', array ("brochure_id" => $brochure_id ) );
	}
	
	function deleteVideo($video_id) {
		return $this->getResponse ( $this->getDistXmlApi (), 'deleteVideo', array ("video_id" => $video_id ) );
	}
	
	function createAlbum($album_name) {
		return $this->getResponse ( $this->getDistXmlApi(), 'createAlbum', array ('album_name' => $album_name ) );
	}
	
	function addToAlbum($image_id, $album_id){
		return $this->getResponse ( $this->getDistXmlApi (), 'addToAlbum', array ('media_id' => $image_id ,'album_id'=>$album_id) );
	}
	
	function removeFromAlbum( $image_id, $album_id){
		return $this->getResponse ( $this->getDistXmlApi (), 'removeFromAlbum', array ('media_id' => $image_id ,'album_id'=>$album_id) );
	}

	
	function createChannel($channel_name){
		return $this->getResponse ( $this->getDistXmlApi (), 'createChannel', array ('channel' => $channel_name ) );
	}
	
	function addToChannel($video_id, $channel_id){
		return $this->getResponse ( $this->getDistXmlApi (), 'addToChannel', array ('video_id' => $video_id,'channel_id'=>$channel_id ) );
	}
	
	function removeFromChannel($video_id, $channel_id){
		return $this->getResponse ( $this->getDistXmlApi (), 'removeFromChannel', array ('video_id' => $video_id,'channel_id'=>$channel_id ) );
	}
	
	/**
	 * This function allows the distributor to create a download link for the high resolution version of an image.
	 * @param image_id 
	 * @return object
	* 	 expiry_date
	*    download_link
	 */
	function sendImage($image_id){
		return $this->getResponse($this->getDistXmlApi(),'sendImage',array('media_id'=>$image_id));
	}
	
	/**
	 * This function allows the distributor to create a download link for the high resolution version of a video.
	 * @param video_id
	 * @return object
	* 	 expiry_date
	*    download_link
	 */
	function sendVideo($video_id){
		return $this->getResponse($this->getDistXmlApi(),'sendVideo',array('video_id'=>$video_id));
	}
	
	/**
	 *This function allows the distributor to create a download link for an brochure.
	* @param video_id
	* @return object
	* 	 expiry_date
	*    download_link
	*/
	function sendBrochure($brochure_id){
		return $this->getResponse($this->getDistXmlApi(),'sendBrochure',array('brochure_id'=>$brochure_id));
	}
}

?>