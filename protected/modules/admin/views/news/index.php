<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'News',
);




?>


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
    'summaryText' => false,
    'pager' => array(
        'class'=> 'CLinkPager',
        'htmlOptions' => array('class'=>'pagination pagination-lg'),
        'selectedPageCssClass' => 'active',
        'header' => false,
    ),
)); ?>
</div>
</section>
