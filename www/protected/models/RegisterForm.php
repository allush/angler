<?php

/**
 * RegisterForm class.
 * user register form data. It is used by the 'register' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $username;
	public $email;
	public $password;
	public function rules()
	{
	return array(
	array('email','email'),
	array('password','length','max'=>32,'min'=>4),
	);
	}
}

?>