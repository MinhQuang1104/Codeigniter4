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
                        <li class="breadcrumb-item"><a href="<?= url_to('index.product') ?>">Product</a></li>
                        <li class="breadcrumb-item active">Edit New</li>
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
                <h3 class="card-title">Create New Product</h3>
            </div>
            <div class="card-body">
                <?php
                $validation = \Config\Services::validation(); ?>
                <form action="<?= url_to('product-update', $product['id']) ?>" enctype="multipart/form-data"
                      method="post">
                    <?= csrf_field() ?>
                    <ul class="nav nav-tabs mb-3" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-product-tab" data-toggle="pill"
                               href="#custom-tabs-four-product" role="tab" aria-controls="custom-tabs-four-product"
                               aria-selected="true">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-detail-tab" data-toggle="pill"
                               href="#custom-tabs-four-detail" role="tab" aria-controls="custom-tabs-four-detail"
                               aria-selected="false">Detail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-image-tab" data-toggle="pill"
                               href="#custom-tabs-four-image" role="tab" aria-controls="custom-tabs-four-image"
                               aria-selected="false">Image</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-product" role="tabpanel"
                             aria-labelledby="custom-tabs-four-product-tab">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name"
                                               value="<?= $product['name'] ?>" placeholder="Enter ...">

                                        <?php if ($validation->hasError('name')) : ?>
                                            <span class="text-danger"><?= $validation->getError('name') ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Sku</label>
                                        <input type="text" class="form-control" name="sku"
                                               value="<?= $product['sku'] ?>" placeholder="Enter ...">

                                        <?php if ($validation->hasError('sku')) : ?>
                                            <span class="text-danger"><?= $validation->getError('sku') ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Weight</label>
                                                <input type="text" class="form-control" name="weight"
                                                       value="<?= $product['weight'] ?>" placeholder="Enter ...">

                                                <?php if ($validation->hasError('weight')) : ?>
                                                    <span class="text-danger">
                                                        <?= $validation->getError('weight') ?>
                                                    </span>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Unit</label>
                                                <select class="form-control" name="weight_type_id">
                                                    <option></option>
                                                    <?php foreach ($weight_types as $weight_type) : ?>
                                                        <option
                                                            value="<?= $weight_type['id'] ?>" <?= ($weight_type['id'] == $product['weight_type_id']) ? 'selected' : '' ?>>
                                                            <?= esc($weight_type['unit']) ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>

                                                <?php if ($validation->hasError('weight_type_id')) : ?>
                                                    <span class="text-danger">
                                                        <?= $validation->getError('weight_type_id') ?>
                                                    </span>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Dimension</label>
                                        <input type="text" class="form-control" name="dimension"
                                               value="<?= $product['dimension'] ?>" placeholder="Enter ...">

                                        <?php if ($validation->hasError('dimension')) : ?>
                                            <span class="text-danger">
                                                <?= $validation->getError('dimension') ?>
                                            </span>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description"
                                          placeholder="Enter ..."><?= $product['description'] ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price"
                                               value="<?= $product['price'] ?>" placeholder="Enter ...">

                                        <?php if ($validation->hasError('price')) : ?>
                                            <span class="text-danger"><?= $validation->getError('price') ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Old Price</label>
                                        <input type="text" class="form-control" name="old_price"
                                               value="<?= $product['old_price'] ?>" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <input type="text" class="form-control" name="discount"
                                               value="<?= $product['discount'] ?>" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Discount Type</label>
                                        <select class="form-control" name="discount_type_id">
                                            <option></option>
                                            <?php foreach ($discount_types as $discount_type) : ?>
                                                <option
                                                    value="<?= $discount_type['id'] ?>" <?= ($discount_type['id'] == $product['discount_type_id']) ? 'selected' : '' ?>>
                                                    <?= esc($discount_type['type_name']) ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="hot"
                                                   value="1" <?= $product['hot'] ? 'checked' : '' ?>>
                                            <label class="form-check-label">Hot</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="featured"
                                                   value="1" <?= $product['featured'] ? 'checked' : '' ?>>
                                            <label class="form-check-label">Featured</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="wish"
                                                   value="1" <?= $wishlist_check ? 'checked' : '' ?>>
                                            <label class="form-check-label">Wish</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tag</label>
                                        <select class="select2" multiple name="tag_id[]" data-placeholder="Select Tag"
                                                style="width: 100%;">
                                            <?php foreach ($tags as $tag) : ?>
                                                <option
                                                    value="<?= $tag['id'] ?>" <?= in_array($tag['id'], $tag_check) ? 'selected' : '' ?>>
                                                    <?= esc($tag['name']) ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control" name="status"
                                               value="<?= $product['status'] ?>" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category_id">
                                            <option></option>
                                            <?php foreach ($categories as $category) : ?>
                                                <option
                                                    value="<?= $category['id'] ?>" <?= ($category['id'] == $product['category_id']) ? 'selected' : '' ?>>
                                                    <?= esc($category['name']) ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>

                                        <?php if ($validation->hasError('category_id')) : ?>
                                            <span class="text-danger"><?= $validation->getError('category_id') ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Size Guide</h3>
                                        </div>
                                        <div class="card-body">
                                            <textarea id="summernote" name="size_guide"
                                                      placeholder="Enter ..."><?= $product['size_guide'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Additional Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <textarea id="summernote2" name="additional_info"
                                                      placeholder="Enter ..."><?= $product['additional_info'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-detail" role="tabpanel"
                             aria-labelledby="custom-tabs-four-detail-tab">
                            <div class="form-group">
                                <table class="table text-center">
                                    <thead>
                                    <tr>
                                        <th class="col-sm-3">Color</th>
                                        <th class="col-sm-3">Size</th>
                                        <th class="col-sm-3">Quantity</th>
                                        <th class="col-sm-3">Price Detail</th>
                                        <th>
                                            <button type="button" id="addRow" class="btn btn-success">+</button>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="dynamicadd">
                                    <?php $count = 0 ?>
                                    <?php foreach ($general_info as $key => $items) : ?>
                                        <tr id="row<?= $key ?>">
                                            <input type="hidden" name="countRow[<?= $count++ ?>]"
                                                   class="form-control text-center">
                                            <td>
                                                <select class="form-control" name="product_color_id[]">
                                                    <option></option>
                                                    <?php foreach ($colors as $color) : ?>
                                                        <option
                                                            value="<?= $color['id'] ?>" <?= ($items['color_id'] == $color['id']) ? 'selected' : '' ?>>
                                                            <?= $color['name'] ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="product_size_id[]">
                                                    <option></option>
                                                    <?php foreach ($sizes as $size) : ?>
                                                        <option
                                                            value="<?= $size['id'] ?>" <?= ($items['size_id'] == $size['id']) ? 'selected' : '' ?>>
                                                            <?= $size['name'] ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="quantity[]" class="form-control text-center"
                                                       value="<?= $items['quantity'] ?>">
                                            </td>
                                            <td>
                                                <input type="text" name="price2[]" class="form-control text-center"
                                                       value="<?= $items['price'] ?>">
                                            </td>
                                            <td>
                                                <button type="button" id="<?= $key ?>" class="btn btn-danger deleteRow">
                                                    -
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-image" role="tabpanel"
                             aria-labelledby="custom-tabs-four-image-tab">
                            <div class="form-group mb-3">
                                <label for="exampleInputFile">Upload Product Images</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="images[]" class="custom-file-input" multiple
                                               id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if ($images) : ?>
                                        <div class="row">
                                            <?php foreach ($images as $image) : ?>
                                                <div class="col-sm-2 text-center">
                                                    <figure style="position: relative; margin: 0">
                                                        <img src="<?= base_url($image['image']) ?>"
                                                             style="width:80px; height:80px" class="border mb-2"
                                                             alt="Img">
                                                        <a href="<?= url_to('productImage-delete', $image['id']) ?>"
                                                           class="fas fa-times"
                                                           style="position: absolute; border-radius: 50%; font-size: 0.8rem; width: 1rem; height: 1rem; line-height: 1rem; background-color: #fff; box-shadow: 0 2px 6px 0 rgb(0 0 0 / 40%);margin-left: -10px"
                                                           title="Remove"></a>
                                                    </figure>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    <?php else : ?>
                                        <h5>No Image Added</h5>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.select2').select2();

        $('#summernote').summernote();
        $('#summernote2').summernote();

        bsCustomFileInput.init();

        var i = 1;
        $('#addRow').click(function() {
          i++;
          $('#dynamicadd').
            append('<tr id="row' + i +
              '"><input type="hidden" name="countRow[<?= $count++ ?>]" class="form-control text-center"><td><select class="form-control" name="product_color_id[]"><option></option> <?php foreach ($colors as $color) : ?><option value="<?= $color['id'] ?>" <?= ($color['id'] == old("product_color_id")) ? 'selected' : '' ?>><?= esc($color['name']) ?></option> <?php endforeach ?> </select></td><td><select class="form-control" name="product_size_id[]"><option></option><?php foreach ($sizes as $size) : ?><option value="<?= $size['id'] ?>"<?= ($size['id'] == old("product_size_id")) ? 'selected' : '' ?>><?= esc($size['name']) ?></option><?php endforeach ?><select><td><input type="text" name="quantity[]" class="form-control text-center"></td><td><input type="text" name="price2[]" class="form-control text-center"></td><td><button type="button" id = "' +
              i + '" class="btn btn-danger deleteRow">-</button></td></tr>');
        });

        $(document).on('click', '.deleteRow', function() {
          var row_id = $(this).attr('id');
          $('#row' + row_id + '').remove();
        });
      });
    </script>

<?= $this->endSection() ?>