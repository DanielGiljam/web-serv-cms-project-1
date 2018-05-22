<?php

class Gender extends PersonProperty {

    public function __CONSTRUCT($property_value)
    {
        $this->property_name = 'gender';
        parent::__CONSTRUCT($property_value);
    }
}