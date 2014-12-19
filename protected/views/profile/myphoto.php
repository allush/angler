<?php
/* @var $this SiteController */
/* @var $photos Photo[] */
$this->pageTitle = Yii::app()->name . ' - Мои фото';
$this->breadcrumbs = array(
    'Мои фото'
);
?>

<div class="smalldivider"></div>

<?php $this->renderPartial('_menu');
echo CHtml::link('Загрузить фото', array('photo'));
?>
<h1>Ваши фото</h1>

<p>Здесь вы можете просмотреть все Ваши фото, при нажатии на них вы сможете обновить их координаты</p>

<div class="row">
    <?php
    foreach ($photos as $photo) {
        ?>
        <div class="col-sm-2">
            <?php
            echo CHtml::link(CHtml::image($photo->imageUrl(), 'tag', array('class' => 'gallery-item')), '#', array('class' => 'thumbnail'));
            echo CHtml::link('Обновить координаты', array('updatemyphoto', 'id' => $photo->id), array('class' => 'thumbnail'));

            ?>
        </div>
    <?php
    }
    ?>
</div>

<div id="big-photo"></div>

<script type="text/javascript">
    $(function () {
        $('.thumbnail').click(function () {
            var src = $(this).find('img').attr('src');
            $('#big-photo').html('<img src="' + src + '">');
        });
    })
</script>











