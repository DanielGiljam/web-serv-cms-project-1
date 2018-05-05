<?php

abstract class PersonProperty {

    protected $property_name;
    private $property_value;

    public function __CONSTRUCT($property_value)
    {
        $this->property_value = $property_value;
    }

    public function setValue($new_value)
    {
        $this->property_value = $new_value;
    }

    public function name()
    {
        return $this->property_name;
    }

    public function value()
    {
        return $this->property_value;
    }

}

include 'personproperties/id.class.php';
include 'personproperties/name.class.php';
include 'personproperties/nameurlencoded.class.php';
include 'personproperties/email.class.php';
include 'personproperties/zipcode.class.php';
include 'personproperties/aboutyou.class.php';
include 'personproperties/annualsalary.class.php';
include 'personproperties/datingpreference.class.php';