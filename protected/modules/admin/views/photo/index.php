<?php
/* @var $this PhotoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Фото',
);


?>

<section>

    <div class="section-header">
<h1>Фото</h1>
    </div>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'pager' => array(
        'class'=> 'CLinkPager',
        'htmlOptions' => array('class'=>'pagination pagination-lg'),
        'selectedPageCssClass' => 'active',
        'header' => false,
    ),
    'summaryText'=>false,
)); ?>

</section>