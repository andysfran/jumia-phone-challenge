<?php


namespace App;


class MoroccoPhone implements PhoneNumber
{
    public $country = "Morocco";

    /**
     * Check if the phone number is valid
     * @return mixed Boolean
     */
    public function isValid($number)
    {
        return preg_match( "/\(212\)\ ?[5-9]\d{8}$/", $number);
    }

    /**
     * Will check if the phone number are from the class who will implement
     * this method.
     * @return Boolean
     */
    public function fromThisCountry($number)
    {
        return preg_match( "/\(212\)/", $number);
    }

    /**
     * Returns the phone number without the country code
     * @return String
     */
    public function getNumber($number)
    {
        return preg_replace("/\(212\)/", '', $number);
    }

    /**
     * Returns the information of the phone number
     * @return array
     */
    public function getPhoneInfo($number)
    {
        $country = $this->country;
        $isValid = $this->isValid($number);
        $countryCode = "+212";
        $phoneNumber = $this->getNumber($number);

        return [
            'country' => $country,
            'isValid' => $isValid,
            'countryCode' => $countryCode,
            'phone' => $phoneNumber
        ];
    }

}
