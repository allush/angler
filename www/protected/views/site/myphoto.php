<?php
/* @var $this SiteController */
/* @var $photos Photo[] */
$this->pageTitle = Yii::app()->name . ' - My Photo';
$this->breadcrumbs = array(
    'My Photo',
);
?>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="js/bootstrap.min.js"></script>
<h1>My photo</h1>

<p>Here you can see all your photo</p>

<div class="view">
    <?php
    foreach ($photos as $photo) {
        echo CHtml::image($photo->imageUrl(), "tag", array("width" => "25%", "height" => "20%"));
    }
    ?>
</div>










