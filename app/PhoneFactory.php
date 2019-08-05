<?php


namespace App;


class PhoneFactory
{

    private $cameroon;
    private $morocco;
    private $ethiopia;
    private $mozambique;
    private $uganda;

    public function __construct()
    {
        $this->cameroon = new CameroonPhone();
        $this->uganda = new UgandaPhone();
        $this->morocco = new MoroccoPhone();
        $this->ethiopia = new EthiopiaPhone();
        $this->mozambique = new MozambiquePhone();
    }

    /**
     * Returns an array with the formatted information about a phone number.
     * @param $phoneNumber String
     * @return array
     */
    public function getPhoneInfo($phoneNumber) {
        if ($this->cameroon->fromThisCountry($phoneNumber)) {
            return $this->cameroon->getPhoneInfo($phoneNumber);
        } else if ($this->morocco->fromThisCountry($phoneNumber)) {
            return $this->morocco->getPhoneInfo($phoneNumber);
        } else if($this->ethiopia->fromThisCountry($phoneNumber)) {
            return $this->ethiopia->getPhoneInfo($phoneNumber);
        } else if ($this->mozambique->fromThisCountry($phoneNumber)) {
            return $this->mozambique->getPhoneInfo($phoneNumber);
        } else {
            return $this->uganda->getPhoneInfo($phoneNumber);
        }
    }

    /**
     * Check if the phone number is valid
     * @param $phoneNumber String
     * @return bool|mixed
     */
    public function isValid($phoneNumber) {
        if ($this->cameroon->fromThisCountry($phoneNumber)) {
            return $this->cameroon->isValid($phoneNumber);
        } else if ($this->morocco->fromThisCountry($phoneNumber)) {
            return $this->morocco->isValid($phoneNumber);
        } else if($this->ethiopia->fromThisCountry($phoneNumber)) {
            return $this->ethiopia->isValid($phoneNumber);
        } else if ($this->mozambique->fromThisCountry($phoneNumber)) {
            return $this->mozambique->isValid($phoneNumber);
        } else{
            return $this->uganda->isValid($phoneNumber);
        }
    }

}