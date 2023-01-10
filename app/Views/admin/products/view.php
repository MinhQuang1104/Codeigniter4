<?= $this->extend('admin/master') ?>

<?= $this->section('header-content') ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= url_to('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Product Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"><?= $product['name'] ?></h3>
                    <div class="col-12">
                        <img src="<?= base_url($image['image']) ?>" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <?php foreach ($images as $image) : ?>
                            <div class="product-image-thumb active"><img src="<?= base_url($image['image']) ?>"
                                                                         alt="Product Image">
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3"><?= $product['name'] ?></h3>
                    <p><?= $product['description'] ?></p>
                    <hr>
                    <h4>Available Colors</h4>
                    <?php foreach ($colors as $color) : ?>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color" id="color" value="<?= $color['id'] ?>">
                                <?= $color['name'] ?>
                                <br>
                                <i class="fas fa-circle fa-2x" style="color: <?= $color['color'] ?>"></i>
                            </label>
                        </div>
                    <?php endforeach ?>

                    <h4 class="mt-3">Size <small>Please select one</small></h4>

                    <?php foreach ($sizes as $size) : ?>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-default text-center">
                                <input type="radio" name="size" id="size" autocomplete="off" value="<?= $size['id'] ?>">
                                <span class="text-xl"><?= $size['size'] ?></span>
                                <br>
                                <?= $size['name'] ?>
                            </label>
                        </div>
                    <?php endforeach ?>

                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            $<span id="price"><?= $product['price'] ?></span>
                        </h2>
                        <h4 class="mt-0">
                            <small id="message"></small>
                        </h4>
                    </div>

                    <div class="mt-4">
                        <div class="btn btn-primary btn-lg btn-flat">
                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                            Add to Cart
                        </div>

                        <div class="btn btn-default btn-lg btn-flat">
                            <a href="">
                                <i class="fas fa-heart fa-lg mr-2 text-gray"></i>
                                <span class="text-gray">Add to Wishlist</span>
                            </a>
                        </div>
                    </div>

                    <div class="mt-4 product-share">
                        <a href="#" class="text-gray">
                            <i class="fab fa-facebook-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fab fa-twitter-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fas fa-envelope-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fas fa-rss-square fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
                           role="tab" aria-controls="product-desc" aria-selected="true"
                        >Description</a>
                        <a class="nav-item nav-link" id="product-size-guide-tab" data-toggle="tab"
                           href="#product-size-guide" role="tab" aria-controls="product-size-guide"
                           aria-selected="false">Size Guide</a>
                        <a class="nav-item nav-link" id="product-info-tab" data-toggle="tab" href="#product-info"
                           role="tab" aria-controls="product-info" aria-selected="false">Additional Information</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating"
                           role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                    </div>
            </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                     aria-labelledby="product-desc-tab">
                    <?= $product['description'] ?>
                </div>
                <div class="tab-pane fade" id="product-size-guide" role="tabpanel"
                     aria-labelledby="product-size-guide-tab">
                    <?php
                    $str = $product['size_guide'];
                    echo html_entity_decode($str);
                    ?>
                </div>
                <div class="tab-pane fade" id="product-info" role="tabpanel" aria-labelledby="product-info-tab">
                    <?php
                    $str = $product['additional_info'];
                    echo html_entity_decode($str);
                    ?>
                </div>
                <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                    ...
                </div>
            </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
          var $image_element = $(this).find('img');
          $('.product-image').prop('src', $image_element.attr('src'));
          $('.product-image-thumb.active').removeClass('active');
          $(this).addClass('active');
        });

        $('#color, #size').on('click', function() {
          var color = $('input:radio[name="color"]:checked').val();
          var size = $('input:radio[name="size"]:checked').val();

          if (color && size) {
            $.ajax({
              type: 'get',
              dataType: 'html',
              url: "<?= url_to('product-viewAjax', $product['id']) ?>",
              data: {
                'color': color,
                'size': size,
              },
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

      });
    </script>

<?= $this->endSection() ?>