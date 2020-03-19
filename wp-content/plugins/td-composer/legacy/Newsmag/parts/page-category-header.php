<?php
global $cur_cat_obj;
?>

<div class="td-category-header td-pb-padding-side">
    <header>
        <h1 class="entry-title td-page-title">
            <span><?php printf( '%1$s', $cur_cat_obj->name ) ?></span>
        </h1>
    </header>

    <?php
    //breadcrumb
    echo td_page_generator::get_category_breadcrumbs($cur_cat_obj);

    //the category description
    if (!empty($cur_cat_obj->description)) {
        echo '<div class="td-category-description">' . $cur_cat_obj->description . '</div>';
    }
    ?>
</div>