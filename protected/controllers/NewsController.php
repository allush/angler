<?php

class NewsController extends Controller
{
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
//	public function actionCreate()
//	{
//		$model=new News;
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['News']))
//		{
//			$model->attributes=$_POST['News'];
//            $model->date=time();
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('create',array(
//			'model'=>$model,
//		));
//	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
//	public function actionUpdate($id)
//	{
//		$model=$this->loadModel($id);
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['News']))
//		{
//			$model->attributes=$_POST['News'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('update',array(
//			'model'=>$model,
//		));
//	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
//	public function actionDelete($id)
//	{
//		$this->loadModel($id)->delete();
//
//		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//		if(!isset($_GET['ajax']))
//			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
//	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('News');

        $model = new SearchForm();

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'model'=>$model
		));
	}

	/**
	 * Manages all models.
	 */
//	public function actionAdmin()
//	{
//		$model=new News('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['News']))
//			$model->attributes=$_GET['News'];
//
//		$this->render('admin',array(
//			'model'=>$model,
//		));
//	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return News the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


    public function actionSearch()
    {
        $model = new SearchForm();


        if(isset($_POST['SearchForm']))
        {
            $model->attributes = $_POST['SearchForm'];

            $criteria = new CDbCriteria();
            $criteria->addSearchCondition('head', $model->keyword);





            //Выбрать записи из news, где head = $model->keyword




            //Выбрать id из tags, где tag = $model->keyword

            //Выбрать news_id из news_tag с выбранным id

            //Выбать записи из news с выбранным id


//            $tagS = Yii::app()->db->createCommand()
//                ->select('id')
//                ->from('tags')
//                ->where('tags=$model->keyword')
//                ->queryRow();
//
//            $idS = Yii::app()->db->createCommand()
//                ->select('news_id')
//                ->from('news_tag')
//                ->where('tags_id=$tagS')
//                ->queryRow();
//
//            $news = Yii::app()->db->createCommand()
//                ->





            $dataProvider=new CActiveDataProvider('News', array(
                'criteria'=>$criteria
            ));
        }else{
            $dataProvider=new CActiveDataProvider('News');
        }

        $this->render('index', array(
            'dataProvider'=>$dataProvider,
            'model'=>$model
        ));
    }

	/**
	 * Performs the AJAX validation.
	 * @param News $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
