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

<section>
    <div class="section-header">
<h1 class="text-standard">Новости</h1>
    </div>

<div class="section-body contain-lg">
<?php
$dataProvider->sort->defaultOrder = "date DESC";
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    //'sortableAttributes' => array('date'),
    'summaryText' => false,
    'pager' => array(
        'class'=> 'CLinkPager',
        'htmlOptions' => array('class'=>'pagination pagination-lg'),
        'selectedPageCssClass' => 'active',
        'header' => '',
    ),
)); ?>
</div>
</section>
