<?php
function show_product($data, $parent_id = 0)
{
    foreach ($data as $key => $item) {
        if ($item['parent_id'] == $parent_id && $item['parent_id'] == 0) {
            echo '<div class="quizzes_section">';
            echo '<div class="quizzes_section_head">';
            echo $item['name'] . '<i class="fa-solid fa-pen"></i>';
            echo '</div>';
            unset($data[$key]);
            show_product($data, $item['id']);
        } else {
            echo '<div class="row">';
            echo '<div class="c-4">';
            echo '<div class="quizzes_section_item ">';
            echo '<i class="fa-solid fa-trash delete"></i>';
            echo '<img src="/storage/images/category/' . $item['thumb'] . '" alt="" class="img">';
            echo '<div class="text_head">' . $item['name'] . '</div>';
            echo '<div class="text_sub">' . $item['description'] . ' </div>';
            echo '<div class="wrap">';
            echo '<div class="lession"> 10 lession</div>';
            echo '<div class="edit">Edit<i class="fa-solid fa-pen"></i></div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
}
