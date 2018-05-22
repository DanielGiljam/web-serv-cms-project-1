<?php

class Preferences extends PersonProperty {

    public function __CONSTRUCT($property_value)
    {
        $this->property_name = 'preferences';
        parent::__CONSTRUCT(json_decode($property_value, true));
    }
}