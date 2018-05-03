<?php

# PERSON
#
# This object represents a person.

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
        $this->id = new Id($person_data['id']);
        $this->name = new Name($person_data['name']);
        $this->name_url_encoded = new NameUrlEncoded($person_data['name_url_encoded']);
        $this->email = new Email($person_data['email']);
        $this->zip_code = new ZipCode($person_data['zip_code']);
        $this->about_you = new AboutYou($person_data['about_you']);
        $this->annual_salary = new AnnualSalary($person_data['annual_salary']);
        $this->dating_preference = new DatingPreference($person_data['dating_preference']);
    }

    public static function createPerson(    $name,
                                            $password_hash,
                                            $email,
                                            $zip_code,
                                            $about_you,
                                            $annual_salary,
                                            $dating_preference)
    {
        $id = "unhex(replace(UUID(),'-',''))";
        $name_url_encoded = nameUrlEncoder($name);
        $i = 2;
        while (!self::verifyNameUrlEncoded($name_url_encoded)) {
            if ($i === 2) $name_url_encoded .= '-' . $i;
            else $name_url_encoded = preg_replace('/-' . ($i - 1) . '$/i', '/-' . $i . '$/i', $name_url_encoded);
        }
        createPerson([  $id,
                        "'" . $name . "'",
                        "'" . $name_url_encoded . "'",
                        "'" . $password_hash . "'",
                        "'" . $email . "'",
                        "'" . $zip_code . "'",
                        "'" . $about_you . "'",
                        "'" . $annual_salary . "'",
                        "'" . $dating_preference . "'"]);
    }

    public static function getPerson(PersonProperty $property)
    {
        switch ($property->name()) {
            case 'id':
                $id = $property->value();
                if (self::getNameUrlEncoded($id) === false) $id = null;
                break;
            case 'name':
                return false;
            case 'name_url_encoded':
                $id = self::getId($property->value());
                if ($id === false) $id = null;
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
        if (isset($id)) return new Person($id);
        else return false;
    }

    public static function getId($name_url_encoded)
    {
        $id = getIdWithNameUrlEncoded($name_url_encoded)['id'];
        if (isset($id)) return $id;
        else return false;
    }

    public static function getNameUrlEncoded($id)
    {
        $name_url_encoded = getNameUrlEncodedWithId($id)['name_url_encoded'];
        if (isset($name_url_encoded)) return $name_url_encoded;
        else return false;
    }

    public static function getPasswordHash($email)
    {
        $password_hash = getPasswordHashWithEmail($email);
        if (isset($password_hash)) return $password_hash;
        else return false;
    }

    public static function getName(PersonProperty $id_or_name_url_encoded)
    {
        if ($id_or_name_url_encoded->name() === 'id') {
            return '>corresponding-name<'; // TODO: make this function return a real value
        } else {
            return '>corresponding-name<'; // TODO: make this function return a real value
        }
    }

    private static function verifyNameUrlEncoded($name_url_encoded)
    {
        if (isset(verifyNameUrlEncoded($name_url_encoded)['name_url_encoded'])) return false;
        else return true;
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