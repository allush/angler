<?php


class GalleryController extends Controller
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

    public function actionAllPhoto()
    {
        $photos=Photo::model()->findAll(array(
            'condition' => 'is_confirmed=1'
        ));
        $this->render('allphoto', array('photos' => $photos));
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