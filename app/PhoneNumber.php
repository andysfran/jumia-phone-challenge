<?php


namespace App;


interface PhoneNumber
{

    /**
     * Check if the phone number is valid
     * @return Boolean
     */
    public function isValid($number);

    /**
     * Will check if the phone number are from the class who will implement
     * this method.
     * @return Boolean
     */
    public function fromThisCountry($number);

    /**
     * Returns the phone number without the country code
     * @return String
     */
    public function getNumber($number);

    /**
     * Returns the information of the phone number
     * @return Array
     */
    public function getPhoneInfo($number);
}