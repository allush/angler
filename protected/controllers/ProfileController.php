<?php


class ProfileController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(

            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function actionProfile()
    {
        $model = new ProfileForm;
        $this->render('profile');
    }

    /**
     * Displays the profile update page
     */
    public function actionUpdateProfile()
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

        $this->render('updateprofile', array('model' => $model));
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
        $this->render('myphoto', array('photos' => $this->getUser()->photos));
    }

    public function actionUpdateMyPhoto($id)
    {
        $model = Photo::model()->findByPk($id);
        if (isset($_POST['Photo'])) {
            $model->attributes = $_POST['Photo'];

            if ($model->validate()) {
                $photo = Photo::model()->findByAttributes(array('id' => $model->id));
                $photo->coord_x = $model->coord_x;
                $photo->coord_y = $model->coord_y;
                $photo->save();

                $this->redirect(Yii::app()->request->urlReferrer);
            }
        }


        $this->render('updatemyphoto', array('model' => $model));
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


}