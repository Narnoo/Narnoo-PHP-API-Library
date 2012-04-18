<?php

// require_once ('narnoo/class-narnoo-request.php');

class DistributorMediaNarnooRequest extends NarnooRequest {
	
	var $remote_url = "devapi.narnoo.com/dist_xml.php"; // Distributor ->
	                                                    // Operator Interaction
	                                                    // var $remote_url =
	                                                    // "devapi.narnoo.com/xml.php";
	                                                    // // Distributor ->
	                                                    // Operator
	                                                    // Interaction
	/*
	 * Distributor's Own Media Requests
	 */
	
	function getImages() {
		return $this->getResponse ( $this->remote_url, 'getImages', null );
	}
	
	function getAlbums() {
		return $this->getResponse ( $this->remote_url, 'getAlbums', null );
	}
	
	/**
	 * get images of an album
	 *
	 * @param $album_id string       	
	 * @return array
	 */
	function getAlbumImages($album_name) {
		return $this->getResponse ( $this->remote_url, 'getAlbumImages', array ('album__name' => $album_name ) );
	}
	
	/**
	 * get your all videos information
	 *
	 * @return array
	 */
	function getVideos() {
		return $this->getResponse ( $this->remote_url, 'getVideos', null );
	}
	
	/**
	 * get detail information of the video
	 *
	 * @param $video_id string       	
	 * @return object
	 */
	function getVideoDetails($video_id) {
		return $this->getResponse ( $this->remote_url, 'getVideoDetails', array ('video__id' => $video_id ) );
	}
	
	/**
	 * get your all brochures
	 *
	 * @return array
	 */
	function getBrochures() {
		return $this->getResponse ( $this->remote_url, 'getBrochures', null );
	}
	
	function getSingleBrochure($brochure_id) {
		return $this->getResponse ( $this->remote_url, 'getSingleBrochure', array ('brochure__id' => $brochure_id ) );
	}
	
	function getChannelList() {
		return $this->getResponse ( $this->remote_url, 'getChannelList', null );
	}
	
	function getChannelVideos($channel) {
		return $this->getResponse ( $this->remote_url, "getChannelVideos", array ("channel" => $channel ) );
	}
	
	/*
	 * Distributor's Own Media Download Requst
	 */
	function searchMedia($media_type, $category, $subcategory, $suburb, $location, $latitude, $longitude, $keywords,$page_no) {
		$params = array ();
		
		if (is_null ( $media_type ) || empty ( $media_type )) {
			$media_type = "image";
		}
		
		$params = array_merge ( $params, array ("media_type" => $media_type ) );
		
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
		
		if (is_null ( $keywords ) == false && empty ( $keywords ) == false) {
			$params = array_merge ( $params, array ("keywords" => $keywords ) );
		}
		
		if (is_null ( $page_no ) || empty ( $page_no )) {
			$page_no = 1;
		}
		$params = array_merge ( $params, array ("page_no" => $page_no ) );
		
		// if (count ( $params ) < 2) {
		//
		// $message = new NarrooException();
		// $message->Error = "Minimum of one search criteria needs to be passed
		// across all possible criteria." ;
		//
		// return $message;
		// }
		
		return $this->getResponse ( "devapi.narnoo.com/xml.php", 'searchMedia', $params );
	}
	
	function downloadImage($image_id) {
		return $this->getResponse ( $this->remote_url, 'downloadImage', array ("media_id" => $image_id ) );
	}
	
	function downloadVideo($video_id) {
		return $this->getResponse ( $this->remote_url, 'downloadVideo', array ("video__id" => $video_id ) );
	}
	
	function downloadBrochure($brochure_id) {
		return $this->getResponse ( $this->remote_url, 'downloadBrochure', array ("brochure__id" => $brochure_id ) );
	}
}

?>