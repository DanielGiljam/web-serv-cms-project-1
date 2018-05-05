<?php

class DatingPreference extends PersonProperty {

    public function __CONSTRUCT($property_value)
    {
        $this->property_name = 'dating_preference';
        parent::__CONSTRUCT($property_value);
    }
}