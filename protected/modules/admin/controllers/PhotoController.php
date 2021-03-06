<?php

class PhotoController extends AdminController
{


    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Photo;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Photo'])) {
            $model->attributes = $_POST['Photo'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionConfirmation($id)
    {
        $model = $this->loadModel($id);

        $model->is_confirmed = 1;
        $model->save();
        $model->user->credit(Score::EVENT_ADD_PHOTO);
        $this->redirect(array('index'));
    }



    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();
        $this->redirect(array('index'));
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
       /* if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));*/
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Photo',array(
            'criteria'=>array(
                'condition'=>'is_confirmed=0 OR is_confirmed IS NULL'
            )
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
    public function actionConfirmed()
    {
        $dataProvider = new CActiveDataProvider('Photo',array(
            'criteria'=>array(
                'condition'=>'is_confirmed=1'
            )
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Photo('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Photo']))
            $model->attributes = $_GET['Photo'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Photo the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Photo::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Photo $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'photo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
