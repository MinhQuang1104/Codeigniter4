<?= $this->extend('admin/master') ?>

<?= $this->section('header-content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Order Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('index.order') ?>">Order</a></li>
                    <li class="breadcrumb-item active">Create New</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create New Order</h3>
        </div>
        <form action="" method="post">
            <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"/>
            <div class="card-body">

                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 row-cols-xl-3">
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="form-control border d-flex justify-content-start align-items-center"
                                 style="height: auto; background-color: #e9ecef">
                                <div style="font-size: 1.015625rem; font-weight: 300;"><strong>Invoice</strong><br/>
                                    <span id="invoice-value"></span>
                                </div>
                            </div>
                            <button type="button" id="button-invoice" data-bs-toggle="tooltip" title="Generate"
                                    class="btn btn-outline-primary">
                                <i style="font-size: 15px" class="fa-solid fas fa-cog"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="form-control border d-flex justify-content-start align-items-center"
                                 style="height: auto; background-color: #e9ecef">
                                <div style="font-size: 1.015625rem; font-weight: 300;"><strong>Customer</strong><br/>
                                    <div id="customer-value"></div>
                                </div>
                            </div>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-customer"
                                    class="btn btn-outline-primary">
                                <i style="font-size: 15px" class="fa-solid fas fa-cog"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col">
                        <div class="p-0 border rounded mb-3">
                            <div class="p-2"
                                 style="font-size: 1.015625rem; font-weight: 300; background-color: #e9ecef">
                                <strong>Date Added</strong><br/>
                                <?= date("d-m-Y"); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th class="col-sm-2">Product Name</th>
                            <th class="col-sm-2">Color</th>
                            <th class="col-sm-2">Size</th>
                            <th class="col-sm-2">Quantity</th>
                            <th class="col-sm-2">Unit Price</th>
                            <th class="col-sm-2">Subtotal</th>
                            <th>
                                <button type="button" id="addRow" class="btn btn-success btn-default"
                                        data-toggle="modal" data-target="#modal-default">+
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="dynamicadd"></tbody>
                    </table>

                    <div id="collapse-order" class="collapse mb-2">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">

                            <!--                            <div class="col mb-2">-->
                            <!--                                <form id="form-currency" class="mb-3">-->
                            <!--                                    <div class="form-floating">-->
                            <!--                                        <select name="currency" id="input-currency" class="form-select">-->
                            <!--                                            <option value="EUR">Euro</option>-->
                            <!--                                            <option value="GBP">Pound Sterling</option>-->
                            <!--                                            <option value="USD" selected="selected">US Dollar</option>-->
                            <!--                                        </select> <label for="input-currency">Currency</label>-->
                            <!--                                    </div>-->
                            <!--                                </form>-->
                            <!--                            </div>-->

                            <div class="col mb-2">
                                <form id="form-coupon" class="mb-3">
                                    <div class="input-group form-floating">
                                        <input type="text" name="coupon" placeholder="Coupon" id="coupon-code"
                                               class="form-control"/>
                                        <label for="input-coupon">Coupon</label>
                                        <button type="button" id="button-coupon" data-bs-toogle="tooltip" title="Apply"
                                                class="btn btn-outline-primary">
                                            <i style="font-size: 11px" class="fa-solid fas fa-check"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <button type="button" id="button-collapse" class="btn btn-light btn-lg w-100 mb-3">More.. <i
                            style="font-size: 15px" class="fa-solid fas fa-chevron-down"></i>
                    </button>

                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="form-control border d-flex justify-content-start align-items-center"
                                     style="height: auto; background-color: #e9ecef">
                                    <div style="font-size: 1.015625rem; font-weight: 300;">
                                        <strong>Payment Address</strong><br/>
                                        <div id="payment-address-value"></div>
                                    </div>
                                </div>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-payment-address"
                                        class="btn btn-outline-primary">
                                    <i style="font-size: 13px" class="fa-solid fas fa-cog"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="form-control border d-flex justify-content-start align-items-center"
                                     style="height: auto; background-color: #e9ecef">
                                    <div style="font-size: 1.015625rem; font-weight: 300;">
                                        <strong>Shipping Address</strong><br/>
                                        <div id="shipping-address-value"></div>
                                    </div>
                                </div>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-shipping-address"
                                        class="btn btn-outline-primary">
                                    <i style="font-size: 13px" class="fa-solid fas fa-cog"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div id="payment-method" class="col-md">
                            <form id="form-payment-method">
                                <div class="input-group form-floating">
                                    <select name="payment_method" id="input-payment-method" class="form-select">
                                        <option value=""> --- Please Select ---</option>
                                        <option value="cod">Cash On Delivery</option>
                                    </select> <label for="input-payment-method">Payment Method</label>
                                    <button type="button" id="button-payment-method" class="btn btn-outline-primary">
                                        <i style="font-size: 13px" class="fa-solid fas fa-sync-alt"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div id="shipping-method" class="col-md">
                            <form id="form-shipping-method">
                                <div class="input-group form-floating">
                                    <select name="shipping_method" id="input-shipping-method" class="form-select">
                                        <option value=""> --- Please Select ---</option>
                                        <option value="cod">Flat Shipping Rate</option>
                                    </select> <label for="input-shipping-method">Shipping Method</label>
                                    <button type="button" id="button-shipping-method" class="btn btn-outline-primary">
                                        <i style="font-size: 13px" class="fa-solid fas fa-sync-alt"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col">
                            <div class="input-group">
                                <div class="form-control border d-flex justify-content-start align-items-center"
                                     style="height: auto; background-color: #e9ecef">
                                    <div style="font-size: 1.015625rem; font-weight: 300;">
                                        <strong>Comment</strong><br/>
                                        <span id="comment-value"></span>
                                    </div>
                                </div>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-comment"
                                        class="btn btn-outline-primary">
                                    <i style="font-size: 13px" class="fa-solid fas fa-cog"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <tbody id="order-totals">
                        <tr id="subtotal" style="display: none">
                            <td class="text-end"><strong>Sub-Total:</strong></td>
                            <td class="text-start" id="row-subtotal" style="width: 10px;"></td>
                        </tr>
                        <tr id="coupon" style="display: none">
                            <td class="text-end"><strong>Coupon:</strong></td>
                            <td class="text-start" id="row-coupon" style="width: 1px;"></td>
                        </tr>
                        <tr id="flat-rate" style="display: none">
                            <td class="text-end"><strong>Flat Shipping Rate:</strong></td>
                            <td class="text-start" id="row-flat-rate" style="width: 1px;"></td>
                        </tr>
                        <tr id="total" style="display: none">
                            <td class="text-end"><strong>Total:</strong></td>
                            <td class="text-start" id="row-total" style="width: 1px;">$0</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<!--Add Item Modal-->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-product-add">
                <div class="modal-header">
                    <h4 class="modal-title">Add Item</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="d-flex">Product</label>
                        <select class="form-control" name="product" id="name">
                            <option></option>
                            <?php foreach ($products as $product) : ?>
                                <option value="<?= $product['id'] ?>">
                                    <?= $product['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group" id="option" style="display: none">
                        <label class="d-flex">Option(s)</label>
                        <select class="form-control" name="options" id="options"></select>
                    </div>
                    <div class="form-group">
                        <label class="d-flex">Quantity</label>
                        <input type="text" class="form-control" id="qty" name="qty" value="1">
                    </div>
                    <div class="form-group">
                        <label class="d-flex">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="0"
                               disabled>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" id="button-product-add" id="add-item" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Add Customer Modal-->
<div id="modal-customer" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Customer</h5>
                <button type="button" style="font-size: 13px;" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="form-customer">
                    <div class="mb-3">
                        <label for="input-customer" class="form-label">Customer</label>
                        <div class="input-group">
                            <select class="form-control" name="customer" id="customer">
                                <option>--- None ---</option>
                                <?php foreach ($customers as $customer) : ?>
                                    <option value="<?= $customer['id'] ?>">
                                        <?= $customer['first_name'].' '.$customer['last_name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <a href="<?= url_to('customer-create') ?>" target="_blank" data-bs-toggle="tooltip"
                               title="Add Customer"
                               class="btn btn-outline-secondary"><i class="fa-solid fas fa-user-plus"></i></a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="input-firstname" class="form-label">First Name</label>
                        <input type="text" name="firstname" placeholder="First Name" id="input-firstname"
                               class="form-control" required/>
                        <div id="error-firstname" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-lastname" class="form-label">Last Name</label>
                        <input type="text" name="lastname" placeholder="Last Name" id="input-lastname"
                               class="form-control" required/>
                        <div id="error-lastname" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-email" class="form-label">E-Mail</label>
                        <div class="input-group">
                            <input type="text" name="email" placeholder="E-Mail" id="input-email"
                                   class="form-control" required/> <a href="mailto:"
                                                                      class="btn btn-outline-secondary"><i
                                    class="fa-solid fas fa-envelope"></i></a>
                        </div>
                        <div id="error-email" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-telephone" class="form-label">Telephone</label>
                        <input type="text" name="telephone" placeholder="Telephone" id="input-telephone"
                               class="form-control"/>
                        <div id="error-telephone" class="invalid-feedback"></div>
                    </div>
                    <div class="text-end">
                        <button type="button" id="button-customer" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Add Payment Address Modal-->
<div id="modal-payment-address" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Customer</h5>
                <button type="button" style="font-size: 13px;" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="form-customer">
                    <!--                    <div class="mb-3">-->
                    <!--                        <label for="input-customer" class="form-label">Choose Address</label>-->
                    <!--                        <div class="input-group">-->
                    <!--                            <select class="form-control" name="customer" id="customer">-->
                    <!--                                <option>--- None ---</option>-->
                    <!--                                --><?php //foreach ($customers as $customer) : ?>
                    <!--                                    <option value="--><? //= $customer['id'] ?><!--">-->
                    <!--                                        --><? //= $customer['first_name'].' '.$customer['last_name'] ?>
                    <!--                                    </option>-->
                    <!--                                --><?php //endforeach; ?>
                    <!--                            </select>-->
                    <!--                            <a href="-->
                    <? //= url_to('customer-create') ?><!--" target="_blank" data-bs-toggle="tooltip"-->
                    <!--                               title="Add Customer"-->
                    <!--                               class="btn btn-outline-secondary"><i class="fa-solid fas fa-user-plus"></i></a>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <div class="mb-3">
                        <label for="input-firstname" class="form-label">First Name</label>
                        <input type="text" name="firstname" placeholder="First Name" id="input-firstname"
                               class="form-control" required/>
                        <div id="error-firstname" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-lastname" class="form-label">Last Name</label>
                        <input type="text" name="lastname" placeholder="Last Name" id="input-lastname"
                               class="form-control" required/>
                        <div id="error-lastname" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-company" class="form-label">Company</label>
                        <input type="text" name="company" placeholder="Company" id="input-company"
                               class="form-control" required/>
                        <div id="error-company" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-address-1" class="form-label">Address 1</label>
                        <input type="text" name="address1" placeholder="Address 1" id="input-address-1"
                               class="form-control" required/>
                        <div id="error-address-1" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-address-2" class="form-label">Address 2</label>
                        <input type="text" name="address2" placeholder="Address 2" id="input-address-2"
                               class="form-control" required/>
                        <div id="error-address-2" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-city" class="form-label">City</label>
                        <input type="text" name="city" placeholder="City" id="input-city"
                               class="form-control" required/>
                        <div id="error-city" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-postcode" class="form-label">Postcode</label>
                        <input type="text" name="postcode" placeholder="Postcode" id="input-postcode"
                               class="form-control" required/>
                        <div id="error-postcode" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-country" class="form-label">Country</label>
                        <input type="text" name="country" placeholder="Country" id="input-country"
                               class="form-control" required/>
                        <div id="error-country" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-county" class="form-label">Region / State</label>
                        <input type="text" name="county" placeholder="County" id="input-county"
                               class="form-control" required/>
                        <div id="error-county" class="invalid-feedback"></div>
                    </div>
                    <div class="text-end">
                        <button type="button" id="button-payment-address" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Add Shipping Address Modal-->
<div id="modal-shipping-address" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Customer</h5>
                <button type="button" style="font-size: 13px;" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="form-customer">
                    <!--                    <div class="mb-3">-->
                    <!--                        <label for="input-customer" class="form-label">Choose Address</label>-->
                    <!--                        <div class="input-group">-->
                    <!--                            <select class="form-control" name="customer" id="customer">-->
                    <!--                                <option>--- None ---</option>-->
                    <!--                                --><?php //foreach ($customers as $customer) : ?>
                    <!--                                    <option value="--><? //= $customer['id'] ?><!--">-->
                    <!--                                        --><? //= $customer['first_name'].' '.$customer['last_name'] ?>
                    <!--                                    </option>-->
                    <!--                                --><?php //endforeach; ?>
                    <!--                            </select>-->
                    <!--                            <a href="-->
                    <? //= url_to('customer-create') ?><!--" target="_blank" data-bs-toggle="tooltip"-->
                    <!--                               title="Add Customer"-->
                    <!--                               class="btn btn-outline-secondary"><i class="fa-solid fas fa-user-plus"></i></a>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <div class="mb-3">
                        <label for="input-firstname" class="form-label">First Name</label>
                        <input type="text" name="firstname" placeholder="First Name" id="input-firstname"
                               class="form-control" required/>
                        <div id="error-firstname" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-lastname" class="form-label">Last Name</label>
                        <input type="text" name="lastname" placeholder="Last Name" id="input-lastname"
                               class="form-control" required/>
                        <div id="error-lastname" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-company" class="form-label">Company</label>
                        <input type="text" name="company" placeholder="Company" id="input-company"
                               class="form-control" required/>
                        <div id="error-company" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-address-1" class="form-label">Address 1</label>
                        <input type="text" name="address1" placeholder="Address 1" id="input-address-1"
                               class="form-control" required/>
                        <div id="error-address-1" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-address-2" class="form-label">Address 2</label>
                        <input type="text" name="address2" placeholder="Address 2" id="input-address-2"
                               class="form-control" required/>
                        <div id="error-address-2" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-city" class="form-label">City</label>
                        <input type="text" name="city" placeholder="City" id="input-city"
                               class="form-control" required/>
                        <div id="error-city" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-postcode" class="form-label">Postcode</label>
                        <input type="text" name="postcode" placeholder="Postcode" id="input-postcode"
                               class="form-control" required/>
                        <div id="error-postcode" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-country" class="form-label">Country</label>
                        <input type="text" name="country" placeholder="Country" id="input-country"
                               class="form-control" required/>
                        <div id="error-country" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="input-county" class="form-label">Region / State</label>
                        <input type="text" name="county" placeholder="County" id="input-county"
                               class="form-control" required/>
                        <div id="error-county" class="invalid-feedback"></div>
                    </div>
                    <div class="text-end">
                        <button type="button" id="button-shipping-address" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Add Comment Modal-->
<div id="modal-comment" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="form-comment">
                    <div class="mb-3">
                        <textarea name="comment" rows="5" placeholder="Comment" id="input-comment"
                                  class="form-control"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="button" id="button-comment" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {

    $('#name').on('change', function() {
      var id = $('#name').find(':selected').val();

      $.ajax({
        type: 'get',
        dataType: 'json',
        url: "<?= base_url('order/get-option') ?>",
        data: {
          'id': id,
        },
        success: function(response) {
          if (response) {
            var html = '';
            $.each(response.option, function(index, value) {
              html += `<option value="${value.option_id}">${value.option}</option>`;
            });
            $('#options').html('<option value="0"></option>' + html);
            $('#option').show();
          }
        },
      });
    });

    // Get select option
    $('#button-collapse').on('click', function() {
      var element = this;

      var target = $('#collapse-order');

      if (!target.is(':hidden')) {
        target.slideUp('400', function() {
          $(element).html('More.. <i style="font-size: 15px" class="fa-solid fas fa-chevron-down"></i>');
        });
      } else {
        target.slideDown('400', function() {
          $(element).html('Less.. <i style="font-size: 15px" class="fa-solid fas fa-chevron-up"></i>');
        });
      }
    });

    // Get price option
    $('#options').on('change', function() {
      var product_id = $('#name').find(':selected').val();
      var option_id = $('#options').find(':selected').val();

      $.ajax({
        type: 'get',
        dataType: 'json',
        url: "<?= base_url('order/get-priceOption') ?>",
        data: {
          'product_id': product_id,
          'option_id': option_id,
        },
        success: function(response) {
          if (response) {
            $('#price').val(response.price);
          }
        },
      });
    });

    // Add Item Product
    $('#button-product-add').on('click', function() {
      var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
      var csrfHash = $('.txt_csrfname').val(); // CSRF hash
      var data = {
        [csrfName]: csrfHash,
        'product': $('#name').find(':selected').val(),
        'options': $('#options').find(':selected').val(),
        'qty': $('#qty').val(),
        'price': $('#price').val(),
      };

      $.ajax({
        type: 'post',
        dataType: 'json',
        url: "<?= base_url('order/add-item') ?>",
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

            $('.txt_csrfname').val(response.token);
            var html = '';
            html += `<tr id="row${response.id}">
                        <td>${response.name}</td>
                        <td>${response.color}</td>
                        <td>${response.size}</td>
                        <td>${response.qty}</td>
                        <td>${response.price}</td>
                        <td id="subtotal-item">${response.subtotal}</td>
                        <td>
                            <button type="button" id="${response.id}" class="btn btn-danger deleteRow">
                                 -
                            </button>
                        </td>
                    </tr>`;
            $('#dynamicadd').append(html);

            var sub = 0;
            $('#dynamicadd tr').each(function(i) {
              var subtotal = +$('#subtotal-item').text().replace('$', '');

              sub += subtotal;
              $('#row-subtotal').html('$' + sub);
            });

            var subtotal = +$('#row-subtotal').text().replace('$', '');
            var total = subtotal;

            $('#row-total').html('$' + total);

            $('#subtotal').show();
            $('#total').show();
          }
        },
      });
    });

    // Remove Item Product
    $(document).on('click', '.deleteRow', function() {
      var row_id = $(this).attr('id');

      $.ajax({
        type: 'get',
        dataType: 'json',
        url: "<?= base_url('order/remove-item') ?>",
        data: {
          'id': row_id,
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

            $('#row' + response.id + '').remove();
          }
        },
      });
    });

    // Add Coupon
    $('#button-coupon').on('click', function() {
      let data = {
        'coupon': $('#coupon-code').val(),
      };

      if (data) {
        $.ajax({
          type: 'get',
          dataType: 'json',
          url: "<?= base_url('order/add-coupon') ?>",
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

              $('#row-coupon').html('$' + response.coupon);
              var total = +$('#row-total').text().replace('$', '') + +response.coupon;
              $('#row-total').html('$' + total);
              $('#coupon').show();
              $('#total').show();
            }
          },
        });
      }
    });

    // Add Profile Customer
    $('#customer').on('change', function() {
      var id = $('#customer').find(':selected').val();

      if (id) {
        $.ajax({
          type: 'get',
          dataType: 'json',
          url: "<?= base_url('order/add-customer') ?>",
          data: {
            'id': id,
          },
          success: function(response) {
            if (response) {
              $('#input-firstname').val(response.customer['first_name']);
              $('#input-lastname').val(response.customer['last_name']);
              $('#input-email').val(response.customer['email']);
              $('#input-telephone').val(response.customer['phone_number']);
            }
          },
        });
      }
    });

    // Add Customer Default
    $('#button-customer').on('click', function() {
      let data = {
        'frist_name': $('#input-firstname').val(),
        'last_name': $('#input-lastname').val(),
      };

      if (data) {
        $('#customer-value').html(data.frist_name + ' ' + data.last_name);

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
          title: 'You have successfully modified customers',
        });
      }
    });

    // Add Comment
    $('#button-comment').on('click', function() {
      var comment = $('#input-comment').val();

      if (comment) {
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
          title: 'You have successfully modified comment',
        });

        $('#comment-value').html(comment);
      }
    });

  });
</script>
<?= $this->endSection() ?>
