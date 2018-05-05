<?php

class AnnualSalary extends PersonProperty {

    public function __CONSTRUCT($property_value)
    {
        $this->property_name = 'annual_salary';
        parent::__CONSTRUCT($property_value);
    }
}