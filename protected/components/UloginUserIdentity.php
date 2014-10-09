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
//            $mail = new PHPMailer();
//            $mail->setLanguage('ru');
            $user->identity = $uloginModel->identity;
            $user->network = $uloginModel->network;
            $user->email = $uloginModel->email;
            $user->username = $uloginModel->email;
            $pass = rand(100, 1000000000);
            $user->password = (string)$pass;
//
//            $mail->From = 'angler@angler.com';
//            $mail->FromName = 'Angler';
//            $mail->addAddress($uloginModel->email); // Add a recipient
//
//            $mail->WordWrap = 50; // Set word wrap to 50 characters
//            $mail->isHTML(true); // Set email format to HTML
//            mail($uloginModel->email, 'Профиль', 'Поздравляем с регистрацией, ваш пароль <b>' . $user->password . '</b> Для его смены перейдите по ссылке: <a href=' . Yii::app()->homeUrl . 'Ваш профиль</a>');
//            $mail->Subject = 'Пароль';
//            $mail->Body = 'Поздравляем с регистрацией, ваш пароль <b>' . $user->password . '</b> Для его смены перейдите по ссылке: <a href=' . Yii::app()->homeUrl . 'Ваш профиль</a>';
//
//
//            $mail->send();
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