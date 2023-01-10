<?= $this->extend('client/master') ?>

<?= $this->section('content') ?>
    <div class="container">
        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li class="active">
                <a href="<?= route_to('product-cart') ?>">Shopping Cart</a>
            </li>
            <li>
                <a href="<?= route_to('product-checkout') ?>">Checkout</a>
            </li>
            <li class="disabled">
                <a href="">Order Complete</a>
            </li>
        </ul>

        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                    <table class="table table-cart">
                        <thead>
                        <tr>
                            <th class="thumbnail-col"></th>
                            <th class="product-col">Product</th>
                            <th class="price-col">Color</th>
                            <th class="price-col">Size</th>
                            <th class="price-col">Price</th>
                            <th class="qty-col">Quantity</th>
                            <th class="text-right">Subtotal</th>
                        </tr>
                        </thead>
                        <tbody id="table-cart-body">
                        <?php if ($cart_products) : ?>
                            <?php
                            foreach ($cart_products as $cart_product) : ?>
                                <tr class="product-row">
                                    <td>
                                        <figure class="product-image-container">
                                            <a href="" class="product-image">
                                                <img src="<?= base_url($cart_product['product_image']) ?>"
                                                     alt="product">
                                            </a>

                                            <a href="" id="<?= $cart_product['id'] ?>" class="btn-remove icon-cancel"
                                               title="Remove Product"></a>
                                        </figure>
                                    </td>
                                    <td class="product-col">
                                        <h5 class="product-title">
                                            <a href=""><?= $cart_product['product_name'] ?></a>
                                        </h5>
                                    </td>
                                    <td><?= $cart_product['product_color'] ?></td>
                                    <td><?= $cart_product['product_size'] ?></td>
                                    <td id="price">$<?= $cart_product['product_price'] ?></td>
                                    <td>
                                        <div class="product-single-qty">
                                            <input class="horizontal-quantity form-control"
                                                   id="<?= $cart_product['id'] ?>" type="text" name="qty"
                                                   value="<?= $cart_product['product_qty'] ?>">
                                        </div><!-- End .product-single-qty -->
                                    </td>

                                    <td class="text-right">
                                        <span class="subtotal-price" id="subtotal-price">
                                            $<?= $cart_product['product_subtotal'] ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php
                            endforeach; ?>
                        <?php
                        endif; ?>
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="5" class="clearfix">
                                <div class="float-left">
                                    <div class="cart-discount">
                                        <!-- <form action="#"> -->
                                        <div class="input-group">
                                            <input type="text" id="coupon" class="form-control form-control-sm"
                                                   placeholder="Coupon Code">
                                            <div class="input-group-append">
                                                <button id="apply-coupon" class="btn btn-sm" type="submit">
                                                    Apply Coupon
                                                </button>
                                            </div>
                                        </div><!-- End .input-group -->
                                        <!-- </form>-->
                                    </div>
                                </div><!-- End .float-left -->

                                <div class="float-right">
                                    <button type="submit" class="btn btn-shop btn-update-cart">
                                        Update Cart
                                    </button>
                                </div><!-- End .float-right -->
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- End .cart-table-container -->
            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h3>CART TOTALS</h3>
                    <table class="table table-totals">
                        <tbody>
                        <tr>
                            <td>Subtotal</td>
                            <td id="subtotal">$<?= $subtotal ?></td>
                        </tr>

                        <tr>
                            <td colspan="2" class="text-left">
                                <h4>Shipping</h4>
                                <div class="form-group form-group-custom-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="local-pickup"
                                               value="local-pickup" name="radio" checked>
                                        <label class="custom-control-label">Local pickup</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-group -->

                                <div class="form-group form-group-custom-control mb-0">
                                    <div class="custom-control custom-radio mb-0">
                                        <input type="radio" class="custom-control-input" id="flat-rate"
                                               value="flat-rate" name="radio">
                                        <label class="custom-control-label">Flat rate</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-group -->

                                <form action="#">
                                    <div class="form-group form-group-sm">
                                        <label>Shipping to <strong>NY.</strong></label>
                                        <div class="select-custom">
                                            <select class="form-control form-control-sm" name="country" id="country">
                                                <option value="USA">United States (US)</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="China">China</option>
                                                <option value="Germany">Germany</option>
                                                <option value="VietNam">Viet Nam</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-sm">
                                        <div class="select-custom">
                                            <select class="form-control form-control-sm" name="city" id="city">
                                                <option value="NY">New York</option>
                                                <option value="CA">California</option>
                                                <option value="TX">Texas</option>
                                                <option value="HCM">Ho Chi Minh</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-sm">
                                        <input type="text" id="county" name="county"
                                               class="form-control form-control-sm"
                                               placeholder="Town / County">
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-sm">
                                        <input type="text" id="postcode" name="zip" class="form-control form-control-sm"
                                               placeholder="ZIP">
                                    </div><!-- End .form-group -->

                                    <a id="submit" class="btn btn-shop btn-update-total">
                                        Update Totals
                                    </a>
                                </form>
                            </td>
                        </tr>
                        </tbody>

                        <tfoot>
                        <tr id="rowDiscount" style="display: none">
                            <td style="font-size: small">Coupon</td>
                            <td id="discount" style="font-size:1.6rem; font-weight:600;"></td>
                        </tr>
                        <tr id="rowFlatRate" style="display: none">
                            <td style="font-size: small">Flat Shipping Rate</td>
                            <td id="shipping-price" style="font-size:1.6rem; font-weight:600;"></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td id="total">$<?= $subtotal ?></td>
                        </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-methods">
                        <button id="checkout" class="btn btn-block btn-dark">
                            Proceed to Checkout
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div><!-- End .cart-summary -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        // Use Coupon
        $('#apply-coupon').on('click', function() {
          var coupon = $('#coupon').val();

          if (coupon) {
            $.ajax({
              type: 'get',
              dataType: 'html',
              url: "<?= base_url('coupon-product'); ?>",
              data: {
                'coupon': coupon,
              },
              success: function(response) {
                if (response) {
                  var items = JSON.parse(response);
                  $('#discount').html('$-' + items.discount);
                  $('#rowDiscount').show();
                }
              },
            });
          }
        });

        // Set Shipping Price
        $('input[name="radio"]').click(function() {
          if ($(this).val() === 'flat-rate') {
            var flat_rate = $('#flat-rate').val();

            $.ajax({
              type: 'get',
              dataType: 'html',
              url: "<?= base_url('shipping-product'); ?>",
              data: {
                'flat_rate': flat_rate,
              },
              success: function(response) {
                if (response) {
                  var items = JSON.parse(response);
                  var shipping_price = Math.round(items.flat_rate * 1000 + Number.EPSILON) / 1000;
                  $('#shipping-price').html('$' + shipping_price);
                  $('#rowFlatRate').show();
                }
              },
            });
          } else {
            $('#shipping-price').html('$' + 0);
            $('#rowFlatRate').hide();
          }
        });

        // Update Product Quantity
        $('input[name="qty"]').on('change', function() {
          let data = {
            product: [],
          };

          var product = [];
          // product.push({"pdt_id": $(this).attr('id'), "qty": $(this).val()});
          product.push([$(this).attr('id'), $(this).val()]);

          $.each(product, function(key, value) {
            data.product[key] = value;
          });

          $('.btn-update-cart').click(function() {
            if (data) {
              $.ajax({
                type: 'get',
                dataType: 'json',
                url: "<?= base_url('update-quantity'); ?>",
                data: data,
                success: function(response) {
                  if (response) {
                    const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,
                      didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                      },
                    });

                    Toast.fire({
                      icon: 'success',
                      title: response.message,
                    });
                  }
                },
              });
            }
          });
        });

        // Update Cart Total
        $('.btn-update-cart').click(function() {
          var price_subtotal = 0;
          var sub = 0;

          $('#table-cart-body tr').each(function(i) {
            var price = $('td:nth-child(5)', this).text().slice(1, 11);
            var qty_input = $('td:nth-child(6) input', this).val();

            // Cal Price-Subtotal
            price_subtotal = price * qty_input;
            $('td:nth-child(7)', this).text('$' + price_subtotal);

            // Cal Subtotal
            sub += price_subtotal;
            var subtotal = Math.round(sub * 1000 + Number.EPSILON) / 1000;
            $('#subtotal').html('$' + subtotal);
          });

          // Cal Total
          var subtotal = +$('#subtotal').text().slice(1, 11);
          var coupon = +$('#discount').text().slice(2, 11);
          var shipping = +$('#shipping-price').text().slice(1, 11);
          var total = subtotal - coupon + shipping;
          var totalPrice = Math.round(total * 1000 + Number.EPSILON) / 1000;
          $('#total').html('$' + totalPrice);
        });

        // Update Total Price By Shipping Address
        $('#submit').click(function() {
          var subtotal = +$('#subtotal').text().slice(1, 11);
          var coupon = +$('#discount').text().slice(2, 11);
          var shipping = +$('#shipping-price').text().slice(1, 11);
          var total = subtotal - coupon + shipping;
          var totalPrice = Math.round(total * 1000 + Number.EPSILON) / 1000;
          $('#total').html('$' + totalPrice);
        });

        // Get Coupon and Shipping Price
        $('#checkout').on('click', function() {
          var coupon = $('#discount').text().replace('$-', '');
          var subtotal = $('#subtotal').text().replace('$', '');
          var shipping = $('#shipping-price').text().replace('$', '');
          var country = $('#country').find(':selected').text();
          var city = $('#city').find(':selected').text();
          var county = $('#county').val();
          var postcode = $('#postcode').val();
          var total = $('#total').text().replace('$', '');

          $.ajax({
            type: 'get',
            dataType: 'json',
            url: "<?= url_to('product-updateCart', $id) ?>",
            data: {
              'coupon': coupon,
              'subtotal': subtotal,
              'shipping': shipping,
              'country': country,
              'city': city,
              'county': county,
              'zip': postcode,
              'total': total,
            },
            success: function(response) {
              if (response) {
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                  },
                });

                Toast.fire({
                  icon: 'success',
                  title: response.message,
                });

                window.location.href = '<?= base_url() ?>/checkout-product';
              }
            },
          });
        });

        // Remove product from cart
        $('.btn-remove').on('click', function() {
          var id = $(this).attr('id');

          $.ajax({
            type: 'get',
            dataType: 'json',
            url: "<?= base_url('remove-product'); ?>",
            data: {
              'id': id,
            },
            success: function(response) {
              if (response) {
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                  },
                });

                Toast.fire({
                  icon: 'success',
                  title: response.message,
                });
              }
            },
          });
        });

      });
    </script>
    <?= $this->endSection() ?>