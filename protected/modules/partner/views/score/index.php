<?php
/* @var $this ScoreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
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
        <div class="box box-outlined style-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Событие</th>
                    <th>Цена</th>
                    <th></th>
                </tr>
                </thead>
                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                    'summaryText' => false,
                    'pager' => array(
                        'class' => 'CLinkPager',
                        'htmlOptions' => array('class' => 'pagination pagination-lg'),
                        'selectedPageCssClass' => 'active',
                        'header' => false,
                    ),
                )); ?>
            </table>
        </div>
    </div>

</section>
