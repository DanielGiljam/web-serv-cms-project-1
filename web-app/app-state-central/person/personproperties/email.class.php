<?php

class Email extends PersonProperty {

    public function __CONSTRUCT($property_value)
    {
        $this->property_name = 'email';
        parent::__CONSTRUCT($property_value);
    }
}