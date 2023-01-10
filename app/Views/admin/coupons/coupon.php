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
                        <li class="breadcrumb-item"><a href="<?= url_to('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Coupon Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div>
                        <a href="<?= url_to('coupon-create') ?>" class="btn btn-primary btn-block">Create New</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Coupon Name</th>
                        <th>Code</th>
                        <th>Discount</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1; ?>
                    <?php foreach ($coupons as $coupon) : ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $coupon['name'] ?></td>
                            <td><?= $coupon['code'] ?></td>
                            <td>$<?= $coupon['amount_off'] ?></td>
                            <td><?= date('m-d-Y', strtotime($coupon['start_date'])) ?></td>
                            <td><?= date('m-d-Y', strtotime($coupon['end_date'])) ?></td>
                            <td><?= $coupon['status'] == '1' ? 'Enabled' : 'Disabled' ?></td>
                            <td>
                                <a class="btn btn-info btn-sm" href="<?= url_to('coupon-edit', $coupon['id']) ?>">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="<?= url_to('coupon-delete', $coupon['id']) ?>">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>