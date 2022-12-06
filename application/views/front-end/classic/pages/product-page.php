<?php $total_images = 0; ?>
<!-- breadcrumb -->
<section class="breadcrumb-title-bar colored-breadcrumb">
    <div class="main-content responsive-breadcrumb">
        <h1><?= $product['product'][0]['name'] ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><?= !empty($this->lang->line('home')) ? $this->lang->line('home') : 'Home' ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('products') ?>"><?= !empty($this->lang->line('product')) ? $this->lang->line('product') : 'Product' ?></a></li>
                <?php
                $cat_names = array();
                $result = check_for_parent_id($product['product'][0]['category_id']);
                array_push($cat_names, $result[0]['name']);
                while (!empty($result[0]['parent_id'])) {
                    $result = check_for_parent_id($result[0]['parent_id']);
                    array_push($cat_names, $result[0]['name']);
                }
                $cat_names = array_reverse($cat_names, true);
                foreach ($cat_names as $row) { ?>
                    <li class="breadcrumb-item active" aria-current="page"><?= $row ?></li>
                <?php } ?>
            </ol>
        </nav>
    </div>

</section>


<div id="user-review-images" class='product-page-content'>
    <div class="container" id="review-image-div">
        <?php
        if (isset($review_images['product_rating']) && !empty($review_images['product_rating'])) { ?>
            <div class="row reviews" id="user_image_data">

            </div>
            <div id="load_more_div">
            </div>
        <?php } ?>
    </div>
</div>