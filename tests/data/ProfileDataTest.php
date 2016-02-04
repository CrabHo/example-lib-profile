<?php
namespace bigc\profile\data;

use PHPUnit_Framework_TestCase;

class ProfileDataTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider additionIdProvider
     */
    public function testIdException($id)
    {
        $this->setExpectedException('\InvalidArgumentException', "id must only contain numeric.");
        $obj = ProfileData::makeProfile(
            $id,
            null,
            null,
            null
        );
    }
    /**
     * @dataProvider additionSexProvider
     */
    public function testSexException($sex)
    {
        $this->setExpectedException('\InvalidArgumentException', "sex must only contain numeric and between 0 and 1.");
        $obj = ProfileData::makeProfile(
            1,
            'test',
            'test@example.com',
            $sex
        );
    }

    /**
     * @dataProvider additionStringProvider
     */
    public function testNameException($value)
    {
        $this->setExpectedException(
            '\InvalidArgumentException',
            "name must only string and length between 1 and 10."
        );
        
        $obj = ProfileData::makeProfile(
            1,
            $value,
            null,
            null
        );
    }

    /**
     * @dataProvider additionEmailProvider
     */
    public function testEmailException($value)
    {
        $this->setExpectedException(
            '\InvalidArgumentException',
            "email format is not correct."
        );
        
        $obj = ProfileData::makeProfile(
            1,
            'test',
            $value,
            null
        );
    }

    /**
     * @dataProvider additionInitProvider
     */
    public function testInitDataObject(
        $id,
        $name,
        $email,
        $sex
    ) {
        $obj = ProfileData::makeProfile(
            $id,
            $name,
            $email,
            $sex
        );

        if ($id === null) {
            $this->setExpectedException('\InvalidArgumentException', "id must only contain numeric.");
            $obj->checkData();
        }
    }

    public function additionIdProvider()
    {
        return [
            ["a"],
            [""],
        ];
    }

    public function additionSexProvider()
    {
        return [
            [-1],
            [2],
            ["a"],
            [null]
        ];
    }

    public function additionStringProvider()
    {
        return [
            [""],
            ["abcdefghijklmnopqrstuvwxyz1234561"],
            ["中文中文中文中文中文中文中文中文中文中文中文中文中文中文中文123"]
        ];
    }

    public function additionEmailProvider()
    {
        return [
            ["abc.com"],
            ["09321@example.com%$"],
        ];
    }

    public function additionInitProvider()
    {
        return [
            [
                1,
                "name",
                "tester@example.com",
                0
            ],
            [
                null,
                "name",
                "tester@example.com",
                0
            ]
        ];
    }
}
