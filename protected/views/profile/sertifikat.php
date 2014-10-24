<?php
/**
 * @var $this ProfileController
 */


$this->pageTitle = Yii::app()->name . ' - Сертификаты';
$this->breadcrumbs = array(
    'Сертификаты',
);
$user = User::model()->findByAttributes(array('id' => Yii::app()->user->id));
?>

<?php $this->renderPartial('_menu'); ?>
<h1>Сертификаты</h1>


<p>Здесь вы можете просмотреть и распечатать Ваши сертификаты, а также получить новые</p>


<div class="row buttons">
    <?php
    echo CHtml::link(SCORE::SERT_200, array('getsertifikat', 'id' => SCORE::SERT_200));
    ?>
</div>

<div class="row buttons">
    <?php
    echo CHtml::link(SCORE::SERT_500, array('getsertifikat', 'id' => SCORE::SERT_500));
    ?>
</div>

<div class="row buttons">
    <?php
    echo CHtml::link(SCORE::SERT_1000, array('getsertifikat', 'id' => SCORE::SERT_1000));
    ?>
</div>








