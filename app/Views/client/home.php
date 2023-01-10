<?= $this->extend('client/master') ?>

<?= $this->section('content') ?>
    <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase"
         data-owl-options="{
				'loop': false
			}"
    >
        <div class="home-slide home-slide1 banner">
            <img class="slide-bg" src="assets/images/demoes/demo4/slider/slide-1.jpg" width="1903" height="499"
                 alt="slider image"
            >
            <div class="container d-flex align-items-center">
                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                    <h4 class="text-transform-none m-b-3">Find the Boundaries. Push Through!</h4>
                    <h2 class="text-transform-none mb-0">Summer Sale</h2>
                    <h3 class="m-b-3">70% Off</h3>
                    <h5 class="d-inline-block mb-0">
                        <span>Starting At</span>
                        <b class="coupon-sale-text text-white bg-secondary align-middle"><sup>$</sup><em
                                class="align-text-top"
                            >199</em><sup>99</sup></b>
                    </h5>
                    <a href="category.html" class="btn btn-dark btn-lg">Shop Now!</a>
                </div>
                <!-- End .banner-layer -->
            </div>
        </div>
        <!-- End .home-slide -->

        <div class="home-slide home-slide2 banner banner-md-vw">
            <img class="slide-bg" style="background-color: #ccc;" width="1903" height="499"
                 src="assets/images/demoes/demo4/slider/slide-2.jpg" alt="slider image"
            >
            <div class="container d-flex align-items-center">
                <div class="banner-layer d-flex justify-content-center appear-animate"
                     data-animation-name="fadeInUpShorter"
                >
                    <div class="mx-auto">
                        <h4 class="m-b-1">Extra</h4>
                        <h3 class="m-b-2">20% off</h3>
                        <h3 class="mb-2 heading-border">Accessories</h3>
                        <h2 class="text-transform-none m-b-4">Summer Sale</h2>
                        <a href="category.html" class="btn btn-block btn-dark">Shop All Sale</a>
                    </div>
                </div>
                <!-- End .banner-layer -->
            </div>
        </div>
        <!-- End .home-slide -->
    </div>
    <!-- End .home-slider -->

    <section class="featured-products-section">
        <div class="container">
            <h2 class="section-title heading-border ls-20 border-0">Featured Products</h2>

            <div
                class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center"
                data-owl-options="{
						'dots': false,
						'nav': true
					}">
                <?php foreach ($products as $product) : ?>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>

                            <a href="<?= url_to('product-clientView', $product['id']) ?>">
                                <img src="<?= base_url($product['image'][0]) ?>" width="280" height="280" alt="product">
                                <img src="<?= base_url($product['image'][1]) ?>" width="280" height="280" alt="product">
                            </a>

                            <div class="label-group">
                                <?php if ($product['hot'] == TRUE) : ?>
                                    <div class="product-label label-hot">HOT</div>
                                <?php else : ?>
                                    <div class="hidden" class="product-label label-hot"></div>
                                <?php endif ?>
                                <div class="product-label label-sale">-<?= $product['discount'] ?>%</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="category.html" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="<?= url_to('product-clientView', $product['id']) ?>"><?= $product['name'] ?></a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <del class="old-price">$<?= $product['old_price'] ?></del>
                                <span class="product-price">$<?= $product['price'] ?></span>
                            </div>
                            <!-- End .price-box -->
                            <div class="product-action">
                                <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"
                                    ></i></a>
                                <a href="<?= url_to('product-clientView', $product['id']) ?>"
                                   class="btn-icon btn-add-cart"><i
                                        class="fa fa-arrow-right"></i><span>SELECT OPTIONS</span></a>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                        <!-- End .product-details -->
                    </div>
                <?php endforeach ?>
            </div>
            <!-- End .featured-proucts -->
        </div>
    </section>

    <section class="feature-boxes-container">
        <div class="container appear-animate" data-animation-name="fadeInUpShorter">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-earphones-alt"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>Customer Support</h3>
                            <h5>You Won't Be Alone</h5>

                            <p>We really care about you and your website as much as you do. Purchasing Porto or any
                               other theme from us you get 100% free support.</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-credit-card"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>Fully Customizable</h3>
                            <h5>Tons Of Options</h5>

                            <p>With Porto you can customize the layout, colors and styles within only a few minutes.
                               Start creating an amazing website right now!</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-action-undo"></i>
                        </div>
                        <div class="feature-box-content p-0">
                            <h3>Powerful Admin</h3>
                            <h5>Made To Help You</h5>

                            <p>Porto has very powerful admin features to help customer to build their own shop in
                               minutes without any special skills in web development.</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container-->
    </section>
    <!-- End .feature-boxes-container -->

    <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}"
             data-image-src="assets/images/demoes/demo4/banners/banner-5.jpg">
        <div class="promo-banner banner container text-uppercase">
            <div class="banner-content row align-items-center text-center">
                <div class="col-md-4 ml-xl-auto text-md-right appear-animate" data-animation-name="fadeInRightShorter"
                     data-animation-delay="600">
                    <h2 class="mb-md-0 text-white">Top Fashion<br>Deals</h2>
                </div>
                <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn"
                     data-animation-delay="300">
                    <a href="category.html" class="btn btn-dark btn-black ls-10">View Sale</a>
                </div>
                <div class="col-md-4 mr-xl-auto text-md-left appear-animate" data-animation-name="fadeInLeftShorter"
                     data-animation-delay="600">
                    <h4 class="mb-1 mt-1 font1 coupon-sale-text p-0 d-block ls-n-10 text-transform-none">
                        <b>Exclusive COUPON</b>
                    </h4>
                    <h5 class="mb-1 coupon-sale-text text-white ls-10 p-0"><i class="ls-0">UP TO</i><b
                            class="text-white bg-secondary ls-n-10">$100</b> OFF</h5>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>