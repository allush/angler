<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - My Photo';
$this->breadcrumbs=array(
    'My Photo',
);
$user=Photo::model()->findByAttributes(array('id' => Yii::app()->user->id));
?>

<h1>My photo</h1>

<p>Here you can see all your photo</p>

<img src="images/photo/5c2591ead689e54f972fca7fafb98247.jpg" width="100%">





