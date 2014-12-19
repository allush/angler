<?php
/* @var $this GalleryController */
/* @var $photos Photo[] */
$this->pageTitle = Yii::app()->name . ' - Галерея';
$this->breadcrumbs = array(
    'Галерея'
);
?>
<h1>Галерея</h1>




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