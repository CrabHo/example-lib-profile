<?php
namespace bigc\profile\component;

use PHPUnit_Framework_TestCase;
class ValidProfileTest extends PHPUnit_Framework_TestCase {
    public function testCheckId() {
        $obj = new ValidProfile();
        $this->assertEquals($obj->checkId(123), true);

        $this->setExpectedException("InvalidArgumentException", "Should be numeric");
        $obj->checkId("abc");
    }
}