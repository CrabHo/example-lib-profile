<?php
namespace bigc\profile\model;

use bigc\profile\data\ProfileData;
use PHPUnit_Framework_TestCase;

class ProfileTest extends PHPUnit_Framework_TestCase
{

    public function testGetData()
    {
        $obj = new Profile();
        
        $obj->getData(12);
        $obj->getDatas();

        //Test exception
        $this->setExpectedException('\InvalidArgumentException', "id must only contain numeric.");
        $obj->getData();
        $obj->getData(null);
    }

    public function testDeleteData()
    {
        $obj = new Profile;

        //test normal case
        $this->assertEquals(
            $obj->deleteData(123),
            true
        );

        //Test exception
        $this->setExpectedException('\InvalidArgumentException', "id must only contain numeric.");
        $obj->deleteData(null);
        $obj->deleteData();
    }

    public function testAddData()
    {
        $profileData = ProfileData::makeProfile(
            null,
            'tester',
            'tester@example.com',
            1
        );

        //test normal case
        $obj = new Profile();
        $this->assertEquals(
            $obj->addData($profileData),
            true
        );
    }

    public function testUpdateData()
    {
        //test normal case
        $profileData = ProfileData::makeProfile(
            1,
            'tester',
            'tester@example.com',
            1
        );

        $obj = new Profile();
        $this->assertEquals(
            $obj->updateData($profileData),
            true
        );

        //test exception case
        $profileData = ProfileData::makeProfile(
            null,
            'tester',
            'tester@example.com',
            1
        );
        $this->setExpectedException('\InvalidArgumentException', "id must only contain numeric.");
        $obj->updateData($profileData);
    }
}
