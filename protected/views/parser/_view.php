<?php
/* @var $this ParserController */
/* @var $data Parser */
?>

<div class="view">

    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox").fancybox();
        });
    </script>

    <tr>
        <td>
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('id')); ?><!--:</b>-->
	<?php echo CHtml::encode($data->id); ?>
	<br />
        </td>
        <td>
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('name')); ?><!--:</b>-->
            <a class="fancybox" data-fancybox-type="iframe" href="<?= $data->path;?>"> <?= $data->name; ?> </a>
	<br />
        </td>
        <td>
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('date')); ?><!--:</b>-->
	<?php echo CHtml::encode(date('d.m.Y', $data->date)); ?>
	<br />
        </td>
        <td>
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('path')); ?><!--:</b>-->



	<?php// echo CHtml::encode($data->path); ?>
	<br />
        </td>

    </tr>
<!--    <table>-->
<!--        <tr>-->
<!--            <th>Site</th>-->
<!--            <th></th>-->
<!--        </tr>-->
<!--    </table>-->




</div>