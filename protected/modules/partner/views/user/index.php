<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Пользователи',
);

$this->menu = array();
?>
<section>
    <div class="section-header">
        <h1>Пользователи</h1>
    </div>

    <div class="section-body">

        <div class="box box-outlined style-body">
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Имя пользователя</th>
                    <th>e-mail</th>
                    <th></th>
                </tr>
                </thead>
                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                    'pager' => array(
                        'class' => 'CLinkPager',
                        'htmlOptions' => array('class' => 'pagination pagination-lg'),
                        'selectedPageCssClass' => 'active',
                        'header' => false,
                        'maxButtonCount' => 3,
                    ),
                    'summaryText' => false,
                )); ?>

            </table>
        </div>
    </div>
</section>
