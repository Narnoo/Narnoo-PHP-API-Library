<?php

//require_once ('narnoo/class-narnoo-request.php');

/**
 * The narnoo request methods for distributor
 *
 * @author dayi
 *        
 */
class DistributorNarnooRequest extends NarnooRequest {
	
	
	var $interaction_url = "devapi.narnoo.com/xml.php";//Distributor -> Operator Interaction
	var $dist_url = "devapi.narnoo.com/dist_xml.php";//Distributor's own account
	
	
	
	/* Distributor->Operator Management */
	
	
	
	/**
	 * add an operator in subscriber list
	 *
	 * @param $operator_id string       	
	 * @return boolean
	 */
	function addOperator($operator_id) {
		return $this->getResponse ($this->interaction_url, 'addOperator', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * remove the operator from your subscriber list
	 *
	 * @param $operator_id string       	
	 * @return boolean
	 */
	function deleteOperator($operator_id) {
		return $this->getResponse ($this->interaction_url,  'deleteOperator', array ('operator_id' => $operator_id ) );
	}
	
	//TODO: Not test yet
	function listOperators(){
		return $this->getResponse($this->interaction_url, 'listOperators');
	}
	
	//TODO: Not test yet
	function singleOperatorDetail($operator_id){
		return $this->getResponse($this->interaction_url, 'singleOperatorDetail', array ('operator_id' => $operator_id ));
	}
	
	//TODO: Not test yet
	/*
	 * find opertators by some criterias
	*
	*/
	function searchOperators($country,$category,$subcategory,$state,$suburb,$postal_code){
		$params = array();
		 
		if (is_null($country) == false || empty($country)  == false){
			$params = array_merge($params,array("country" => $country));
		}
		 
		if (is_null($category) == false || empty($category)  == false){
			$params = array_merge($params,array("category" => $category));
		}
		 
		if (is_null($subcategory) == false || empty($subcategory)  == false){
			$params = array_merge($params,array("subcategory" => $subcategory));
		}
		 
		if (is_null($state) == false || empty($state)  == false){
			$params = array_merge($params,array("state" => $state));
		}
		 
		if (is_null($suburb) == false || empty($suburb)  == false){
			$params = array_merge($params,array("suburb" => $suburb));
		}
		 
		if (is_null($postal_code) == false || empty($postal_code)  == false){
			$params = array_merge($params,array("postal_code" => $postal_code));
		}
		 
		return $this->getResponse($this->interaction_url, "searchOperators", $params);
	
	}
	
	
	
	
	/**
	 * get your all products
	 *
	 * @return array
	 */
	function getProducts($operator_id) {
		return $this->getResponse ($this->interaction_url,  'getProducts', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get descriptions of the product
	 *
	 * @param $product_id string       	
	 * @return object
	 */
	function getProductDescription($operator_id, $product_title) {
		return $this->getResponse ($this->interaction_url,  'getProductDescription', array ('operator_id' => $operator_id, 'product_title' => $product_title ) );
	}
	
	
	
	/**
	 * 
	 * 
	 * 
	 */
	 //function getImages(){
	 //	
	// }
}

?>