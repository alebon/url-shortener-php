<?php

class GeneratorTest extends PHPUnit_Framework_TestCase
{

    /**
     * Ensure generator is creating string with the correct length
     */
    public function testLengthGenerator()
    {

        $lengthDefault = Generator::getRandomString();
        $lengthTwenty = Generator::getRandomString(20);

        $this->assertEquals(10, strlen($lengthDefault));
        $this->assertEquals(20, strlen($lengthTwenty));
    }

}