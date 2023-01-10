<?= $this->extend('admin/master') ?>

<?= $this->section('header-content') ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Coupon Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= route_to('index.coupon') ?>">Coupon</a></li>
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
                <h3 class="card-title">Create New Coupon</h3>
            </div>

            <form action="<?= route_to('coupon-createNew') ?>" method="post">
                <?= csrf_field() ?>
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                    <div class="form-group">
                        <label>Coupon Name</label>
                        <input type="text" class="form-control" name="name" value="<?= old('name') ?>"
                               placeholder="Enter coupon name">

                        <?php if ($validation->hasError('name')) : ?>
                            <span class="text-danger"><?= $validation->getError('name') ?></span>
                        <?php endif ?>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" class="form-control" name="code" value="<?= old('code') ?>"
                                       placeholder="Enter ...">

                                <?php if ($validation->hasError('code')) : ?>
                                    <span class="text-danger"><?= $validation->getError('code') ?></span>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" name="coupon_type_id">
                                    <option></option>
                                    <?php foreach ($coupon_types as $coupon_type) : ?>
                                        <option
                                            value="<?= $coupon_type['id'] ?>" <?= ($coupon_type['id'] == old('coupon_type_id')) ? 'selected' : '' ?>>
                                            <?= esc($coupon_type['type_name']) ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>

                                <?php if ($validation->hasError('coupon_type_id')) : ?>
                                    <span class="text-danger"><?= $validation->getError('coupon_type_id') ?></span>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text" class="form-control" name="amount_off"
                                       value="<?= old('amount_off') ?>" placeholder="Enter ...">

                                <?php if ($validation->hasError('amount_off')) : ?>
                                    <span class="text-danger"><?= $validation->getError('amount_off') ?></span>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Total Amount</label>
                                <input type="text" class="form-control" name="total" value="<?= old('total') ?>"
                                       placeholder="Enter ...">

                                <?php if ($validation->hasError('total')) : ?>
                                    <span class="text-danger"><?= $validation->getError('total') ?></span>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Discount Times</label>
                                <input type="text" class="form-control" name="number_of_discount"
                                       value="<?= old('number_of_discount') ?>" placeholder="Enter ...">

                                <?php if ($validation->hasError('number_of_discount')) : ?>
                                    <span class="text-danger"><?= $validation->getError('number_of_discount') ?></span>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Date Start</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="start_date"
                                               data-target="#reservationdate" value="<?= old('start_date') ?>">
                                        <div class="input-group-append" data-target="#reservationdate"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <?php if ($validation->hasError('start_date')) : ?>
                                    <span class="text-danger"><?= $validation->getError('start_date') ?></span>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date End</label>
                                <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="end_date"
                                           data-target="#reservationdate1" value="<?= old('end_date') ?>">
                                    <div class="input-group-append" data-target="#reservationdate1"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>

                                <?php if ($validation->hasError('end_date')) : ?>
                                    <span class="text-danger"><?= $validation->getError('end_date') ?></span>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="status" value="1">
                            <label class="form-check-label"><b>Status</b></label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <link rel="stylesheet"
          href="<?= base_url('vendors/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?= base_url('vendors/plugins/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('vendors/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"
    ></script>

    <script type="text/javascript">
      $('#reservationdate').datetimepicker({
        format: 'L',
      });

      $('#reservationdate1').datetimepicker({
        format: 'L',
      });
    </script>
<?= $this->endSection() ?>