<?php

// TODO: comment this file

include 'person-property.abstract.php';

class Person {

    private $id;
    private $name;
    private $name_url_encoded;
    private $email;
    private $zip_code;
    private $about_you;
    private $annual_salary;
    private $dating_preference;

    private function __CONSTRUCT($id)
    {
        $person_data = getPerson($id);
        $this->id = new Id($person_data[0]['id']);
        $this->name = new Name($person_data[0]['name']);
        $this->name_url_encoded = new NameUrlEncoded($person_data[0]['name_url_encoded']);
        $this->email = new Email($person_data[0]['email']);
        $this->zip_code = new ZipCode($person_data[0]['zip_code']);
        $this->about_you = new AboutYou($person_data[0]['about_you']);
        $this->annual_salary = new AnnualSalary($person_data[0]['annual_salary']);
        $this->dating_preference = new DatingPreference($person_data[0]['dating_preference']);
    }

    public static function getPerson(PersonProperty $property)
    {
        switch ($property->name()) {
            case 'id':
                $id = $property->value();
                break;
            case 'name':
                return false;
            case 'name_url_encoded':
                $id = self::getId($property->value());
                var_dump($id);
                break;
            case 'email':
                return false;
            case 'zip_code':
                return false;
            case 'about_you':
                return false;
            case 'annual_salary':
                return false;
            case 'dating_preference':
                return false;
            default:
                return false;
        }
        return new Person($id);
    }

    public static function getId($name_url_encoded)
    {
        return getIdWithNameUrlEncoded($name_url_encoded)[0]['id']; // TODO: make this function return a real value
    }

    public static function getUrlEncodedName($id)
    {
        return '>corresponding-url-encoded-name<'; // TODO: make this function return a real value
    }

    public static function getName(PersonProperty $id_or_name_url_encoded)
    {
        if ($id_or_name_url_encoded->name() === 'id') {
            return '>corresponding-name<'; // TODO: make this function return a real value
        } else {
            return '>corresponding-name<'; // TODO: make this function return a real value
        }
    }

    public function get($property_name)
    {
        switch ($property_name) {
            case 'id':
                return $this->id;
            case 'name':
                return $this->name;
            case 'name_url_encoded':
                return $this->name_url_encoded;
            case 'email':
                return $this->email;
            case 'zip_code':
                return $this->zip_code;
            case 'about_you':
                return $this->about_you;
            case 'annual_salary':
                return $this->annual_salary;
            case 'dating_preference':
                return $this->dating_preference;
            default:
                return false;
        }
    }

}