<?php

class Gender extends PersonProperty {

    public function __CONSTRUCT($property_value)
    {
        $this->property_name = 'gender';
        switch ($property_value) {
            case 0:
                $final_property_value = 'Male';
                break;
            case 1:
                $final_property_value = 'Female';
                break;
            default:
                $final_property_value = 'Other';
                break;
        }
        parent::__CONSTRUCT($final_property_value);
    }
}