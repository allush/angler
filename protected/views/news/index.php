<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */
/* @var $model SearchForm */
/* @var $form CActiveForm */

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

<div class="form-group">

<?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'search-form',
        'action' => array('search')
    ));
?>

<?php echo $form->textField($model, 'keyword', array('class'=>'form-control')); ?>
<?= CHtml::submitButton('Найти', array('class'=>'btn btn-default'));?>

<?php $this->endWidget(); ?>

</div>


<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>


