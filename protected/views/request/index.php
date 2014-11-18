<?php
/* @var $this RequestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Requests',
);

//$this->menu=array(
//	array('label'=>'Create Request', 'url'=>array('create')),
//	array('label'=>'Manage Request', 'url'=>array('admin')),
//);

$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label'=>'Новый запрос', 'url'=>array('create')),
    ),
    'htmlOptions' => array('class'=>'nav nav-pills'),

));

?>

<h1>Запросы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'template' => '{items} {pager}',
    'summaryText' => '',
    'emptyText' => '',
    'pagerCssClass' => '',
    'pager' => array(
        'firstPageLabel' => '<<',
        'prevPageLabel' => '<',
        'nextPageLabel' => '>',
        'lastPageLabel' => '>>',
        'maxButtonCount' => '7',
        'header' => '',
        'selectedPageCssClass' => 'active',
        'htmlOptions' => array(
            'class' => 'pagination',
        ))
));

?>
