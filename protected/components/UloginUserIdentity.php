<?php

class UloginUserIdentity implements IUserIdentity
{

    private $id;
    private $email;
    private $isAuthenticated = false;
    private $states = array();

    public function __construct()
    {
    }

    public function authenticate($uloginModel = null)
    {

        $criteria = new CDbCriteria;
        $criteria->condition = 'identity=:identity AND network=:network';
        $criteria->params = array(
            ':identity' => $uloginModel->identity
        , ':network' => $uloginModel->network
        );
        $user = User::model()->find($criteria);

        if (null !== $user) {
            $this->id = $user->id;
            $this->email = $user->email;
        } else {
            $user = new User();
            $user->identity = $uloginModel->identity;
            $user->network = $uloginModel->network;
            $user->email = $uloginModel->email;
           // $user->username = $uloginModel->username;
            $user->username = $uloginModel->email;
            $user->password = '1234567';
            $user->save();

            $this->id = $user->id;
            $this->email = $user->email;
        }
        $this->isAuthenticated = true;
        return true;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIsAuthenticated()
    {
        return $this->isAuthenticated;
    }

    public function getName()
    {
        return $this->email;
    }

    public function getPersistentStates()
    {
        return $this->states;
    }
}