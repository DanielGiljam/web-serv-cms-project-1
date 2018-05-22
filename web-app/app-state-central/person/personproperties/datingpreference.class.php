<?php

class DatingPreference extends PersonProperty {

    public function __CONSTRUCT($property_value)
    {
        $this->property_name = 'dating_preference';
        parent::__CONSTRUCT(self::dpIntToString($property_value));
    }

    private static function dpIntToString($dp_int)
    {
        switch ($dp_int) {
            case 2:
                return 'Male';
            case 3:
                return 'Female';
            case 4:
                return 'Other';
            case 5:
                return 'Male & Female';
            case 6:
                return 'Male & Other';
            case 7:
                return 'Female & Other';
            case 9:
                return 'Male, Female & Other';
            default:
                return 'None';
        }
    }
}