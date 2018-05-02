<?php

class AboutYou extends PersonProperty {

    public function __CONSTRUCT($property_value)
    {
        $this->property_name = 'about_you';
        parent::__CONSTRUCT($property_value);
    }
}