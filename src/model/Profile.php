<?php
namespace bigc\profile\model;

use Cascade\Cascade;
use bigc\profile\data\ProfileData;

class Profile
{
    
    /**
    *   Get data array of Profile
    *   @param  Number          $id    User Id
    *   @return Array
    *   @throws Exception
    */
    public function getDatas()
    {
        $profileData1 = ProfileData::makeProfile(
            1,
            'Crab Ho',
            'crab.ho@example.com',
            0
        );
        $profileData2 = ProfileData::makeProfile(
            2,
            'yoyo',
            'yoyo.ho@example.com',
            0
        );

        return [$profileData1, $profileData2];
    }

    /**
    *   Get Profile data
    *   @param  Number          $id    User Id
    *   @return ProfileData
    *   @throws Exception
    */
    public function getData($id = null)
    {
        $valid = new ProfileData;
        $valid->validation("id", $id);

        //Query database
        $profileData = ProfileData::makeProfile(
            $id,
            'yoyo',
            'yoyo.ho@example.com',
            0
        );

        return $profileData;
    }

    /**
    *   Update ProfileData
    *   @param      ProfileData   $data
    *   @return     Boolean
    *   @throws     Exception
    */
    public function updateData($data)
    {
        //Check data is correct
        $data->checkData(false);

        //Update database

        return true;
    }

    /**
    *   Delete ProfileData
    *   @param      Number          $id    UserId
    *   @return     Boolean
    *   @throws     Exception
    */
    public function deleteData($id)
    {
        $valid = new ProfileData;
        $valid->validation("id", $id);
        //Delete database

        return true;
    }

    /**
    *   Add ProfileData
    *   @param      ProfileData   $data
    *   @return     Boolean
    *   @throws     Exception
    */
    public function addData($data)
    {
        //Check data
        $data->checkData(true);

        //Insert database
        
        return true;
    }
}
