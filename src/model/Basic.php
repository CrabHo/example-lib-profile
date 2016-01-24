<?php
namespace bigc\profile\model;

use bigc\profile\component\ValidProfile as ValidProfile;
use Cascade\Cascade;

class Basic
{
    private $validProfile;

    public function __construct()
    {
        $this->validProfile = new ValidProfile();
        //Cascade::fileConfig('test.yml');
        Cascade::getLogger('loggerA')->info('Well, that works!');
        Cascade::getLogger('loggerB')->error('Maybe not...');

    }

    /**
    *
    *   @param  Number      $id     UserId
    *   @return Array
    *   @throws Exception
    */
    public function getBasicData($id)
    {
        //Valid
        $this->validProfile->checkId($id);

        //QueryDB
        $res = ['result' =>
            [
                'id'     => $id,
                'name'   => 'Crab Ho',
                'email'  => 'crab.ho@example.com',
                'sex'    => 0
            ]
        ];
        return $res;
    }

    /**
    *
    *
    *   @param    Array
    *   @return   Boolean
    *   @throws   Exception
    */
    public function updateBasicData($id, $data)
    {
        //Valid
        $this->validProfile->checkId($id);
        $this->validProfile->checkData($data);

        //Update DB
        $res = ['result' => true];
        return $res;
    }

    /**
    *
    *   @param    Number  $id UserId
    *   @return   Boolean
    *   @throws   Exception
    */
    public function deleteBasicData($id)
    {
        //Valid
        $this->validProfile->checkId($id);

        $res = ['result' => true];
        return $res;
    }

    /**
    *
    *
    *   @param  Array
    *   @return Boolean
    *   @throws Exception
    */
    public function addBasicData($data)
    {
        //Valid
        $this->validProfile->checkData($data);

        //Add DB
        $res = ['result' => true];
        return $res;
    }
}
