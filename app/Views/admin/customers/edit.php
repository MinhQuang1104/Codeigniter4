<?= $this->extend('admin/master') ?>

<?= $this->section('header-content') ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customer Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= route_to('index.customer') ?>">Customer</a></li>
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
                <h3 class="card-title">Edit Customer</h3>
            </div>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= url_to('customer-update', $customer['id']) ?>" enctype="multipart/form-data"
                  method="post">
                <?= csrf_field() ?>
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-customer-tab"
                               data-toggle="pill" href="#custom-tabs-four-customer" role="tab"
                               aria-controls="custom-tabs-four-product" aria-selected="true">Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-image-tab" data-toggle="pill"
                               href="#custom-tabs-four-image" role="tab" aria-controls="custom-tabs-four-image"
                               aria-selected="false">Image</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-customer" role="tabpanel"
                             aria-labelledby="custom-tabs-four-customer-tab">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="first_name"
                                               value="<?= $customer['first_name'] ?>"
                                               placeholder="First name">

                                        <?php if ($validation->hasError('first_name')) : ?>
                                            <span class="text-danger"><?= $validation->getError('first_name') ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name"
                                               value="<?= $customer['last_name'] ?>"
                                               placeholder="Last name">

                                        <?php if ($validation->hasError('last_name')) : ?>
                                            <span class="text-danger"><?= $validation->getError('last_name') ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address"
                                       value="<?= $customer['address'] ?>" placeholder="Enter ...">

                                <?php if ($validation->hasError('address')) : ?>
                                    <span class="text-danger"><?= $validation->getError('address') ?></span>
                                <?php endif ?>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email"
                                               value="<?= $customer['email'] ?>" placeholder="Enter ...">

                                        <?php if ($validation->hasError('email')) : ?>
                                            <span class="text-danger"><?= $validation->getError('email') ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number"
                                               value="<?= $customer['phone_number'] ?>"
                                               placeholder="Enter ...">

                                        <?php if ($validation->hasError('phone_number')) : ?>
                                            <span
                                                class="text-danger"><?= $validation->getError('phone_number') ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password"
                                               placeholder="Enter ...">

                                        <?php if ($validation->hasError('password')) : ?>
                                            <span class="text-danger"><?= $validation->getError('password') ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm"
                                               placeholder="Enter ...">

                                        <?php if ($validation->hasError('confirm')) : ?>
                                            <span class="text-danger"><?= $validation->getError('confirm') ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-image" role="tabpanel"
                             aria-labelledby="custom-tabs-four-image-tab">
                            <div class="form-group mb-3">
                                <label for="exampleInputFile">Upload Customer Images</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input"
                                               id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if ($customer['profile_image']) : ?>
                                        <div class="row">
                                            <div class="col-sm-2 text-center">
                                                <figure style="position: relative; margin: 0">
                                                    <img src="<?= base_url($customer['profile_image']) ?>"
                                                         style="width:80px; height:80px" class="border mb-2" alt="Img">
                                                    <a href="<?= url_to('customerImage-delete', $customer['id']) ?>"
                                                       class="fas fa-times" id="remove-image"
                                                       style="text-decoration: none; position: absolute; border-radius: 50%; font-size: 0.8rem; width: 1rem; height: 1rem; line-height: 1rem; background-color: #fff; box-shadow: 0 2px 6px 0 rgb(0 0 0 / 40%);margin-left: -10px"
                                                       title="Remove"></a>
                                                </figure>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <h5>No Image Added</h5>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {

        bsCustomFileInput.init();

      });
    </script>
<?= $this->endSection() ?>