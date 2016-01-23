<?php
namespace bigc\profile\model;

use PHPUnit_Framework_TestCase;
class BasicTest extends PHPUnit_Framework_TestCase{
    public function testGetBasicData() {
        $obj = new Basic();
        $this->setExpectedException('\InvalidArgumentException');
        $obj->getBasicData("abc");
        //echo '123';
    }
}