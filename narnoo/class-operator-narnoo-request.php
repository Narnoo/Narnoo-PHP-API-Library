<?php

class OperatorNarnooRequest extends NarnooRequest {
	
	/**
	 * get your all image information
	 *
	 * @return array
	 */
	function getImages($page_no = 1) {
		return $this->getResponse ( $this->getOpXmlApi (), 'getImages', array ('page_no' => $page_no ) );
	}
	
	/**
	 * get your all albums
	 *
	 * @return array
	 */
	function getAlbums($page_no = 1) {
		return $this->getResponse ( $this->getOpXmlApi (), 'getAlbums', array ('page_no' => $page_no ) );
	}
	
	/**
	 * get images of an album
	 *
	 * @param $album_id string       	
	 * @return array
	 */
	function getAlbumImages($album_name, $page_no = 1) {
		return $this->getResponse ( $this->getOpXmlApi (), 'getAlbumImages', array ('album_name' => $album_name, 'page_no' => $page_no ) );
	}
	
	/**
	 * get your all videos information
	 *
	 * @return array
	 */
	function getVideos($page_no = 1) {
		return $this->getResponse ( $this->getOpXmlApi (), 'getVideos', array ('page_no' => $page_no ) );
	}
	
	/**
	 * get detail information of the video
	 *
	 * @param $video_id string       	
	 * @return object
	 */
	function getVideoDetails($video_id) {
		return $this->getResponse ( $this->getOpXmlApi (), 'getVideoDetails', array ('video_id' => $video_id ) );
	}
	
	/**
	 * get your all brochures
	 *
	 * @return array
	 */
	function getBrochures($page_no = 1) {
		return $this->getResponse ( $this->getOpXmlApi (), 'getBrochures', array ('page_no' => $page_no ) );
	}
	
	function getSingleBrochure($brochure_id) {
		return $this->getResponse ( $this->getOpXmlApi (), 'getSingleBrochure', array ('brochure_id' => $brochure_id ) );
	}
	
	function searchMedia($media_type, $business_name, $country, $state, $category, $subcategory, $suburb, $location, $postal_code, $latitude, $longitude, $keywords) {
		
		$params = array ();
		
		if (is_null ( $media_type ) || empty ( $media_type )) {
			$media_type = "image";
		}
		
		$params = array_merge ( $params, array ("media_type" => $media_type ) );
		
		if (is_null ( $country ) == false && empty ( $country ) == false) {
			$params = array_merge ( $params, array ("country" => $country ) );
		}
		
		if (is_null ( $state ) == false && empty ( $state ) == false) {
			$params = array_merge ( $params, array ("state" => $state ) );
		}
		
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
		
		if (is_null ( $postal_code ) == false && empty ( $postal_code ) == false) {
			$params = array_merge ( $params, array ("postal_code" => $postal_code ) );
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
		
		// if (count ( $params ) < 2) {
		//
		// $message = new NarrooException();
		// $message->error = "Minimum of one search criteria needs to be passed
		// across all possible criteria." ;
		//
		// return $message;
		// }
		
		return $this->getResponse ( $this->getOpXmlApi (), 'searchMedia', $params );
	}
	
	function downloadImage($image_id) {
		return $this->getResponse ( $this->getOpXmlApi (), 'downloadImage', array ("image_id" => $image_id ) );
	}
	
	function downloadVideo($video_id) {
		return $this->getResponse ( $this->getOpXmlApi (), 'downloadVideo', array ("video_id" => $video_id ) );
	}
	
	function downloadBrochure($brochure_id) {
		return $this->getResponse ( $this->getOpXmlApi (), 'downloadBrochure', array ("brochure_id" => $brochure_id ) );
	}
	
	function getProductText() {
		return $this->getResponse ( $this->getOpXmlApi (), 'getProductText', null );
	}
	
	function getProductTextWords($product_title) {
		return $this->getResponse ( $this->getOpXmlApi (), 'getProductTextWords', array ("product_title" => $product_title ) );
	}
	
	function deleteBrochure($brochure_id) {
		return $this->getResponse ( $this->getOpXmlApi (), 'deleteBrochure', array ("brochure_id" => $brochure_id ) );
	}
	
	function deleteImage($image_id) {
		return $this->getResponse ( $this->getOpXmlApi (), 'deleteImage', array ("image_id" => $image_id ) );
	}
	
	function deleteVideo($video_id) {
		return $this->getResponse ( $this->getOpXmlApi (), 'deleteVideo', array ("video_id" => $video_id ) );
	}
	
	function getDistributors($page_no = 1) {
		return $this->getResponse ( $this->getOpXmlApi (), 'getDistributors', array ('page_no' => $page_no ) );
	}
	
	/*
	 * <success> <successCode>success 200</successCode> <successMessage>
	 * Congratulations! Album Has Created Successfully !!!. </successMessage>
	 * </success>
	 */
	function createAlbum($album_name) {
		return $this->getResponse ( $this->getOpXmlApi (), 'createAlbum', array ('album_name' => $album_name ) );
	}
	
	function getDetails() {
		return $this->getResponse ( $this->getOpXmlApi (), 'getDetails', null );
	}

	function addToAlbum($image_id, $album_id){
		return $this->getResponse ( $this->getOpXmlApi (), 'addToAlbum', array ('media_id' => $image_id ,'album_id'=>$album_id) );
	}
	
	function removeFromAlbum( $image_id, $album_id){
		return $this->getResponse ( $this->getOpXmlApi (), 'removeFromAlbum', array ('media_id' => $image_id ,'album_id'=>$album_id) );
	}
	
	
	/**
	 * This function allows the operator to create a download link for the high resolution version of an image.
	 * @param image_id
	 * @return object
	 * 	 expiry_date
	 *    download_link
	 */
	function sendImage($image_id){
		return $this->getResponse($this->getOpXmlApi(),'sendImage',array('media_id'=>$image_id));
	}
	
	/**
	 * This function allows the operator to create a download link for the high resolution version of a video.
	 * @param video_id
	 * @return object
	 * 	 expiry_date
	 *    download_link
	 */
	function sendVideo($video_id){
		return $this->getResponse($this->getOpXmlApi(),'sendVideo',array('video_id'=>$video_id));
	}
	
	/**
	 *This function allows the operator to create a download link for an brochure.
	 * @param video_id
	 * @return object
	 * 	 expiry_date
	 *    download_link
	 */
	function sendBrochure($brochure_id){
		return $this->getResponse($this->getOpXmlApi(),'sendBrochure',array('brochure_id'=>$brochure_id));
	}
}

?>