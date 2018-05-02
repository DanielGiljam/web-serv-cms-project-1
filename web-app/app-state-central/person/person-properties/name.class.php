<?php

class Name extends PersonProperty {

    public function __CONSTRUCT($property_value)
    {
        $this->property_name = 'name';
        parent::__CONSTRUCT($property_value);
    }
}