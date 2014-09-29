<!--поиск переданных символов в таблице tags-->

<!--создание списка из выбранных тегов в блоке-->

<!---->


<?php
/**
 * @var $this NewsController
 * @var $tags Tags[]
 */

?>
<div id="tagslist">
    <ul id="list">
        <?php foreach($tags as $tag){
            echo '<li>'.$tag->tag.'</li>';
        }?>
        <!-- загружаемые элементы -->
    </ul>
</div>

