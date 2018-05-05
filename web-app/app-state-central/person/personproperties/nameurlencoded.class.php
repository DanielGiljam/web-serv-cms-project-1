<?php

class NameUrlEncoded extends PersonProperty {

    public function __CONSTRUCT($property_value)
    {
        $this->property_name = 'name_url_encoded';
        parent::__CONSTRUCT($property_value);
    }
}