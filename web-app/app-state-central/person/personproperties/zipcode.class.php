<?php

class ZipCode extends PersonProperty {

    public function _CONSTRUCT($property_value)
    {
        $this->property_name = 'zip_code';
        parent::_CONSTRUCT($property_value);
    }
}