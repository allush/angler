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

    /**
     * Displays the profile page
     */
    public function actionProfile()
    {
        $model = new ProfileForm;
        if (isset($_POST['ProfileForm'])) {
            $model->attributes = $_POST['ProfileForm'];

            if ($model->validate()) {
                $user = User::model()->findByAttributes(array('id' => Yii::app()->user->id));
                $user->username = $model->username;
                $user->email = strtolower($model->email);
                $user->password = CPasswordHelper::hashPassword($model->password);
                $user->save();

                $this->redirect(Yii::app()->homeUrl);
            }
        }

        $this->render('profile', array('model' => $model));
    }

    /**
     * Displays the photo page
     */
    public function actionPhoto()
    {
        $model = new Photo;

        if (isset($_POST['Photo'])) {
            $model->attributes = $_POST['Photo'];
            $model->image = CUploadedFile::getInstance($model, 'image');

            if ($model->image) {
                $filename = md5(time()) . '.' . $model->image->extensionName;
                $path = Photo::path() . $filename;

                $model->image->saveAs($path);
                $model->filename = $filename;

                // тут может быть обработка уже загруженного изображения
            }

            if ($model->save()) {
                $this->redirect(Yii::app()->request->urlReferrer);
            }
        }

        $this->render('photo', array('model' => $model));
    }

    public function actionMyPhoto()
    {
        $this->render('myphoto');
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