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
<div class="view">
        <?php
        echo CHtml::image($photo->imageUrl().$photo->filename ,"tag", array("width"=>"50%" ,"height"=>"50%"));
        ?>
</div>
<div class="row buttons">
    <?php echo CHtml::Button('Prev'); ?>
    <?php echo CHtml::Button('Next'); ?>
</div>







