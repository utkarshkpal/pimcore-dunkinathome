<?php 

/** 
* Generated at: 2016-11-21T10:01:11+01:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 192.168.8.25


Fields Summary: 
- productCategory [input]
- product [input]
- upc [input]
- typeOfFeedback [input]
- wroteAbout [input]
- feeling [input]
- comments [textarea]
- firstName [input]
- lastName [input]
- email [input]
- phone [input]
- month [input]
- year [input]
- address [textarea]
- city [input]
- state [input]
- zip [input]
*/ 

namespace Pimcore\Model\Object;



/**
* @method static \Pimcore\Model\Object\Contact\Listing getByProductCategory ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByProduct ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByUpc ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByTypeOfFeedback ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByWroteAbout ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByFeeling ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByComments ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByFirstName ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByLastName ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByEmail ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByPhone ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByMonth ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByYear ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByAddress ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByCity ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByState ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Contact\Listing getByZip ($value, $limit = 0) 
*/

class Contact extends Concrete {

public $o_classId = 4;
public $o_className = "contact";
public $productCategory;
public $product;
public $upc;
public $typeOfFeedback;
public $wroteAbout;
public $feeling;
public $comments;
public $firstName;
public $lastName;
public $email;
public $phone;
public $month;
public $year;
public $address;
public $city;
public $state;
public $zip;


/**
* @param array $values
* @return \Pimcore\Model\Object\Contact
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get productCategory - Product Category
* @return string
*/
public function getProductCategory () {
	$preValue = $this->preGetValue("productCategory"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->productCategory;
	return $data;
}

/**
* Set productCategory - Product Category
* @param string $productCategory
* @return \Pimcore\Model\Object\Contact
*/
public function setProductCategory ($productCategory) {
	$this->productCategory = $productCategory;
	return $this;
}

/**
* Get product - Product
* @return string
*/
public function getProduct () {
	$preValue = $this->preGetValue("product"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->product;
	return $data;
}

/**
* Set product - Product
* @param string $product
* @return \Pimcore\Model\Object\Contact
*/
public function setProduct ($product) {
	$this->product = $product;
	return $this;
}

/**
* Get upc - UPC on Product
* @return string
*/
public function getUpc () {
	$preValue = $this->preGetValue("upc"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->upc;
	return $data;
}

/**
* Set upc - UPC on Product
* @param string $upc
* @return \Pimcore\Model\Object\Contact
*/
public function setUpc ($upc) {
	$this->upc = $upc;
	return $this;
}

/**
* Get typeOfFeedback - Type of Feedback
* @return string
*/
public function getTypeOfFeedback () {
	$preValue = $this->preGetValue("typeOfFeedback"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->typeOfFeedback;
	return $data;
}

/**
* Set typeOfFeedback - Type of Feedback
* @param string $typeOfFeedback
* @return \Pimcore\Model\Object\Contact
*/
public function setTypeOfFeedback ($typeOfFeedback) {
	$this->typeOfFeedback = $typeOfFeedback;
	return $this;
}

/**
* Get wroteAbout - User Wrote About
* @return string
*/
public function getWroteAbout () {
	$preValue = $this->preGetValue("wroteAbout"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->wroteAbout;
	return $data;
}

/**
* Set wroteAbout - User Wrote About
* @param string $wroteAbout
* @return \Pimcore\Model\Object\Contact
*/
public function setWroteAbout ($wroteAbout) {
	$this->wroteAbout = $wroteAbout;
	return $this;
}

/**
* Get feeling - User Feels
* @return string
*/
public function getFeeling () {
	$preValue = $this->preGetValue("feeling"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->feeling;
	return $data;
}

/**
* Set feeling - User Feels
* @param string $feeling
* @return \Pimcore\Model\Object\Contact
*/
public function setFeeling ($feeling) {
	$this->feeling = $feeling;
	return $this;
}

/**
* Get comments - User's Comments
* @return string
*/
public function getComments () {
	$preValue = $this->preGetValue("comments"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->comments;
	return $data;
}

/**
* Set comments - User's Comments
* @param string $comments
* @return \Pimcore\Model\Object\Contact
*/
public function setComments ($comments) {
	$this->comments = $comments;
	return $this;
}

/**
* Get firstName - First Name
* @return string
*/
public function getFirstName () {
	$preValue = $this->preGetValue("firstName"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->firstName;
	return $data;
}

/**
* Set firstName - First Name
* @param string $firstName
* @return \Pimcore\Model\Object\Contact
*/
public function setFirstName ($firstName) {
	$this->firstName = $firstName;
	return $this;
}

/**
* Get lastName - Last Name
* @return string
*/
public function getLastName () {
	$preValue = $this->preGetValue("lastName"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->lastName;
	return $data;
}

/**
* Set lastName - Last Name
* @param string $lastName
* @return \Pimcore\Model\Object\Contact
*/
public function setLastName ($lastName) {
	$this->lastName = $lastName;
	return $this;
}

/**
* Get email - Email
* @return string
*/
public function getEmail () {
	$preValue = $this->preGetValue("email"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->email;
	return $data;
}

/**
* Set email - Email
* @param string $email
* @return \Pimcore\Model\Object\Contact
*/
public function setEmail ($email) {
	$this->email = $email;
	return $this;
}

/**
* Get phone - Phone Number
* @return string
*/
public function getPhone () {
	$preValue = $this->preGetValue("phone"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->phone;
	return $data;
}

/**
* Set phone - Phone Number
* @param string $phone
* @return \Pimcore\Model\Object\Contact
*/
public function setPhone ($phone) {
	$this->phone = $phone;
	return $this;
}

/**
* Get month - Month
* @return string
*/
public function getMonth () {
	$preValue = $this->preGetValue("month"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->month;
	return $data;
}

/**
* Set month - Month
* @param string $month
* @return \Pimcore\Model\Object\Contact
*/
public function setMonth ($month) {
	$this->month = $month;
	return $this;
}

/**
* Get year - Year
* @return string
*/
public function getYear () {
	$preValue = $this->preGetValue("year"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->year;
	return $data;
}

/**
* Set year - Year
* @param string $year
* @return \Pimcore\Model\Object\Contact
*/
public function setYear ($year) {
	$this->year = $year;
	return $this;
}

/**
* Get address - Address
* @return string
*/
public function getAddress () {
	$preValue = $this->preGetValue("address"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->address;
	return $data;
}

/**
* Set address - Address
* @param string $address
* @return \Pimcore\Model\Object\Contact
*/
public function setAddress ($address) {
	$this->address = $address;
	return $this;
}

/**
* Get city - City
* @return string
*/
public function getCity () {
	$preValue = $this->preGetValue("city"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->city;
	return $data;
}

/**
* Set city - City
* @param string $city
* @return \Pimcore\Model\Object\Contact
*/
public function setCity ($city) {
	$this->city = $city;
	return $this;
}

/**
* Get state - State
* @return string
*/
public function getState () {
	$preValue = $this->preGetValue("state"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->state;
	return $data;
}

/**
* Set state - State
* @param string $state
* @return \Pimcore\Model\Object\Contact
*/
public function setState ($state) {
	$this->state = $state;
	return $this;
}

/**
* Get zip - ZIP Code
* @return string
*/
public function getZip () {
	$preValue = $this->preGetValue("zip"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->zip;
	return $data;
}

/**
* Set zip - ZIP Code
* @param string $zip
* @return \Pimcore\Model\Object\Contact
*/
public function setZip ($zip) {
	$this->zip = $zip;
	return $this;
}

protected static $_relationFields = array (
);

public $lazyLoadedFields = NULL;

}

