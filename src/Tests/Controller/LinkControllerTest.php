<?php

class LinkControllerTest extends PHPUnit_Framework_TestCase
{
    /**
     * Controllers should in general return the correct name
     */
    public function testNameTest()
    {
        $sut = new LinkController('test');
        $sut->setTemplate(new TemplateMock());

        $this->assertEquals($sut->name(), 'Link');
    }

}