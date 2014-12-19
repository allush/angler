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
                if ($model->coord_x != null or $model->coord_y != null) {
                    $model->user->credit(Score::EVENT_SET_LOCATION);
                }
                $this->redirect(Yii::app()->request->urlReferrer);
            }
        }

        $this->render('photo', array('model' => $model));
    }

    public function actionMyPhoto()
    {
        $this->render('myphoto', array('photos' => $this->getUser()->photos));
    }

    public function actionSertifikat()
    {
        $this->render('sertifikat', array('serts' => $this->getUser()->serts));
    }

    public function actionGetsertifikat($id)
    {
        $user = User::model()->findByAttributes(array('id' => Yii::app()->user->id));
        $sert = new Sertifikat;
        $sert->user_id = $user->id;
        $sert->price = $id;
        $sert->used = 0;
        if ($sert->save()) {
            $mpdf = new mPDF();
            $mpdf->WriteHTML('Поздравляем! Вам выдан сертификат на ' . $id . ' англеров');
            $mpdf->Output('sertifikat/' . $sert->id . '.pdf', 'F');
            $mpdf->Output();
            $user->sertifikat($id);
            exit;

            $this->redirect(Yii::app()->request->urlReferrer);
        }
    }

    public function actionShowsertifikat($id)
    {
        $mpdf = new mPDF();
        $mpdf->SetImportUse();

        $pagecount = $mpdf->SetSourceFile('sertifikat/' . $id . '.pdf');
        $tplId = $mpdf->ImportPage($pagecount);
        $mpdf->UseTemplate($tplId);
        $mpdf->Output();
    }

    public function actionUpdateMyPhoto($id)
    {
        $model = Photo::model()->findByPk($id);
        if (isset($_POST['Photo'])) {
            $model->attributes = $_POST['Photo'];

            if ($model->validate()) {
                /** @var Photo $photo */
                $photo = Photo::model()->findByAttributes(array('id' => $model->id));

                $hasCoords = false;
                $oldX = null;
                $oldY = null;
                //Если есть коодрдинаты, то
                if ($photo->coord_x and $photo->coord_y) {
                    //установить флаг о том, что да
                    $hasCoords = true;
                    $oldX = $photo->coord_x;
                    $oldY = $photo->coord_y;
                }

                // сохраняем то, что ввел пользователь
                $photo->coord_x = $model->coord_x;
                $photo->coord_y = $model->coord_y;
                $photo->save();

                // изменились ли координаты и были ли координаты ранее
                // да: начислить баллы
                if (($photo->coord_x != $oldX or $photo->coord_y != $oldY) and !$hasCoords) {
                    $photo->user->credit(Score::EVENT_SET_LOCATION);
                }
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

    public function actionUploadPhoto()
    {
        $uploadedFile = CUploadedFile::getInstanceByName('file');
        if ($uploadedFile) {
            $filename = md5(microtime() . $uploadedFile->name) . '.' . $uploadedFile->extensionName;
            $path = Photo::path() . $filename;
            if ($uploadedFile->saveAs($path)) {
                $photo = new Photo;
                $photo->filename = $filename;
                $photo->user_id = $this->getUser()->id;
                if(!$photo->save()){
                    unlink($path);
                }
            }
        }
    }
}