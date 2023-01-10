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
                <h3 class="card-title">Create New Customer</h3>
            </div>

            <form action="<?= url_to('customer-createNew') ?>" enctype="multipart/form-data" method="post">
                <?= csrf_field() ?>
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
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
                                               value="<?= old('first_name') ?>"
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
                                               value="<?= old('last_name') ?>"
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
                                       value="<?= old('address') ?>" placeholder="Enter ...">

                                <?php if ($validation->hasError('address')) : ?>
                                    <span class="text-danger"><?= $validation->getError('address') ?></span>
                                <?php endif ?>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email"
                                               value="<?= old('email') ?>" placeholder="Enter ...">

                                        <?php if ($validation->hasError('email')) : ?>
                                            <span class="text-danger"><?= $validation->getError('email') ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number"
                                               value="<?= old('phone_number') ?>"
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
                                               value="<?= old('password') ?>" placeholder="Enter ...">

                                        <?php if ($validation->hasError('password')) : ?>
                                            <span class="text-danger"><?= $validation->getError('password') ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm"
                                               value="<?= old('confirm') ?>"
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
                            <div class="form-group">
                                <label for="exampleInputFile">Upload Customer Images</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input"
                                               id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
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