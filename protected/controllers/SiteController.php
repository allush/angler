<?php


class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }


    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                    "Reply-To: {$model->email}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() and $model->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }

        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Displays the register page
     */
    public function actionRegister()
    {
        $model = new RegisterForm;
// collect user input data
        if (isset($_POST['RegisterForm'])) {
            $model->attributes = $_POST['RegisterForm'];

            if ($model->validate()) {
                $user = new User();
                $user->username = $model->username;
                $user->email = strtolower($model->email);
                $user->password = CPasswordHelper::hashPassword($model->password);
                $user->save();
                $this->redirect(Yii::app()->homeUrl);
            }
        }
        // display the register form
        $this->render('register', array('model' => $model));
    }

    public function actionZapros()
    {
        $this->render('zapros');
    }

    public function actionGetzapros()
    {
        //   http://yandex.ru/yandsearch?lr=213&text=%D0%BA%D1%83%D0%BF%D0%B8%D1%82%D1%8C+%D0%BA%D1%83%D1%85%D0%BD%D1%8E&csg=21736%2C26287%2C12%2C12%2C0%2C1%2C0
        include(Yii::app()->getBasePath() . '/..' . '/snoopy/Snoopy.class.php');
        include(Yii::app()->getBasePath() . '/..' . '/parser/simple_html_dom.php');
        $snoopy = new Snoopy(); // создаём объект
        $this->render('zapros');
//        $post_array = array();
//        $post_array['text'] = 'купить+кухню';
//        $post_array['lr'] = '213';
//        $snoopy->submit('http://www.yandex.com/yandsearch', $post_array);
//        $a = $snoopy->results;
//        echo $a; // выводим результат
        // Второй вариант
        $snoopy->fetch('http://yandex.ru/yandsearch?lr=213&text=купить+кухню'); // загружаем страницу
        $a = $snoopy->results;
        //    echo $a; // выводим результат
        //Парсер
        $html = str_get_html($a);
        echo $html;
//        $htmld= file_get_html('http://direct.yandex.ru/search?charset=utf-8&text=купить+кухню&rid=213&ref-page=0');
        foreach ($html->find('a') as $element)
            echo $element->href . '<br>';
//        echo '--------------'.'<br>';
//        foreach($htmld->find('a') as $element)
//            echo $element->href . '<br>';
    }


    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}