<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'News',
);

//$this->menu=array(
//    array('label'=>'Create News', 'url'=>array('create')),
//    array('label'=>'Manage News', 'url'=>array('admin')),
//);


?>
<?php
//$this->widget('zii.widgets.CMenu', array(
//'items' => array(
//array('label'=>'Создать новость', 'url'=>array('create')),
//array('label'=>'Управление новостями', 'url'=>array('admin')),
//),
//'htmlOptions'=>array(
//'class'=>'nav nav-pills'
//)
//));
//
//?>

<h1>Новости</h1>


<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>


