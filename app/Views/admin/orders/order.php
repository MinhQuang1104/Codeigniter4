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
                    <li class="breadcrumb-item"><a href="<?= url_to('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Order Page</li>
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
                    <a href="<?= url_to('order-create') ?>" class="btn btn-primary btn-block">Create New</a>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Date Start</th>
                    <th>Date End</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php $count = 1; ?>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $order['first_name']. ' ' .$order['last_name'] ?></td>
                        <td><?= $order['total_price'] ?></td>
                        <td><?= date('m-d-Y', strtotime($order['created_at'])) ?></td>
                        <td><?= date('m-d-Y', strtotime($order['updated_at'])) ?></td>
                        <td><?= $order['status'] == '1' ? 'Enabled' : 'Disabled' ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="">
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
