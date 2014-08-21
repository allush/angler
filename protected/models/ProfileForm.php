<?php

/**
 * ProfileForm class.
 * user profile  data. It is used by the 'profile' action of 'SiteController'.
 */
class ProfileForm extends CFormModel
{
	public $username;
	public $email;
	public $password;

    public function rules()
    {
        return array(
            array('username', 'length', 'max' => 32, 'min' => 4),
            array('email', 'email'),
            array('password', 'length', 'max' => 32, 'min' => 4),
        );
    }

}
?>