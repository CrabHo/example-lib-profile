<?php
namespace bigc\profile\model;

use bigc\profile\component\ValidProfile as ValidProfile;


class Basic {
    private $_validProfile;

    public function __construct() {
        $this->_validProfile = new ValidProfile();
    }

    /**
    *
    *	@param	Number		$id		UserId
    *	@return	Array
    *	@throws	Exception
    */
    public function getBasicData($id) {
        //Valid
        $this->_validProfile->checkId($id);

        //QueryDB
        $res = array('result' =>
            array(
                'id'     => $id,
                'name'   => 'Crab Ho',
                'email'  => 'crab.ho@example.com',
                'sex'    => 0
            )
        );
        return $res;
    }

    /**
    *
    *
    *	@param	Array
    *	@return	Boolean
    *	@throws	Exception
    */
    public function updateBasicData($id, $data) {
        //Valid
        $this->_validProfile->checkId($id);
        $this->_validProfile->checkData($data);

        //Update DB
        $res = array('result' => true);
        return $res;
    }

    /**
    *
    *	@param	Number		$id		UserId
    *	@return	Boolean
    *	@throws	Exception
    */
    public function deleteBasicData($id) {
        //Valid
        $this->_validProfile->checkId($id);

        $res = array('result' => true);
        return $res;
    }

    /**
    *
    *
    *	@param	Array
    *	@return	Boolean
    *	@throws	Exception
    */
    public function addBasicData($data) {
        //Valid
        $this->_validProfile->checkData($data);

        //Add DB
        $res = array('result' => true);
        return $res;
    }
}