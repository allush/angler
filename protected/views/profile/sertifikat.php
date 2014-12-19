<?php
/* @var $this ProfileController */
/* @var $serts Sertifikat[] */

$this->pageTitle = Yii::app()->name . ' - Сертификаты';
$this->breadcrumbs = array(
    'Сертификаты'
);
$user = User::model()->findByAttributes(array('id' => Yii::app()->user->id));
?>

<?php $this->renderPartial('_menu'); ?>
<h1>Сертификаты</h1>


<p>Здесь вы можете просмотреть и распечатать Ваши сертификаты, а также получить новые</p>


<div class="row">
    <?php
    foreach ($serts as $sert) {
        ?>
        <div class="row">
            <?php echo CHtml::link('Сертификат № ' . $sert->id . ' на ' . $sert->price . ' англеров'       , array('showsertifikat', 'id' => $sert->id));

            ?>
        </div>
    <?php
    }
    ?>
</div>


<?php
if ($user->score >= 200) {
    ?>
    <div class="row buttons">
        <?php echo CHtml::link('Получить сертификат' . ' ' . Score::SERT_200, array('getsertifikat', 'id' => Score::SERT_200)); ?>
    </div>

    <?php if ($user->score >= 500) { ?>

        <div class="row buttons">
        <?php echo CHtml::link('Получить сертификат' . ' ' . Score::SERT_500, array('getsertifikat', 'id' => Score::SERT_500));
    } ?>
    </div>

    <?php if ($user->score >= 1000) { ?>

        <div class="row buttons">
        <?php echo CHtml::link('Получить сертификат' . ' ' . Score::SERT_1000, array('getsertifikat', 'id' => Score::SERT_1000));
    } ?>
    </div>

<?php
}
?>










