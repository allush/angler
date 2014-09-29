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
    <ul class="list-group" id="tagsid">
        <?php foreach($tags as $tag){
            echo '<li class="list-group-item activate">'.$tag->tag.'</li>';
        }?>
        <!-- загружаемые элементы -->
    </ul>
</div>

