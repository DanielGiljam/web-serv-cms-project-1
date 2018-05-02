<?php

class Id extends PersonProperty {

    public function __CONSTRUCT($property_value)
    {
        $this->property_name = 'id';
        parent::__CONSTRUCT($property_value);
    }
}