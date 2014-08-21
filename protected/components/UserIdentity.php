<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */

    private $_id;

    public function authenticate()
    {
        $email = strtolower($this->username);

        $user = User::model()->findByAttributes(array('email' => $email));
        if ($user === null){
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        else if (!CPasswordHelper::verifyPassword($this->password, $user->password)){
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }
        else {
            $this->_id = $user->id;
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}