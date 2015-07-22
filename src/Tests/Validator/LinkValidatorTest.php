<?php

class LinkValidatorTest extends PHPUnit_Framework_TestCase
{

    /**
     * Ensure no empty strings are validated as true
     */
    public function testEmptyLinks()
    {
        $sut = new LinkValidator();
        $this->assertFalse($sut->isValid(''));
    }

    /**
     * Ensure malformed strings are not validated as valid
     */
    public function testMalformedLinks()
    {
        $sut = new LinkValidator();
        $this->assertFalse($sut->isValid('sdfsdadfasf'));
        $this->assertFalse($sut->isValid('http:'));
        $this->assertFalse($sut->isValid('http//testdomain.com'));
    }

    /**
     * Positive tests
     */
    public function testProperlyFormedUrls()
    {
        $sut = new LinkValidator();
        $this->assertTrue($sut->isValid('https://testdomain.com'));
        $this->assertTrue($sut->isValid('http://www.testdomain.com?withParaemeters=true'));
        $this->assertTrue($sut->isValid('http://testdomain.com/slugged/urls'));
        $this->assertTrue($sut->isValid('http://testdomain.com/slugged/urls?withPrameters=true'));
    }

}