<?php

# PERSON
#
# This object represents a person.

include 'personproperty.abstract.php';

// TODO! Add gender -property!

class Person {

    private $id;
    private $gender;
    private $name;
    private $name_url_encoded;
    private $email;
    private $zip_code;
    private $about_you;
    private $annual_salary;
    private $dating_preference;
    private $preferences;

    private function __CONSTRUCT($id)
    {
        $person_data = getPerson($id);
        $this->id = new Id($person_data['id']);
        $this->gender = new Gender($person_data['gender']);
        $this->name = new Name($person_data['name']);
        $this->name_url_encoded = new NameUrlEncoded($person_data['name_url_encoded']);
        $this->email = new Email($person_data['email']);
        $this->zip_code = new ZipCode($person_data['zip_code']);
        $this->about_you = new AboutYou($person_data['about_you']);
        $this->annual_salary = new AnnualSalary($person_data['annual_salary']);
        $this->dating_preference = new DatingPreference($person_data['dating_preference']);
        $this->preferences = new Preferences($person_data['preferences']);
    }

    public static function createPerson(    $gender,
                                            $name,
                                            $password_hash,
                                            $email,
                                            $zip_code,
                                            $about_you,
                                            $annual_salary,
                                            $dating_preference,
                                            $preferences)
    {
        $id = 'UNIQUE_ID';
        $name_url_encoded = self::nameUrlEncoder($name);
        $encoded_preferences = json_encode($preferences);
        createPerson([  $id,
                        $gender,
                        $name,
                        $name_url_encoded,
                        $password_hash,
                        $email,
                        $zip_code,
                        $about_you,
                        $annual_salary,
                        $dating_preference,
                        $encoded_preferences]);
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
                $id = self::getId($property);
                if ($id === false) $id = null;
                break;
            case 'gender':
                return false;
            case 'email':
                return false;
            case 'zip_code':
                return false;
            case 'about_you':
                return false;
            case 'annual_salary':
                return false;
            case 'preferences':
                return false;
            default:
                return false;
        }
        if (isset($id)) return new Person($id);
        else return false;
    }

    public static function getId(PersonProperty $name_url_encoded_or_email)
    {
        switch ($name_url_encoded_or_email->name()) {
            case 'name_url_encoded':
                $id = getIdWithNameUrlEncoded($name_url_encoded_or_email->value())['id'];
                if (isset($id)) return $id;
                else return false;
            case 'email':
                $id = getIdWithEmail($name_url_encoded_or_email->value())['id'];
                if (isset($id)) return $id;
                else return false;
            default:
                return false;
        }
    }

    public static function getNameUrlEncoded($id)
    {
        $name_url_encoded = getNameUrlEncodedWithId($id)['name_url_encoded'];
        if (isset($name_url_encoded)) return $name_url_encoded;
        else return false;
    }

    public static function getPasswordHash(PersonProperty $email)
    {
        $password_hash = getPasswordHashWithEmail($email->value())['password_hash'];
        if ($password_hash !== '') return $password_hash;
        else return false;
    }

    private static function nameUrlEncoder($name)
    {
        $name_url_encoded = strtolower($name);
        $name_url_encoded = preg_replace('/ /i', '-', $name_url_encoded);
        $name_url_encoded = preg_replace('/\'/i', '', $name_url_encoded);
        $name_url_encoded = preg_replace('/[àáâãäåæ]/i', 'a', $name_url_encoded);
        $name_url_encoded = preg_replace('/[ç]/i', 'c', $name_url_encoded);
        $name_url_encoded = preg_replace('/[èéêëŒ]/i', 'e', $name_url_encoded);
        $name_url_encoded = preg_replace('/[ìíîï]/i', 'i', $name_url_encoded);
        $name_url_encoded = preg_replace('/[ðñòóôõöøœ]/i', 'o', $name_url_encoded);
        $name_url_encoded = preg_replace('/[ùúûü]/i', 'u', $name_url_encoded);
        $name_url_encoded = preg_replace('/[ýÿŸ]/i', 'y', $name_url_encoded);
        $name_url_encoded = preg_replace('/[þ]/i', 'p', $name_url_encoded);
        $name_url_encoded = preg_replace('/[Šš]/i', 's', $name_url_encoded);
        $name_url_encoded = preg_replace('/[ƒ]/i', 'f', $name_url_encoded);
        return self::determineNameUrlEncodedIteration($name_url_encoded);
    }

    private static function determineNameUrlEncodedIteration($name_url_encoded)
    {
        $i = 2;
        while (!self::verifyNameUrlEncoded($name_url_encoded)) {
            if ($i === 2) $name_url_encoded .= '-' . $i;
            else $name_url_encoded = preg_replace('/-' . ($i - 1) . '$/i', '-' . $i, $name_url_encoded);
            $i++;
        }
        return $name_url_encoded;
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
            case 'gender':
                return $this->gender;
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
            case 'preferences':
                return $this->preferences;
            default:
                return false;
        }
    }

}