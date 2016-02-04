<?php
namespace bigc\profile\data;

use Respect\Validation\Validator as v;
use Cascade\Cascade;

class ProfileData
{

    public function __construct()
    {
        $this->initRule();
        $this->initMessage();
    }

    public function validation($ruleName, $value)
    {
        Cascade::getLogger('bigc\profile')->debug("ProfileData validation $ruleName, $value");
        try {
            $this->validRule[$ruleName]->assert($value);
        } catch (\Respect\Validation\Exceptions\NestedValidationException $ex) {
            $e = new \InvalidArgumentException($this->validMessage[$ruleName], 0, $ex);
            Cascade::getLogger('bigc\profile')->warning($e->getMessage());
            throw $e;
        }
        return true;
    }

    /**
     *  init valid rule
     */
    protected function initRule()
    {
        $this->validRule['id']      = v::numeric();
        $this->validRule['name']    = v::stringType()->length(1, 10);
        $this->validRule['email']   = v::email();
        $this->validRule['sex']     = v::intVal()->between(0, 1);
    }

    /**
     *  init valid error message
     */
    protected function initMessage()
    {
        $this->validMessage['id']       = 'id must only contain numeric.';
        $this->validMessage['name']     = 'name must only string and length between 1 and 10.';
        $this->validMessage['email']    = 'email format is not correct.';
        $this->validMessage['sex']      = 'sex must only contain numeric and between 0 and 1.';
    }

    /**
     *  Generator a education data object
     *
     *  @param      int         $id         id
     *  @param      string      $name       name
     *  @param      string      $email      email
     *  @param      int         $sex        sex
     *  @throws     \InvalidArgumentException
     *
     */
    public static function makeProfile(
        $id,
        $name,
        $email,
        $sex
    ) {
        $dataObject = new ProfileData;
        $dataObject->setId($id);
        $dataObject->setName($name);
        $dataObject->setEmail($email);
        $dataObject->setSex($sex);

        if ($dataObject->getId() === null) {
            $dataObject->checkData(true);
        } else {
            $dataObject->checkData(false);
        }

        return $dataObject;
    }

    /**
     *  Check Data function, it will check all parameter is correct.
     *
     *  @param      boolean     $flag       true is new data, false is exist data
     *  @throws     \InvalidArgumentException
     */
    public function checkData($flag = false)
    {
        if (!$flag) {
            $this->validation("id", $this->getId());
        }
        $this->validation("name", $this->getName());
        $this->validation("email", $this->getEmail());
        $this->validation("sex", $this->getSex());
    }

    private $id;
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    private $name;
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    private $email;
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    private $sex;
    public function setSex($sex)
    {
        $this->sex = $sex;
    }
    public function getSex()
    {
        return $this->sex;
    }
}
