<?php

namespace Tests\Feature;

use App\CameroonPhone;
use App\EthiopiaPhone;
use App\MoroccoPhone;
use App\MozambiquePhone;
use App\UgandaPhone;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhoneFactoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testReturnPhonesJson()
    {
        $response = $this->get('/api/phones')->assertJson([
            'data' => Array()
        ]);

        $response->assertStatus(200);
    }

    public function testReturnPhonesJsonWithFilter()
    {
        $response = $this->get('/api/phones?country=(237)&page=2')->assertJson([
            'data' => Array()
        ]);

        $response->assertStatus(200);
    }

    public function testUgandaValidation()
    {
        $phoneInvalid = "(212) 6007989253";
        $phoneValid = "(256) 775069443";
        $uganda = new UgandaPhone();
        $countAttributes = sizeof($uganda->getPhoneInfo($phoneInvalid));
        $this->assertEquals(4, $countAttributes);
        $this->assertEquals(false, $uganda->isValid($phoneInvalid));
        $this->assertEquals(true, $uganda->isValid($phoneValid));
    }

    public function testMozambiqueValidation()
    {
        $phoneInvalid = "(212) 6007989253";
        $phoneValid = "(258) 847651504";
        $mozambique = new MozambiquePhone();
        $countAttributes = sizeof($mozambique->getPhoneInfo($phoneInvalid));
        $this->assertEquals(4, $countAttributes);
        $this->assertEquals(false, $mozambique->isValid($phoneInvalid));
        $this->assertEquals(true, $mozambique->isValid($phoneValid));
    }

    public function testMoroccoValidation()
    {
        $phoneInvalid = "(212) 6007989253";
        $phoneValid = "(212) 698054317";
        $morocco = new MoroccoPhone();
        $countAttributes = sizeof($morocco->getPhoneInfo($phoneInvalid));
        $this->assertEquals(4, $countAttributes);
        $this->assertEquals(false, $morocco->isValid($phoneInvalid));
        $this->assertEquals(true, $morocco->isValid($phoneValid));
    }

    public function testEthiopiaValidation()
    {
        $phoneInvalid = "(212) 6007989253";
        $phoneValid = "(251) 914701723";
        $ethiopia = new EthiopiaPhone();
        $countAttributes = sizeof($ethiopia->getPhoneInfo($phoneInvalid));
        $this->assertEquals(4, $countAttributes);
        $this->assertEquals(false, $ethiopia->isValid($phoneInvalid));
        $this->assertEquals(true, $ethiopia->isValid($phoneValid));
    }

    public function testCameroonValidation()
    {
        $phoneInvalid = "(212) 6007989253";
        $phoneValid = "(237) 697151594";
        $cameroon = new CameroonPhone();
        $countAttributes = sizeof($cameroon->getPhoneInfo($phoneInvalid));
        $this->assertEquals(4, $countAttributes);
        $this->assertEquals(false, $cameroon->isValid($phoneInvalid));
        $this->assertEquals(true, $cameroon->isValid($phoneValid));
    }
}
