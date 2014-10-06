<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */
/* @var $model SearchForm */

$this->breadcrumbs=array(
    'News',
);

//$this->menu=array(
//    array('label'=>'Create News', 'url'=>array('create')),
//    array('label'=>'Manage News', 'url'=>array('admin')),
//);

//$this->widget('zii.widgets.CMenu', array(
//    'items' => array(
//        array('label'=>'Создать новость', 'url'=>array('create')),
//        array('label'=>'Управление новостями', 'url'=>array('admin')),
//    ),
//    'htmlOptions'=>array(
//        'class'=>'nav nav-pills'
//    )
//));
?>

<h1>Новости</h1>

<div class="form">

    <?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::textField($model, 'keyword'); ?>

<!--    Добавить критерий поиска (по заголовку, тегу, содержанию)-->

    <?php echo CHtml::submitButton('Поиск'); ?>

    <?php echo CHtml::endForm(); ?>

</div>


</script>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>


