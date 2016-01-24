<?php
namespace bigc\profile\model;

use PHPUnit_Framework_TestCase;

class BasicTest extends PHPUnit_Framework_TestCase
{

    public function testGetBasicData()
    {
        $obj = new Basic();
        
        //test normal case
        $this->assertEquals(
            $obj->getBasicData('123'),
            $this->getBasicData()
        );
        
        //test Exception case
        $this->setExpectedException('\InvalidArgumentException');
        $obj->getBasicData("abc");
    }

    public function testDeleteBasicData()
    {
        $obj = new Basic;

        //test normal case
        $this->assertEquals(
            $obj->deleteBasicData(123),
            ['result' => true]
        );

        //test excpetion
        $this->setExpectedException('\InvalidArgumentException');
        $obj->deleteBasicData('abc');
    }

    private function getBasicData()
    {
        $res = ['result' =>
            [
                'id'     => 123,
                'name'   => 'Crab Ho',
                'email'  => 'crab.ho@example.com',
                'sex'    => 0
            ]
        ];
        return $res;
    }
}
