<?php
/* @var $this ScoreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'События',
);

//$this->menu=array(
//    array('label'=>'Генерировать события', 'url'=>array('createEvents')),
//
//);

?>
<section>
    <div class="section-header">
<h1>События</h1>
    </div>

<div class="section-body">
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>
</div>

</section>
