<?= $this->extend('client/master') ?>

<?= $this->section('content') ?>
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
            </ol>
        </nav>

        <div class="product-single-container product-single-default">
            <div class="cart-message d-none">
                <strong class="single-cart-notice" id="name"></strong>
                <span id="message_1"></span>
            </div>

            <div class="row">
                <div class="col-lg-5 col-md-6 product-single-gallery">
                    <div class="product-slider-container">
                        <div class="label-group">
                            <?php if ($product['hot'] == TRUE) : ?>
                                <div class="product-label label-hot">HOT</div>
                            <?php else : ?>
                                <div class="hidden" class="product-label label-hot"></div>
                            <?php endif ?>
                            <div class="product-label label-sale">
                                <?= $product['discount'] ?>%
                            </div>
                        </div>

                        <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                            <?php foreach ($images as $image) : ?>
                                <div class="product-item">
                                    <img class="product-single-image" src="<?= base_url($image['image']) ?>"
                                         data-zoom-image="<?= base_url($image['image']) ?>" width="468" height="468"
                                         alt="product"/>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <!-- End .product-single-carousel -->
                        <span class="prod-full-screen">
                            <i class="icon-plus"></i>
                        </span>
                    </div>

                    <div class="prod-thumbnail owl-dots">
                        <?php foreach ($images as $image) : ?>
                            <div class="owl-dot">
                                <img src="<?= base_url($image['image']) ?>" width="110px" height="110px"
                                     alt="product-thumbnail"/>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <!-- End .product-single-gallery -->

                <div class="col-lg-7 col-md-6 product-single-details">
                    <h1 class="product-title"><?= $product['name'] ?></h1>

                    <div class="product-nav">
                        <div class="product-prev">
                            <a href="#">
                                <span class="product-link"></span>

                                <span class="product-popup">
                                    <span class="box-content">
                                        <img alt="product" width="150" height="150"
                                             src="<?= base_url('assets/images/products/product-3.jpg') ?>"
                                             style="padding-top: 0px;">

                                        <span>Circled Ultimate 3D Speaker</span>
                                    </span>
                                </span>
                            </a>
                        </div>

                        <div class="product-next">
                            <a href="#">
                                <span class="product-link"></span>

                                <span class="product-popup">
                                    <span class="box-content">
                                        <img alt="product" width="150" height="150"
                                             src="<?= base_url('assets/images/products/product-4.jpg') ?>"
                                             style="padding-top: 0px;">

                                        <span>Blue Backpack for the Young</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="ratings-container">
                        <div class="product-ratings">
                            <span class="ratings" style="width:60%"></span>

                            <span class="tooltiptext tooltip-top"></span>
                        </div>

                        <a href="#" class="rating-link">( 6 Reviews )</a>
                    </div>
                    <!-- End .ratings-container -->

                    <hr class="short-divider">

                    <div class="price-box">
                        <!-- <span class="product-price">$15.00 &ndash; </span> -->
                        <span class="product-price">$<?= $product['price'] ?></span>
                    </div>
                    <!-- End .price-box -->

                    <div class="product-desc">
                        <p>
                            <?= $product['description'] ?>
                        </p>
                    </div>
                    <!-- End .product-desc -->

                    <ul class="single-info-list">
                        <!---->
                        <li>
                            SKU:
                            <strong><?= $product['sku'] ?></strong>
                        </li>

                        <li>
                            CATEGORY:
                            <strong>
                                <?php foreach ($categories as $category) : ?>
                                    <a href="#" class="product-category"><?= $category['name'] ?></a>
                                <?php endforeach ?>
                            </strong>
                        </li>

                        <li>
                            TAGs:

                            <strong><a href="#" class="product-category"><?= join(', ', $tag) ?></a></strong>

                        </li>
                    </ul>

                    <div class="product-filters-container">
                        <div class="product-single-filter">
                            <label>Color:</label>
                            <ul class="config-size-list config-color-list config-filter-list" id="colorList">
                                <?php foreach ($colors as $color) : ?>
                                    <li>
                                        <a href="" type="radio" id="color" class="filter-color border-0"
                                           style="background-color: <?= $color['color'] ?>;"
                                           aria-valuenow="<?= $color['id'] ?>"></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>

                        <div class="product-single-filter">
                            <label>Size:</label>
                            <ul class="config-size-list" id="sizeList">
                                <?php foreach ($sizes as $size) : ?>
                                    <li>
                                        <a href="" type="radio" id="size"
                                           class="d-flex align-items-center justify-content-center"
                                           aria-valuenow="<?= $size['id'] ?>"><?= $size['name'] ?></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>

                        <div class="product-single-filter">
                            <label></label>
                            <a class="font1 text-uppercase clear-btn" href="#">Clear</a>

                            <hr class="mt-2 mb-2"/>

                            <div class="price-box product-price mb-0">
                                <!-- <del class="old-price"><span>$286.00</span></del> -->
                                $<span id="price"></span>
                                <h5 class="mt-1 mb-0">
                                    <small><i class="text-danger" style="font-weight: normal;" id="message"></i></small>
                                </h5>
                            </div>
                        </div>
                        <!---->
                    </div>

                    <div class="product-action">
                        <!-- <div class="price-box product-single-filter">
                                    <del class="old-price"><span>$286.00</span></del>
                                    <span class="product-price">$245.00</span>
                                </div> -->

                        <div class="product-single-qty">
                            <input class="horizontal-quantity form-control" type="text" id="qty">
                        </div>

                        <a href="" class="btn btn-dark add-cart mr-2" id="addToCart" title="Add to Cart">Add to Cart</a>

                        <a href="<?= url_to('product-cart') ?>" class="btn btn-gray view-cart d-none">View cart</a>
                    </div>
                    <!-- End .product-action -->

                    <hr class="divider mb-0 mt-0">

                    <div class="product-single-share mb-2">
                        <label class="sr-only">Share:</label>

                        <div class="social-icons mr-2">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                               title="Facebook"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                               title="Twitter"></a>
                            <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                               title="Linkedin"></a>
                            <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                               title="Google +"></a>
                            <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                        </div>
                        <!-- End .social-icons -->

                        <a href="wishlist.html" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
                                class="icon-wishlist-2"></i><span>Add toWishlist</span></a>
                    </div>
                    <!-- End .product single-share -->
                </div>
                <!-- End .product-single-details -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .product-single-container -->

        <div class="product-single-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content"
                       role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content" role="tab"
                       aria-controls="product-size-content" aria-selected="true">Size Guide</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab"
                       aria-controls="product-tags-content" aria-selected="false">Additional Information</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content"
                       role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (1)</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                     aria-labelledby="product-tab-desc">
                    <div class="product-desc-content">
                        <?= $product['description'] ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="product-size-content" role="tabpanel" aria-labelledby="product-tab-size">
                    <div class="product-size-content">
                        <?php
                        $str = $product['size_guide'];
                        echo html_entity_decode($str);
                        ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                    <?php
                    $str = $product['additional_info'];
                    echo html_entity_decode($str);
                    ?>
                </div>

                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel"
                     aria-labelledby="product-tab-reviews">
                    <div class="product-reviews-content">
                        <h3 class="reviews-title">1 review for Men Black Sports Shoes</h3>

                        <div class="comment-list">
                            <div class="comments">
                                <figure class="img-thumbnail">
                                    <img src="<?= base_url('assets/images/blog/author.jpg') ?>" alt="author" width="80"
                                         height="80">
                                </figure>

                                <div class="comment-block">
                                    <div class="comment-header">
                                        <div class="comment-arrow"></div>

                                        <div class="ratings-container float-sm-right">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:60%"></span>

                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>

                                        </div>

                                        <span class="comment-by"><strong>Joe Doe</strong> – April 12, 2018</span>
                                    </div>

                                    <div class="comment-content">
                                        <p>Excellent.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="add-product-review">
                            <h3 class="review-title">Add a review</h3>

                            <form action="#" class="comment-form m-0">
                                <div class="rating-form">
                                    <label for="rating">Your rating <span class="required">*</span></label>
                                    <span class="rating-stars">
                                    <a class="star-1" href="#">1</a>
                                    <a class="star-2" href="#">2</a>
                                    <a class="star-3" href="#">3</a>
                                    <a class="star-4" href="#">4</a>
                                    <a class="star-5" href="#">5</a>
                                </span>

                                    <select name="rating" id="rating" required="" style="display: none;">
                                        <option value="">Rate…</option>
                                        <option value="5">Perfect</option>
                                        <option value="4">Good</option>
                                        <option value="3">Average</option>
                                        <option value="2">Not that bad</option>
                                        <option value="1">Very poor</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Your review <span class="required">*</span></label>
                                    <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="form-group">
                                            <label>Name <span class="required">*</span></label>
                                            <input type="text" class="form-control form-control-sm" required>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-xl-12">
                                        <div class="form-group">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="text" class="form-control form-control-sm" required>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="save-name"/>
                                            <label class="custom-control-label mb-0" for="save-name">
                                                Save my name, email, and website in this browser for the next time I
                                                comment.
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit">
                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!-- End .product-single-tabs -->

        <!-- <div class="products-section pt-0">
                        <h2 class="section-title">Related Products</h2>

                        <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                            <div class="product-default">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/product-1.jpg" width="280" height="280" alt="product">
                                        <img src="assets/images/products/product-1-2.jpg" width="280" height="280" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-20%</div>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">Category</a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="product.html">Ultimate 3D Bluetooth Speaker</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:80%"></span>

                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>

                                    </div>

                                    <div class="price-box">
                                        <del class="old-price">$59.00</del>
                                        <span class="product-price">$49.00</span>
                                    </div>

                                    <div class="product-action">
                                        <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        <a href="product.html" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT
                                                OPTIONS</span></a>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div> -->

        <!-- End .products-section -->

        <!-- <hr class="mt-0 m-b-5" /> -->

        <!-- <div class="product-widgets-container row pb-2">
                        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                            <h4 class="section-sub-title">Featured Products</h4>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-1.jpg" width="74" height="74" alt="product">
                                        <img src="assets/images/products/small/product-1-2.jpg" width="74" height="74" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Ultimate 3D Bluetooth Speaker</a>
                                    </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>

                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>

                                    </div>

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                            <h4 class="section-sub-title">Best Selling Products</h4>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-4.jpg" width="74" height="74" alt="product">
                                        <img src="assets/images/products/small/product-4-2.jpg" width="74" height="74" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Blue Backpack for the Young - S</a>
                                    </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>

                                            <span class="tooltiptext tooltip-top">5.00</span>
                                        </div>

                                    </div>

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                            <h4 class="section-sub-title">Latest Products</h4>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-7.jpg" width="74" height="74" alt="product">
                                        <img src="assets/images/products/small/product-7-2.jpg" width="74" height="74" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Brown-Black Men Casual Glasses</a>
                                    </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>

                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>

                                    </div>

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                            <h4 class="section-sub-title">Top Rated Products</h4>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-10.jpg" width="74" height="74" alt="product">
                                        <img src="assets/images/products/small/product-10-2.jpg" width="74" height="74" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Basketball Sports Blue Shoes</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>

                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>

                                    </div>


                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div> -->
        <!-- End .row -->
    </div>
    <!-- End .container -->


    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        let data = {
          color: '',
          size: ''
        };

        $('#color, #size').on('click', function() {
          if ($(this).attr('id') == 'color') {
            data.color = $(this).attr('aria-valuenow');
          }
          if ($(this).attr('id') == 'size') {
            data.size = $(this).attr('aria-valuenow');
          }

          if (color && size) {
            $.ajax({
              type: 'get',
              dataType: 'html',
              url: "<?= url_to('product-clientViewAjax', $product['id']) ?>",
              data: data,
              success: function(response) {
                if (response) {
                  var items = JSON.parse(response);

                  $('#price').html(items.price);
                  $('#message').html(items.message);
                }
              },
            });
          }
        });

        $('#addToCart').on('click', function() {
          var qty = $('#qty').val();
          var price = $('#price').text();
          var color = $('li.active #color').attr('aria-valuenow');
          var size = $('li.active #size').attr('aria-valuenow');

          if (qty && price) {
            $.ajax({
              type: 'get',
              dataType: 'html',
              url: "<?= url_to('product-addToCart', $product['id']) ?>",
              data: {
                'qty': qty,
                'price': price,
                'color': color,
                'size': size,
              },
              success: function(response) {
                if (response) {
                  var items = JSON.parse(response);

                  $('#name').html(items.product_name);
                  $('#message_1').html(items.message_1);

                  // if (items.isLogin) {
                  //   window.location.href = items.isLogin;
                  // }
                }
              },
            });
          }
        });
      });
    </script>

<?= $this->endSection() ?>