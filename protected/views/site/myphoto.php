<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - My Photo';
$this->breadcrumbs=array(
    'My Photo',
);
$photo=Photo::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
?>

<h1>My photo</h1>

<p>Here you can see all your photo</p>

<?php
echo $photo->imageUrl().$photo->filename;
CHtml::image($photo->imageUrl().$photo->filename);
?>






