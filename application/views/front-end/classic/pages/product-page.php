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

<!-- end breadcrumb -->
<section class="content main-content product-page-content my-3 py-3" itemscope itemtype="https://schema.org/Product">
    <div class="row mx-0">
        <div class="col-12 col-md-6 product-preview-image-section-md">
            <div class="swiper-container product-gallery-top gallery-top-1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class='product-view-grid'>
                            <div class='product-view-image'>
                                <div class='product-view-image-container'>
                                    <link itemprop="image" href="<?= $product['product'][0]['image'] ?>" />
                                    <img src="<?= $product['product'][0]['image'] ?>" id="img_01" data-zoom-image="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

                    $variant_images_md = array_column($product['product'][0]['variants'], 'images_md');
                    if (!empty($variant_images_md)) {
                        foreach ($variant_images_md as $variant_images) {
                            if (!empty($variant_images)) {
                                foreach ($variant_images as $image) {
                    ?>
                                    <div class="swiper-slide">
                                        <div class='product-view-grid'>
                                            <div class='product-view-image'>
                                                <div class='product-view-image-container'>
                                                    <link itemprop="image" href="<?= $image ?>" />
                                                    <img src="<?= $image ?>" data-zoom-image="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    <?php }
                            }
                        }
                    } ?>
                    <?php
                    if (!empty($product['product'][0]['other_images']) && isset($product['product'][0]['other_images'])) {
                        foreach ($product['product'][0]['other_images'] as $other_image) {
                            $total_images++;
                    ?>
                            <div class="swiper-slide">
                                <div class='product-view-grid'>
                                    <div class='product-view-image'>
                                        <div class='product-view-image-container'>
                                            <link itemprop="image" href="<?= $other_image ?>" />
                                            <img src="<?= $other_image ?>" id="img_01" data-zoom-image="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                    <?php
                    if (isset($product['product'][0]['video_type']) && !empty($product['product'][0]['video_type'])) {
                        $total_images++;
                    ?>
                        <div class="swiper-slide">
                            <div class='product-view-grid'>
                                <div class='product-view-image'>
                                    <div class='product-view-image-container'>
                                        <?php if ($product['product'][0]['video_type'] == 'self_hosted') { ?>
                                            <video controls width="320" height="240" src="<?= $product['product'][0]['video'] ?>">
                                                Your browser does not support the video tag.
                                            </video>
                                            <?php } else if ($product['product'][0]['video_type'] == 'youtube' || $product['product'][0]['video_type'] == 'vimeo') {
                                            if ($product['product'][0]['video_type'] == 'vimeo') {
                                                $url =  explode("/", $product['product'][0]['video']);
                                                $id = end($url);
                                                $url = 'https://player.vimeo.com/video/' . $id;
                                            } else if ($product['product'][0]['video_type'] == 'youtube') {
                                                if (strpos($product['product'][0]['video'], 'watch?v=') !== false) {
                                                    $url = str_replace("watch?v=", "embed/", $product['product'][0]['video']);
                                                } else if (strpos($product['product'][0]['video'], "youtu.be/") !== false) {
                                                    $url = explode("/", $product['product'][0]['video']);
                                                    $url = "https://www.youtube.com/embed/" . end($url);
                                                }
                                            } else {
                                                $url = $product['product'][0]['video'];
                                            } ?>
                                            <iframe width="560" height="315" src="<?= $url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;embedded=true" allowfullscreen></iframe>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-black"></div>
                <div class="swiper-button-prev swiper-button-black"></div>
            </div>
            <div class="swiper-container product-gallery-thumbs gallery-thumbs-1">
                <div class="swiper-wrapper" id="gal1">
                    <div class="swiper-slide ml-0">
                        <div class='product-view-grid'>
                            <div class='product-view-image'>
                                <div class='product-view-image-container'>
                                    <link itemprop="image" href="<?= $product['product'][0]['image'] ?>" />
                                    <img src="<?= $product['product'][0]['image'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if (!empty($variant_images_md)) {
                        foreach ($variant_images_md as $variant_images) {
                            if (!empty($variant_images)) {
                                foreach ($variant_images as $image) {
                    ?>
                                    <div class="swiper-slide">
                                        <div class='product-view-grid'>
                                            <div class='product-view-image'>
                                                <div class='product-view-image-container'>
                                                    <link itemprop="image" href="<?= $image ?>" />
                                                    <img src="<?= $image ?>" data-zoom-image="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    <?php }
                            }
                        }
                    } ?>
                    <?php
                    if (!empty($product['product'][0]['other_images']) && isset($product['product'][0]['other_images'])) {
                        foreach ($product['product'][0]['other_images'] as $other_image) { ?>
                            <div class="swiper-slide ml-0">
                                <div class='product-view-grid'>
                                    <div class='product-view-image'>
                                        <div class='product-view-image-container'>
                                            <link itemprop="image" href="<?= $other_image ?>" />
                                            <img src="<?= $other_image ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                    <?php
                    if (isset($product['product'][0]['video_type']) && !empty($product['product'][0]['video_type'])) {
                        $total_images++;
                    ?>
                        <div class="swiper-slide">
                            <div class='product-view-grid'>
                                <div class='product-view-image'>
                                    <div class='product-view-image-container'>
                                        <img src="<?= base_url('assets/admin/images/video-file.png') ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <!-- Mobile Product Image Slider -->
        <div class="col-12 col-md-6 product-preview-image-section-sm">
            <div class=" swiper-container preview-image-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide text-center"><img src="<?= $product['product'][0]['image'] ?>"></div>
                    <?php
                    if (!empty($product['product'][0]['other_images']) && isset($product['product'][0]['other_images'])) {
                        foreach ($product['product'][0]['other_images'] as $other_image) { ?>
                            <div class="swiper-slide text-center"><img src="<?= $other_image ?>"></div>
                    <?php }
                    } ?>
                    <?php if (!empty($variant_images_md)) {
                        foreach ($variant_images_md as $variant_images) {
                            if (!empty($variant_images)) {
                                foreach ($variant_images as $image) {
                    ?>
                                    <div class="swiper-slide text-center"><img src="<?= $image ?>" data-zoom-image=""></div>

                    <?php }
                            }
                        }
                    } ?>
                    <?php
                    if (isset($product['product'][0]['video_type']) && !empty($product['product'][0]['video_type'])) {
                        $total_images++;
                    ?>
                        <div class="swiper-slide">
                            <div class='product-view-grid'>
                                <div class='product-view-image'>
                                    <div class='product-view-image-container'>
                                        <?php if ($product['product'][0]['video_type'] == 'self_hosted') { ?>
                                            <video controls width="320" height="240" src="<?= $product['product'][0]['video'] ?>">
                                                Your browser does not support the video tag.
                                            </video>
                                        <?php } else if ($product['product'][0]['video_type'] == 'youtube' || $product['product'][0]['video_type'] == 'vimeo') {
                                            if ($product['product'][0]['video_type'] == 'vimeo') {
                                                $url =  explode("/", $product['product'][0]['video']);
                                                $id = end($url);
                                                $url = 'https://player.vimeo.com/video/' . $id;
                                            } else if ($product['product'][0]['video_type'] == 'youtube') {
                                                if (strpos($product['product'][0]['video'], 'watch?v=') !== false) {
                                                    $url = str_replace("watch?v=", "embed/", $product['product'][0]['video']);
                                                } else {
                                                    $url = $product['product'][0]['video'];
                                                }
                                            } else {
                                                $url = $product['product'][0]['video'];
                                            }
                                        ?>
                                            <iframe width="560" height="315" src="<?= $url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-pagination preview-image-swiper-pagination text-center"></div>
            </div>
        </div>
        
        <div class="col-12 row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link product-nav-tab active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true"><?= !empty($this->lang->line('description')) ? $this->lang->line('description') : 'Description' ?></a>
                    <a class="nav-item nav-link product-nav-tab" id="product-review-tab" data-toggle="tab" href="#product-review" role="tab" aria-controls="product-review" aria-selected="false"><?= !empty($this->lang->line('reviews')) ? $this->lang->line('reviews') : 'Reviews' ?></a>
                </div>
            </nav>
            <div class="tab-content p-3 w-100" id="nav-tabContent">
                <div class="tab-pane fade active show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <?= (isset($product['product'][0]['description']) && !empty($product['product'][0]['description'])) ? output_escaping(str_replace('\r\n', '&#13;&#10;', $product['product'][0]['description'])) : ""  ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="product-review" role="tabpanel" aria-labelledby="product-review-tab">
                    <?php
                    if (!empty($review_images['total_images'])) {
                        if ($review_images['total_images'] > 0) { ?>
                            <h3 class="review-title"> User Review Images (<span><?= $review_images['total_images'] ?></span>)</h3>
                        <?php
                        }
                    }
                    if (isset($review_images['product_rating']) && !empty($review_images['product_rating'])) { ?>
                        <div class="row reviews">
                            <?php
                            $count = 0;
                            $total_images = $review_images['total_images'];
                            for ($i = 0; $i < count($review_images['product_rating']); $i++) {
                                if (!empty($review_images['product_rating'][$i]['images'])) {
                                    for ($j = 0; $j < count($review_images['product_rating'][$i]['images']); $j++) {
                                        if ($count <= 8) {
                                            if ($count == 8 && !empty($review_images['product_rating'][$i]['images'][$j])) { ?>
                                                <div class="col-sm-1">
                                                    <div class="review-box">
                                                        <a href="<?= $review_images['product_rating'][$i]['images'][$j] ?>">
                                                            <p class="limit_position"><?= "+" . ($total_images - 8) ?></p>
                                                            <img id="review-image-title" src="<?= $review_images['product_rating'][$i]['images'][$j] ?>" alt="Review Image" data-reached-end="false" data-review-limit="1" data-review-offset="0" data-product-id="<?= $review_images['product_rating'][$i]['product_id'] ?>" data-review-title="User Review Images(<span><?= $review_images['total_images'] ?></span>)" data-izimodal-open="#user-review-images" class="overlay">
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } else if (!empty($review_images['product_rating'][$i]['images'][$j])) { ?>
                                                <div class="col-sm-1">
                                                    <div class="review-box">
                                                        <a href="<?= $review_images['product_rating'][$i]['images'][$j] ?>" data-lightbox="users-review-images" data-title="<?= "<button class='label btn-success'>" . $review_images['product_rating'][$i]['rating'] . " <i class='fa fa-star'></i></button></br>" . $review_images['product_rating'][$i]['user_name'] . "<br>" . $review_images['product_rating'][$i]['comment'] ?> ">
                                                            <img src="<?= $review_images['product_rating'][$i]['images'][$j] ?>" alt="Review Images">
                                                        </a>
                                                    </div>
                                                </div>
                            <?php }
                                            $count += 1;
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-xl-7">
                            <h3 class="review-title"> <span id="no_ratings"><?= $product['product'][0]['no_of_ratings'] ?></span> Reviews For this Product</h3>
                            <ol class="review-list" id="review-list">
                                <?php if (isset($my_rating) && !empty($my_rating)) {
                                    foreach ($my_rating['product_rating'] as $row) { ?>
                                        <li class="review-container">
                                            <div class="review-image">
                                                <img src="<?= THEME_ASSETS_URL . 'images/user.png' ?>" alt="" width="65" height="65">
                                            </div>
                                            <div class="review-comment">
                                                <div class="rating-list">
                                                    <div class="product-rating">
                                                        <input type="text" readonly class="kv-fa rating-loading" value="<?= $row['rating'] ?>" data-size="xs" title="">
                                                    </div>
                                                </div>
                                                <div class="review-info">
                                                    <h4 class="reviewer-name"><?= $row['user_name'] ?></h4>
                                                    <span class="review-date text-muted"><?= $row['data_added'] ?></span>
                                                </div>
                                                <div class="review-text">
                                                    <p class="text-muted"><?= $row['comment'] ?></p>
                                                    <a id="delete_rating" href="<?= base_url('products/delete-rating') ?>" class="text-danger" data-rating-id="<?= $row['id'] ?>">Delete</a>
                                                </div>
                                                <div class="row reviews">
                                                    <?php foreach ($row['images'] as $image) { ?>
                                                        <div class="col-sm-2">
                                                            <div class="review-box">
                                                                <a href="<?= $image ?>" data-lightbox="review-images">
                                                                    <img src="<?= $image ?>" alt="Review Image">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </li>
                                <?php }
                                } ?>
                                <?php if (isset($product_ratings) && !empty($product_ratings)) {
                                    $user_id = (isset($user->id)) ? $user->id : '';
                                    foreach ($product_ratings['product_rating'] as $row) {

                                        if ($row['user_id'] != $user_id) { ?>

                                            <li class="review-container">
                                                <div class="review-image">
                                                    <img src="<?= THEME_ASSETS_URL . 'images/user.png' ?>" alt="" width="65" height="65">
                                                </div>
                                                <div class="review-comment">
                                                    <div class="rating-list">
                                                        <div class="product-rating">
                                                            <input type="text" class="kv-fa rating-loading" value="<?= $row['rating'] ?>" data-size="xs" title="" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="review-info">
                                                        <h4 class="reviewer-name"><?= $row['user_name'] ?></h4>
                                                        <span class="review-date text-muted"><?= $row['data_added'] ?></span>
                                                    </div>
                                                    <div class="review-text">
                                                        <p class="text-muted"><?= $row['comment'] ?></p>
                                                    </div>
                                                    <div class="row reviews">
                                                        <?php foreach ($row['images'] as $image) { ?>
                                                            <div class="col-md-2">
                                                                <div class="review-box">
                                                                    <a href="<?= $image ?>" data-lightbox="review-images">
                                                                        <img src="<?= $image ?>" alt="Review Image">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </li>
                                <?php }
                                    }
                                } ?>
                            </ol>
                        </div>
                        <?php if ($product['product'][0]['is_purchased'] == 1) {
                            $form_link = (!empty($my_rating)) ? base_url('products/edit-rating') : base_url('products/save-rating');
                        ?>
                            <div class="col-xl-5 <?= (!empty($my_rating)) ? 'd-none' : '' ?>" id="rating-box">
                                <div class="add-review">
                                    <h3 class="review-title">Add Your Review</h3>
                                    <form action="<?= $form_link ?>" id="product-rating-form" method="POST">
                                        <?php if (!empty($my_rating)) { ?>
                                            <input type="hidden" name="rating_id" value="<?= $my_rating['product_rating'][0]['id'] ?>">
                                        <?php } ?>
                                        <input type="hidden" name="product_id" value="<?= $product['product'][0]['id'] ?>">
                                        <div class="rating-form">
                                            <label for="rating">Your rating</label>
                                            <input type="text" class="kv-fa rating-loading" data-step="1" name="rating" value="<?= isset($my_rating['product_rating'][0]['rating']) ? $my_rating['product_rating'][0]['rating'] : '0' ?>" data-size="sm" title="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Your Review</label>
                                            <textarea class="form-control" name="comment" rows="3"><?= isset($my_rating['product_rating'][0]['comment']) ? $my_rating['product_rating'][0]['comment'] : '' ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Images</label>
                                            <input type="file" name="images[]" accept="image/x-png,image/gif,image/jpeg" multiple />
                                        </div>
                                        <button class="buttons extra-small primary-button text-center m-0" id="rating-submit-btn">Submit</button>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (isset($product_ratings) && !empty($product_ratings)) { ?>
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button class="buttons btn-6-6" id="load-user-ratings" data-product="<?= $product['product'][0]['id'] ?>" data-limit="<?= $user_rating_limit ?>" data-offset="<?= $user_rating_offset ?>">Load more</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
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