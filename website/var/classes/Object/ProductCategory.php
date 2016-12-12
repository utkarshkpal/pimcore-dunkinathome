<?php 

/** 
* Generated at: 2016-11-21T07:47:41+01:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 192.168.8.25


Fields Summary: 
- name [input]
- description [wysiwyg]
- order [numeric]
- urlKeyword [input]
- allProducts [nonownerobjects]
- mainImage [image]
- backgroundImage [image]
*/ 

namespace Pimcore\Model\Object;



/**
* @method static \Pimcore\Model\Object\ProductCategory\Listing getByName ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\ProductCategory\Listing getByDescription ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\ProductCategory\Listing getByOrder ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\ProductCategory\Listing getByUrlKeyword ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\ProductCategory\Listing getByMainImage ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\ProductCategory\Listing getByBackgroundImage ($value, $limit = 0) 
*/

class ProductCategory extends Concrete {

public $o_classId = 2;
public $o_className = "ProductCategory";
public $name;
public $description;
public $order;
public $urlKeyword;
public $mainImage;
public $backgroundImage;


/**
* @param array $values
* @return \Pimcore\Model\Object\ProductCategory
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get name - Name
* @return string
*/
public function getName () {
	$preValue = $this->preGetValue("name"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->name;
	return $data;
}

/**
* Set name - Name
* @param string $name
* @return \Pimcore\Model\Object\ProductCategory
*/
public function setName ($name) {
	$this->name = $name;
	return $this;
}

/**
* Get description - Description
* @return string
*/
public function getDescription () {
	$preValue = $this->preGetValue("description"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->getClass()->getFieldDefinition("description")->preGetData($this);
	return $data;
}

/**
* Set description - Description
* @param string $description
* @return \Pimcore\Model\Object\ProductCategory
*/
public function setDescription ($description) {
	$this->description = $description;
	return $this;
}

/**
* Get order - Order
* @return float
*/
public function getOrder () {
	$preValue = $this->preGetValue("order"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->order;
	return $data;
}

/**
* Set order - Order
* @param float $order
* @return \Pimcore\Model\Object\ProductCategory
*/
public function setOrder ($order) {
	$this->order = $order;
	return $this;
}

/**
* Get urlKeyword - Url Keyword
* @return string
*/
public function getUrlKeyword () {
	$preValue = $this->preGetValue("urlKeyword"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->urlKeyword;
	return $data;
}

/**
* Set urlKeyword - Url Keyword
* @param string $urlKeyword
* @return \Pimcore\Model\Object\ProductCategory
*/
public function setUrlKeyword ($urlKeyword) {
	$this->urlKeyword = $urlKeyword;
	return $this;
}

/**
* Get mainImage - Main Image
* @return \Pimcore\Model\Asset\Image
*/
public function getMainImage () {
	$preValue = $this->preGetValue("mainImage"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->mainImage;
	return $data;
}

/**
* Set mainImage - Main Image
* @param \Pimcore\Model\Asset\Image $mainImage
* @return \Pimcore\Model\Object\ProductCategory
*/
public function setMainImage ($mainImage) {
	$this->mainImage = $mainImage;
	return $this;
}

/**
* Get backgroundImage - Background Image
* @return \Pimcore\Model\Asset\Image
*/
public function getBackgroundImage () {
	$preValue = $this->preGetValue("backgroundImage"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->backgroundImage;
	return $data;
}

/**
* Set backgroundImage - Background Image
* @param \Pimcore\Model\Asset\Image $backgroundImage
* @return \Pimcore\Model\Object\ProductCategory
*/
public function setBackgroundImage ($backgroundImage) {
	$this->backgroundImage = $backgroundImage;
	return $this;
}

protected static $_relationFields = array (
);

public $lazyLoadedFields = NULL;

}

