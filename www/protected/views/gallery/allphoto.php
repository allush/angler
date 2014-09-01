<?php
/* @var $this GalleryController */
/* @var $photos Photo[] */
$this->pageTitle = Yii::app()->name . ' - All Photo';
$this->breadcrumbs = array(
    'All Photo',
);
?>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="js/bootstrap.min.js"></script>
<h1>All photo</h1>

<p>Here you can see all photo</p>

<div class="view">
    <?php
    foreach ($photos as $photo) {
        echo CHtml::image($photo->imageUrl(), "tag", array("width" => "200px", "height" => "200px"));
    }
    ?>
</div>