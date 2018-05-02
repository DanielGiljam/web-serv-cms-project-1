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

include 'person-properties/id.class.php';
include 'person-properties/name.class.php';
include 'person-properties/name-url-encoded.class.php';
include 'person-properties/email.class.php';
include 'person-properties/zip-code.class.php';
include 'person-properties/about-you.class.php';
include 'person-properties/annual-salary.class.php';
include 'person-properties/dating-preference.class.php';