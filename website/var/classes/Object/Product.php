<?php 

/** 
* Generated at: 2016-11-25T05:34:59+01:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 192.168.8.25


Fields Summary: 
- name [input]
- description [wysiwyg]
- order [numeric]
- urlKeyword [input]
- category [objects]
- backgroundImage [image]
- mainImage [image]
- detailImage [image]
*/ 

namespace Pimcore\Model\Object;



/**
* @method static \Pimcore\Model\Object\Product\Listing getByName ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Product\Listing getByDescription ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Product\Listing getByOrder ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Product\Listing getByUrlKeyword ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Product\Listing getByCategory ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Product\Listing getByBackgroundImage ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Product\Listing getByMainImage ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Product\Listing getByDetailImage ($value, $limit = 0) 
*/

class Product extends Concrete {

public $o_classId = 1;
public $o_className = "Product";
public $name;
public $description;
public $order;
public $urlKeyword;
public $category;
public $backgroundImage;
public $mainImage;
public $detailImage;


/**
* @param array $values
* @return \Pimcore\Model\Object\Product
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
* @return \Pimcore\Model\Object\Product
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
* @return \Pimcore\Model\Object\Product
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
* @return \Pimcore\Model\Object\Product
*/
public function setOrder ($order) {
	$this->order = $order;
	return $this;
}

/**
* Get urlKeyword - URL Keyword
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
* Set urlKeyword - URL Keyword
* @param string $urlKeyword
* @return \Pimcore\Model\Object\Product
*/
public function setUrlKeyword ($urlKeyword) {
	$this->urlKeyword = $urlKeyword;
	return $this;
}

/**
* Get category - Product Category
* @return \Pimcore\Model\Object\ProductCategory[]
*/
public function getCategory () {
	$preValue = $this->preGetValue("category"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->getClass()->getFieldDefinition("category")->preGetData($this);
	return $data;
}

/**
* Set category - Product Category
* @param \Pimcore\Model\Object\ProductCategory[] $category
* @return \Pimcore\Model\Object\Product
*/
public function setCategory ($category) {
	$this->category = $this->getClass()->getFieldDefinition("category")->preSetData($this, $category);
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
* @return \Pimcore\Model\Object\Product
*/
public function setBackgroundImage ($backgroundImage) {
	$this->backgroundImage = $backgroundImage;
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
* @return \Pimcore\Model\Object\Product
*/
public function setMainImage ($mainImage) {
	$this->mainImage = $mainImage;
	return $this;
}

/**
* Get detailImage - Detail Image
* @return \Pimcore\Model\Asset\Image
*/
public function getDetailImage () {
	$preValue = $this->preGetValue("detailImage"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->detailImage;
	return $data;
}

/**
* Set detailImage - Detail Image
* @param \Pimcore\Model\Asset\Image $detailImage
* @return \Pimcore\Model\Object\Product
*/
public function setDetailImage ($detailImage) {
	$this->detailImage = $detailImage;
	return $this;
}

protected static $_relationFields = array (
  'category' => 
  array (
    'type' => 'objects',
  ),
);

public $lazyLoadedFields = array (
  0 => 'category',
);

}

