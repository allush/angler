<?php

class ScoreController extends PartnerController
{
    public function actionIndex()
    {
        $score = new Score();
        $dataProvider = new CActiveDataProvider('Score');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionCreateEvents()
    {
        Score::createEvents();
        $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Score'])) {
            $model->attributes = $_POST['Score'];
            if ($model->save())
                $this->redirect(array('index'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * @param $id
     * @return Score
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Score::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}