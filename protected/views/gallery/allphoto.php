<?php
/* @var $this GalleryController */
/* @var $photos Photo[] */
$this->pageTitle = Yii::app()->name . ' - All Photo';
$this->breadcrumbs = array(
    'All Photo',
);
?>
<h1>All photo</h1>

<p>Here you can see all photo</p>


<div class="row">
    <?php
    foreach ($photos as $photo) {
        ?>
        <div class="col-sm-2">
            <?php
            echo CHtml::link(CHtml::image($photo->imageUrl(), 'tag', array('class' => 'gallery-item')), '#', array('class' => 'thumbnail'));
            ?>
        </div>
    <?php
    }
    ?>
</div>

<div id="big-photo"></div>

<script type="text/javascript">
    $(function(){
        $('.thumbnail').click(function(){
            var src = $(this).find('img').attr('src');
            $('#big-photo').html('<img src="'+src+'">');
        });
    })
</script>