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

    public function actionRequest()
    {
        $this->render('request');
    }

    public function actionShell()
    {
        $path = Yii::app()->getBasePath() . '/data/snapshots/google.png';
        echo shell_exec(Yii::app()->getBasePath() . '/capt/capt.exe --url=http://google.com --out='.$path.' ');
    }

    public function save_site($element, $id)
    {
        $snoopy = new Snoopy();
        $snoopy->fetch($element);
        if ($snoopy->status != 200) {
            $element = $snoopy->lastredirectaddr;
            $snoopy->fetch($element);
            if ($snoopy->status != 200) {
                $element = $snoopy->scheme . '://' . $snoopy->host;
                $snoopy->fetch($element);
            }
        }
        $path = Yii::app()->getBasePath() . '/data/snapshots/';
       shell_exec(Yii::app()->getBasePath() . '/capt/capt.exe --url='.$element.' --out='.$path.$id.'.png');
        /* $f = fopen($path.$id . '.htm', 'w');
         if ($f) {

             fwrite($f, $snoopy->results);
             fclose($f);
         }
        */
    }


    public function actionGetquery()
    {
        set_time_limit(0);
        include(Yii::app()->getBasePath() . '/..' . '/snoopy/Snoopy.class.php');
        $snoopy = new Snoopy();
        $snoopy->agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36";
        $snoopy->curl_path;

        $requests = Request::model()->findAll();
        foreach ($requests as $request) {
            $snoopy->fetch('http://yandex.ru/yandsearch?lr=213&text=' . $request->name);
            sleep(8);
            $result = $snoopy->results;
            echo $result;
            //Парсер

            $adv_array = array();
            preg_match_all('/<a class="b-link serp-item__title-link serp-item__title-link" target="_blank" href="(.*?)">.*?<\/a>/', $result, $adv_array);
            foreach ($adv_array[1] as $element) {
                sleep(8);
                $model = new Parser;
                $snoopy = new Snoopy();
                $snoopy->fetch($element);
                $model->name = $snoopy->host;
                $model->date = time();
                $model->request_id = $request->id;
                if ($model->save()) {
                    $this->save_site($element, $model->id);
                }
            }

            $site_array = array();
            preg_match_all('/<a class="b-link serp-item__title-link serp-item__title-link" target="_blank" onmousedown=".*?" href="(.*?)" tabindex="2">.*?<\/a>/', $result, $site_array);
            foreach ($site_array[1] as $element) {
                sleep(8);
                $model = new Parser;
                $snoopy = new Snoopy();
                $snoopy->fetch($element);
                $model->name = $snoopy->host;
                $model->date = time();
                $model->request_id = $request->id;
                if ($model->save()) {
                    $this->save_site($element, $model->id);
                }
            }
        }
        $this->render('request');
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