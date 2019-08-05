<?php


namespace App;


class MozambiquePhone implements PhoneNumber
{
    public $country = "Mozambique";

    /**
     * Check if the phone number is valid
     * @return Boolean
     */
    public function isValid($number)
    {
        return preg_match( "/\(258\)\ ?[28]\d{7,8}$/", $number);
    }

    /**
     * Will check if the phone number are from the class who will implement
     * this method.
     * @return Boolean
     */
    public function fromThisCountry($number)
    {
        return preg_match( "/\(258\)/", $number);
    }

    /**
     * Returns the phone number without the country code
     * @return String
     */
    public function getNumber($number)
    {
        return preg_replace("/\(258\)/", '', $number);
    }

    /**
     * Returns the information of the phone number
     * @return array
     */
    public function getPhoneInfo($number)
    {
        $country = $this->country;
        $isValid = $this->isValid($number);
        $countryCode = "+258";
        $phoneNumber = $this->getNumber($number);

        return [
            'country' => $country,
            'isValid' => $isValid,
            'countryCode' => $countryCode,
            'phone' => $phoneNumber
        ];
    }
}